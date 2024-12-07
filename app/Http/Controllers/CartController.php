<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use App\Models\Purchase;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddToCartRequest;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function showCart()
    {
        $user = auth()->user(); // Mengambil user yang sedang login
        $cart = $user->cart; // Mengambil keranjang milik user tersebut
        $cartItems = $cart ? $cart->cartItems()->with('product')->get() : collect(); // Memuat item-item dalam keranjang beserta produk terkait dan variannya
        $products = Product::all();

        #dd($cartItems);

        return view('cart', [
            'title' => 'Cart',
            'user' => $user,
            'products' => $products,
            'cartItems' => $cartItems,
            'cart' => $cart 
        ]);
    }

    public function add(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id', // Menggunakan ID produk
            'quantity' => 'required|integer|min:1', // Menentukan kuantitas
        ]);
    
        // Ambil user yang sedang login
        $user = Auth::user();
    
        // Ambil atau buat keranjang untuk user
        $cart = $user->cart()->firstOrCreate(['user_id' => $user->id]);
    
        // Periksa apakah item dengan product_id yang sama sudah ada di dalam cart_items
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $validatedData['product_id'])
                            ->first();
    
        if ($cartItem) {
            // Jika item sudah ada, perbarui kuantitasnya
            $cartItem->quantity += $validatedData['quantity'];
            $cartItem->save();
        } else {
            // Tambahkan item baru ke keranjang
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $validatedData['product_id'],
                'quantity' => $validatedData['quantity'],
            ]);
        }
    
        // Redirect ke halaman keranjang dengan pesan sukses
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
    
    
    public function deleteItem(Request $request, $id)
    {
        // Ambil user yang sedang login
        $user = Auth::user();
        
        // Ambil item dari keranjang yang dimiliki oleh user yang sedang login
        $cartItem = CartItem::where('id', $id)
                            ->whereHas('cart', function($query) use ($user) {
                                $query->where('user_id', $user->id);
                            })->firstOrFail();
        
        // Hapus item dari keranjang
        $cartItem->delete();
        
        // Redirect kembali ke halaman keranjang dengan pesan sukses
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }    

    public function checkout(Request $request)
    {
        // Validasi input untuk memastikan 'cart_id' ada
        $request->validate([
            'cart_id' => 'required|integer|exists:carts,id',
        ]);
    
        $cartId = $request->input('cart_id');
    
        // Ambil keranjang berdasarkan cart_id
        $cart = Cart::findOrFail($cartId);
    
        // Cek apakah keranjang memiliki item
        $cartItems = CartItem::where('cart_id', $cartId)->get();
    
        if ($cartItems->isEmpty()) {
            // Jika keranjang kosong, kembalikan pesan kesalahan
            return redirect()->back()->with('error', 'Keranjang belanja Anda kosong.');
        }
    
        // Proses setiap item di keranjang dan simpan ke tabel purchases
        foreach ($cartItems as $cartItem) {
            Purchase::create([
                'user_id' => $cart->user_id,  // Ambil user_id dari keranjang
                'product_id' => $cartItem->product_id,  // Ambil product_id dari cart_item
            ]);
        }
    
        // Hapus semua item di tabel cart_items yang sesuai dengan cart_id
        CartItem::where('cart_id', $cartId)->delete();
    
        // Tambahkan logika tambahan di sini jika perlu (misalnya update status pembayaran, etc.)
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Checkout berhasil. Keranjang belanja Anda sudah kosong.');
    }
    
}


