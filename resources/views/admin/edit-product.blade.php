@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="on_sale" value="1" class="form-check-input" id="onSale"
                   {{ $product->on_sale ? 'checked' : '' }}>
            <label for="onSale" class="form-check-label">Available for Sale?</label>
        </div>
        <div class="mb-3">
            <label>Product Image</label>
            <input type="file" name="image" class="form-control">
            @if($product->image_path)
                <img src="{{ asset('storage/'.$product->image_path) }}" width="100" class="mt-2">
            @endif
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
