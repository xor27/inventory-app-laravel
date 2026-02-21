@extends('layouts.seodash')

@section('content')
<div class="card">
    <div class="card-body">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between mb-4">
            <h4>Product List</h4>

            @if(auth()->user()->role === 'admin')
                <a href="{{ url('/products/create') }}" class="btn btn-primary">
                    Tambah Product
                </a>
            @endif
        </div>

        {{-- FLASH MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- PRODUCT GRID --}}
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        {{-- IMAGE --}}
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}"
                                 class="card-img-top"
                                 style="height:220px; object-fit:cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center"
                                 style="height:220px;">
                                <span class="text-muted">No Image</span>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">

                            {{-- CATEGORY BADGE --}}
                            @if($product->category)
                                <div class="text-primary fw-semibold mb-1" style="font-size: 13px;">
                                    {{ $product->category->name }}
                                </div>
                            @endif

                            {{-- PRODUCT NAME --}}
                            <h5 class="card-title mt-1">
                                {{ $product->name }}
                            </h5>

                            {{-- PRICE --}}
                            <p class="text-primary fw-bold mb-1">
                                Rp {{ number_format($product->price) }}
                            </p>

                            {{-- STOCK --}}
                            <p class="text-muted mb-2">
                                Jumlah Stock: {{ $product->stock }}
                            </p>

                            {{-- DESCRIPTION --}}
                            <p class="text-muted small">
                                {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                            </p>

                            {{-- BUTTONS --}}
                            <div class="mt-auto">

                                {{-- DETAIL --}}
                                <a href="{{ route('products.show', $product) }}"
                                   class="btn btn-primary w-100 mb-2">
                                    Read More
                                </a>

                                {{-- ADMIN ONLY --}}
                                @if(auth()->user()->role === 'admin')
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('products.edit', $product) }}"
                                           class="btn btn-warning w-50">
                                            Edit
                                        </a>

                                        <form action="{{ route('products.destroy', $product) }}"
                                              method="POST"
                                              class="w-50">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger w-100"
                                                    onclick="return confirm('Yakin hapus product?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection