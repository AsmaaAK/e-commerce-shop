@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Management</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">+ Add New Product</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ Str::limit($product->description, 50) }}</td>
                <td>{{ number_format($product->price, 2) }} $</td>
                <td>
                    @if($product->on_sale)
                        <span class="badge bg-success">Available</span>
                    @else
                        <span class="badge bg-secondary">Stored</span>
                    @endif
                </td>
                <td>{{ $product->created_at->format('Y-m-d') }}</td>
                <td>{{ $product->updated_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No products found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
