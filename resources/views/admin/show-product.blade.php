@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Details</h2>

    <div class="card mb-3" style="max-width: 600px;">
        @if($product->image_path)
            <img src="{{ asset('storage/'.$product->image_path) }}" class="card-img-top" alt="{{ $product->name }}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $product->description ?? 'N/A' }}</p>
            <p class="card-text"><strong>Price:</strong> {{ number_format($product->price, 2) }} $</p>
            <p class="card-text">
                <strong>Status:</strong>
                @if($product->on_sale)
                    <span class="badge bg-success">Available</span>
                @else
                    <span class="badge bg-secondary">Stored</span>
                @endif
            </p>
            <p class="card-text"><small class="text-muted">Created at: {{ $product->created_at->format('Y-m-d') }}</small></p>
            <p class="card-text"><small class="text-muted">Updated at: {{ $product->updated_at->format('Y-m-d') }}</small></p>

            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>

            <!-- Delete Form -->
            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
            </form>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
