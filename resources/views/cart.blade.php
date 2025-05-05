 <x-layout :user="$user">

    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-white py-8 antialiased light:bg-gray-900 md:py-16">
      <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-dark sm:text-2xl">Shopping Cart</h2>
    
        <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
          <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
            <div class="space-y-6">
              
              @if (session('success'))
              <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                  <strong class="font-bold">Success!</strong>
                  <span class="block sm:inline">{{ session('success') }}</span>
              </div>
              @endif
  
              @if (session('error'))
              <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                  <strong class="font-bold">Failed</strong>
                  <span class="block sm:inline">{{ session('error') }}</span>
              </div>
              @endif
              
              @if($cartItems->isEmpty())
                  <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
                      <p class="text-center text-gray-900 font-medium">Keranjang belanja Anda kosong.</p>
                  </div>
              @else
  
              {{-- shopping cart --}}
              @foreach($cartItems as $item)
              <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
                  <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                      <a href="/products/{{ $item->product->slug }}" class="shrink-0 md:order-1">
                          <img class="h-20 w-20" src="{{ $item->product->picture }}" alt="{{ $item->product->item_purchased }} image" />
                      </a>
  
                      <div class="flex items-center justify-between md:order-3 md:justify-end">
                          <div class="flex items-center justify-end">
                              <p class="text-sm font-medium text-gray-900 mr-2">Quantity :</p>
                              <input type="text" id="counter-input-{{ $item->id }}" data-input-counter class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0" placeholder="" value="{{ $item->quantity }}" readonly />
                          </div>
                          <div class="text-end md:order-4 md:w-35">
                              <p class="text-base font-bold text-gray-900">IDR {{ number_format($item->product->price * $item->quantity, 2, ',','.') }}</p>
                          </div>
                      </div>                                        
          
                      <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                          <a href="/products/{{ $item->product->slug }}" class="text-base font-medium text-gray-900 hover:underline">{{ $item->product->item_purchased }}</a>
        
          
                          <div class="flex items-center gap-4">
                              <!-- Assume $cartItem is the current cart item being iterated over -->
                              <style>
                                  .custom-remove-btn {
                                      background-color: #dc3545; /* Warna merah */
                                      color: white; /* Warna teks putih */
                                      border: 1px solid #dc3545; /* Border merah */
                                      border-radius: 5px; /* Border bulat */
                                      padding: 0.25rem 0.75rem; /* Padding */
                                      font-size: 0.875rem; /* Ukuran font */
                                  }
                                  .custom-remove-btn:hover {
                                      background-color: #c82333; /* Warna merah yang lebih gelap saat dihover */
                                      border-color: #c82333; /* Border merah yang lebih gelap saat dihover */
                                  }
                              </style>
                              
                              <form action="{{ route('cart.deleteItem', $item->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="custom-remove-btn">Remove</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
              @endif
              
            </div>
            
  
            {{-- product lain --}}
          
            <div class="hidden xl:mt-8 xl:block">
              <h3 class="text-2xl font-semibold text-gray-900">People also bought</h3>
              <div class="mt-6 grid grid-cols-3 gap-4 sm:mt-8">
          
                  @foreach ($products->take(3) as $product)
                  <div class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
                      <a href="/products/{{ $product['slug'] }}" class="overflow-hidden rounded">
                        <img class="mx-auto h-44 w-44" src="{{ $product['url'] }}" alt="imac image" />
                      </a>
                      <div>
                        <a href="/products/{{ $product['slug'] }}" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ $product['item_purchased'] }}</a>
                        <p class="mt-2 text-base font-normal text-gray-500">{{  Str::limit($product['description'], 100) }}</p>
                      </div>
                      <div>
                        <p class="text-lg font-bold text-gray-900">
                          <span class="line-through"> Rp.3.000.000,00</span>
                        </p>
                        <p class="text-lg font-bold leading-tight text-red-600">Rp.{{ number_format($product->price, 2, ',', '.') }}</p>
                      </div>
                  </div>
                  @endforeach
              </div>
            </div>        
          </div>
    
          <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
              <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
                  <p class="text-xl font-semibold text-gray-900">Order summary</p>
          
                  <div class="space-y-4">
                      @php
                      $subtotal = 0;
                      $storePickupFee = 0; // Default store pickup fee is 0
                  
                      foreach($cartItems as $item) {
                          $subtotal += $item->product->price * $item->quantity;
                      }
                  
                      if ($subtotal > 0) {
                          $storePickupFee = 99; // Set the store pickup fee if there are items in the cart
                      }
                  
                      $discountRate = 0.20; // 20% discount rate
                      $discount = $subtotal * $discountRate;
                      $subtotalAfterDiscount = $subtotal - $discount;
                      $taxRate = 0.11; // 11% tax rate
                      $tax = $subtotalAfterDiscount * $taxRate;
                      $total = $subtotalAfterDiscount + $storePickupFee + $tax;
                      @endphp
                  
                      <div class="space-y-2">
                          <dl class="flex items-center justify-between gap-4">
                              <dt class="text-base font-normal text-gray-500">Original Price</dt>
                              <dd class="text-base font-medium text-gray-900">{{ 'Rp'.number_format($subtotal, 2) }}</dd>
                          </dl>
                  
                          <dl class="flex items-center justify-between gap-4">
                              <dt class="text-base font-normal text-gray-500">Discount</dt>
                              <dd class="text-base font-medium text-red-600">{{ '-Rp'.number_format($discount, 2) }}</dd>
                          </dl>
                  
                          @if ($storePickupFee > 0)
                          <dl class="flex items-center justify-between gap-4">
                              <dt class="text-base font-normal text-gray-500">Store Pickup</dt>
                              <dd class="text-base font-medium text-gray-900">{{ 'Rp'.$storePickupFee }}</dd>
                          </dl>
                          @endif
                  
                          <dl class="flex items-center justify-between gap-4">
                              <dt class="text-base font-normal text-gray-500">Tax (11%)</dt>
                              <dd class="text-base font-medium text-gray-900">{{ 'Rp'.number_format($tax, 2) }}</dd>
                          </dl>
                      </div>
                  
                      <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
                          <dt class="text-base font-bold text-gray-900">Total</dt>
                          <dd class="text-base font-bold text-gray-900">{{ 'Rp'.number_format($total, 2) }}</dd>
                      </dl>
                  </div>
                  
                  <form id="checkout-form" action="{{ route('cart.checkout') }}" method="POST">
                      @csrf
                      <input type="hidden" name="cart_id" value="{{ $cart->id }}" />
                      <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Checkout</button>
                  </form>
          
                  <div class="flex items-center justify-center gap-2">
                      <span class="text-sm font-normal text-gray-500"> or </span>
                      <a href="/products" title="" class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline">
                          Continue Shopping
                          <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                          </svg>
                      </a>
                  </div>
              </div>
          </div>
                  
  
        </div>
      </div>
    </section>
    
  </x-layout>