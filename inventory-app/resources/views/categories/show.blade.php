@extends('layouts.seodash')

@section('content')
<div class="card">
    <div class="card-body">

        <h4 class="mb-3">Detail Category</h4>

        <div class="mb-4">
            <strong>Nama Category:</strong>
            <p>{{ $category->name }}</p>
        </div>

        <hr>

        <h5>List Product</h5>

        @if($category->products->count())
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Product</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category->products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp {{ number_format($product->price) }}</td>
                            <td>{{ $product->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">Belum ada product di category ini.</p>
        @endif

        <a href="{{ route('categories.index') }}"
           class="btn btn-secondary mt-3">
            Kembali
        </a>

    </div>
</div>
@endsection