<x-layout :user="$user">
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="relative overflow-hidden bg-white">
      <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
        <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
          <div class="sm:max-w-lg">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Summer styles are finally here</h1>
            <p class="mt-4 text-xl text-gray-500">This year, our new summer collection will shelter you from the harsh elements of a world that doesn't care if you live or die.</p>
          </div>
          <di>
            <div class="mt-10">
              <!-- Decorative image grid -->
              <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                <div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                  <div class="flex items-center space-x-6 lg:space-x-8">
                    <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                      <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                        <img src="https://www.converse.id/media/wysiwyg/W3_Feb24_Small_Banner_Right.jpg" alt="" class="h-full w-full object-cover object-center">
                      </div>
                      <div class="h-64 w-44 overflow-hidden rounded-lg">
                        <img src="https://sombrero.jdsports.id/pub/media/wysiwyg/BrandHub/Adidas/ShopBy/adidas_1_1656x1656.jpg" alt="" class="h-full w-full object-cover object-center">
                      </div>
                    </div>
                    <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                      <div class="h-64 w-44 overflow-hidden rounded-lg">
                        <img src="https://static.nike.com/a/images/f_auto,cs_srgb/w_1536,c_limit/21749e6e-3dd0-4589-9319-4449a04af96a/air-force-1.jpg" alt="" class="h-full w-full object-cover object-center">
                      </div>
                      <div class="h-64 w-44 overflow-hidden rounded-lg">
                        <img src="https://sombrero.jdsports.id/pub/media/wysiwyg/BrandHub/Adidas/ShopBy/HB_X_JD_ADIDAS_TERRACE8502.jpg" alt="" class="h-full w-full object-cover object-center">
                      </div>
                      <div class="h-64 w-44 overflow-hidden rounded-lg">
                        <img src="https://image.adsoftheworld.com/2ph9l2wgurztr1j140pgl723usck" alt="" class="h-full w-full object-cover object-center">
                      </div>
                    </div>
                    <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                      <div class="h-64 w-44 overflow-hidden rounded-lg">
                        <img src="https://www.onitsukatiger.com/id/en-id/mk/brand/onitsukatiger/assets/image/sub-1.jpg" alt="" class="h-full w-full object-cover object-center">
                      </div>
                      <div class="h-64 w-44 overflow-hidden rounded-lg">
                        <img src="https://5.imimg.com/data5/SELLER/Default/2021/6/HT/BN/XF/86432004/whatsapp-image-2021-06-07-at-12-36-48-pm-1000x1000.jpeg" alt="" class="h-full w-full object-cover object-center">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
              <a href="/products" class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-center font-medium text-white hover:bg-indigo-700">Shop Collection</a>
            </div>
          </di>
        </div>
      </div>
    </div>

    <div class="container mt-5 mx-auto">
      <h1 class="text-center text-3xl font-semibold mb-8">Rekomendasi Produk</h1>
      @if(count($recommendations) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($recommendations as $recommendation)
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
              <!-- Menampilkan Gambar Produk -->
              <img src="{{$recommendation->product->picture}}" class="w-full h-64 object-cover" alt="{{ $recommendation->product->item_purchased }}">
    
              <div class="p-4">
                <h5 class="text-xl font-semibold text-gray-900">{{ $recommendation->product->item_purchased }}</h5>
                <p class="text-gray-700">Category: {{ $recommendation->product->category }}</p>
                <p class="text-gray-700">Season: {{ $recommendation->product->season }}</p>
                <p class="text-gray-700">Gender: {{ $recommendation->product->gender }}</p>
                <p class="text-gray-900 font-semibold">Price: Rp {{ number_format($recommendation->product->price, 0, ',', '.') }}</p>
                
                <!-- Tombol untuk melihat produk -->
                <a href="#" class="mt-4 inline-block bg-indigo-600 text-white py-2 px-4 rounded-md text-center hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Lihat Produk</a>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-center text-gray-600 mt-8">Tidak ada rekomendasi produk yang tersedia.</p>
      @endif
    </div>    
    
</x-layout>