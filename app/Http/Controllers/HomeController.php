<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function showHome()
  {
    $user = auth()->user();
    // 1. Ambil pembelian terbaru oleh user dengan ID tertentu
    $purchase = Purchase::where('user_id', $user->id)
      ->latest() // Urutkan berdasarkan created_at terbaru
      ->first(); // Ambil hanya pembelian terbaru


    // 2. Jika user belum pernah membeli produk apapun
    if (!$purchase) {
      return view('recommendations', ['recommendations' => []]);
    }

    // 3. Ambil produk yang dibeli pada pembelian terbaru
    $product = $purchase->product;

    // 4. Ambil semua produk lain (kecuali yang sudah dibeli tadi)
    $recommendedProducts = Product::where('id', '!=', $product->id)->get();

    // 5. Siapkan koleksi untuk menampung produk rekomendasi
    $recommendations = collect();

    // 6. Ambil vektor atribut dari produk yang dibeli
    $productVector = $this->getProductVector($product);

    // 7. Loop semua produk lain untuk hitung similarity
    foreach ($recommendedProducts as $recommendedProduct) {
      // Ambil vektor produk lain
      $recommendedProductVector = $this->getProductVector($recommendedProduct);

      // Hitung cosine similarity antara dua vektor produk
      $similarity = $this->cosineSimilarity($productVector, $recommendedProductVector);

      // 8. Masukkan semua produk dengan similarity ke koleksi
      $recommendations->push((object)[
        'product' => $recommendedProduct,
        'similarity' => $similarity
      ]);
    }

    // 9. Urutkan rekomendasi berdasarkan similarity tertinggi
    $recommendations = $recommendations->sortByDesc('similarity');

    // 10. Kirim data ke view
    return view('home', ['title' => 'Home', 'user' => $user, 'recommendations' => $recommendations]);
  }

  // Fungsi untuk ubah atribut produk jadi vektor numerik
  private function getProductVector($product)
  {
    return [
      'category' => $this->categoryToVector($product->category), // Kategori produk
      'season' => $this->seasonToVector($product->season),       // Musim
      'gender' => $this->genderToVector($product->gender),       // Gender
      'price' => $this->priceToVector($product->price)            // Harga
    ];
  }

  // Fungsi untuk hitung cosine similarity antar 2 vektor
  private function cosineSimilarity($vectorA, $vectorB)
  {
    $dotProduct = 0;
    $magnitudeA = 0;
    $magnitudeB = 0;

    // Hitung dot product dan magnitude vektor
    foreach ($vectorA as $key => $value) {
      $dotProduct += $value * $vectorB[$key];
      $magnitudeA += pow($value, 2);
      $magnitudeB += pow($vectorB[$key], 2);
    }

    // Hitung besar panjang vektor
    $magnitudeA = sqrt($magnitudeA);
    $magnitudeB = sqrt($magnitudeB);

    // Cegah pembagian nol
    if ($magnitudeA == 0 || $magnitudeB == 0) {
      return 0;
    }

    // Hasil akhir cosine similarity
    return $dotProduct / ($magnitudeA * $magnitudeB);
  }

  // Ubah nama kategori jadi nilai numerik
  private function categoryToVector($category)
  {
    // Menambahkan kategori yang relevan
    $categories = [
      'Clothing' => 1,
      'Footwear' => 2,
      'Outerwear' => 3,
      'Accessories' => 4
    ];
    return $categories[$category] ?? 0; // Default 0 jika kategori tidak dikenali
  }

  // Ubah musim ke nilai numerik
  private function seasonToVector($season)
  {
    // Hanya dua musim yang ada: Winter dan Summer
    $seasons = [
      'Summer' => 1, // Musim panas
      'Winter' => 2  // Musim dingin
    ];
    return $seasons[$season] ?? 0; // Default 0 jika musim tidak dikenali
  }

  // Ubah gender ke nilai numerik
  private function genderToVector($gender)
  {
    return $gender === 'Male' ? 1 : 0; // 1 untuk Male, 0 untuk Female
  }

  private function priceToVector($price)
  {
    return floor($price / 1000); // Membagi harga dengan 1000 dan menghilangkan tiga nol terakhir
  }
}
