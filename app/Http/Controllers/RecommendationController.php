<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function showRecommendations($userId)
    {
        // $purchase = Purchase::();
        // dd($purchase);

        // 1. Ambil riwayat pembelian terbaru untuk pengguna dengan userId tertentu
        $purchase = Purchase::where('user_id', $userId)
            ->latest() // Mengurutkan berdasarkan created_at secara menurun
            ->first(); // Ambil hanya satu data terbaru

        // 2. Jika tidak ada data pembelian untuk user tersebut
        if (!$purchase) {
            return view('recommendations', ['recommendations' => []]);
        }

        // Ambil produk dari pembelian terbaru
        $product = $purchase->product; // Ambil data produk dari pembelian terbaru

        //dd($product);

        // 3. Cari produk yang relevan berdasarkan kategori, musim, gender
        // 4. Bandingkan dengan produk lain, pastikan tidak merekomendasikan produk yang sama
        $recommendedProducts = Product::where('id', '!=', $product->id) // Pastikan tidak mengambil produk yang sama dengan $product
            ->get();


        // Debugging: Lihat produk yang relevan ditemukan
        //dd($recommendedProducts);  // Ini akan menampilkan produk yang relevan

        // 5. Rekomendasi produk berdasarkan kriteria kesamaan
        $recommendations = collect();

        // Loop untuk mencari rekomendasi produk yang relevan
        foreach ($recommendedProducts as $recommendedProduct) {
            $score = $this->calculateSimilarityScore($product, $recommendedProduct);

            // Debug: Lihat skor kesamaan produk
            //dump($recommendedProduct->item_purchased, $score);

            // Hanya masukkan produk jika skor lebih dari atau sama dengan 2
            if ($score >= 2) {
                // Tambahkan produk dengan skor kesamaan
                $recommendations->push((object)[
                    'product' => $recommendedProduct,
                    'score' => $score
                ]);
            }
        }

        // 6. Urutkan rekomendasi berdasarkan skor kesamaan (tertinggi)
        $recommendations = $recommendations->sortByDesc('score');

        // Kirim data ke view
        return view('recommendations', compact('recommendations'));
    }

    // Fungsi untuk menghitung skor kesamaan antara dua produk
    private function calculateSimilarityScore($product1, $product2)
    {
        $score = 0;

        // 1. Cek kesamaan kategori
        if ($product1->category === $product2->category) {
            $score++;
        }

        // 2. Cek kesamaan musim
        if ($product1->season === $product2->season) {
            $score++;
        }

        // 3. Cek kesamaan gender
        if ($product1->gender === $product2->gender) {
            $score++;
        }

        // Kembalikan skor
        return $score;
    }
}
