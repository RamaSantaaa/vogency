

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Rekomendasi Produk</h1>
    {{ ($recommendations) }}
    @if(count($recommendations) > 0)
        <div class="row">
            @foreach($recommendations as $recommendation)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Menampilkan Gambar Produk -->
                        <img src="{{ asset('images/' . $recommendation->product->image) }}" class="card-img-top" alt="{{ $recommendation->product->item_purchased }}">
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $recommendation->product->item_purchased }}</h5>
                            <p class="card-text">Category: {{ $recommendation->product->category }}</p>
                            <p class="card-text">Season: {{ $recommendation->product->season }}</p>
                            <p class="card-text">Gender: {{ $recommendation->product->gender }}</p>
                            <p class="card-text">Price: Rp {{ number_format($recommendation->product->price, 0, ',', '.') }}</p>
                            
                            <!-- Tombol untuk melihat produk -->
                            <a href="#" class="btn btn-primary">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Tidak ada rekomendasi produk yang tersedia.</p>
    @endif
</div>
@endsection

