<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Product Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons (zmdi) -->
    <link href="https://cdn.jsdelivr.net/npm/material-design-iconic-font@2.2.0/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 220px;
            background-color: #343a40;
            padding-top: 70px;
        }
        .sidebar a {
            display: block;
            color: #fff;
            padding: 15px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
            text-decoration: none;
        }
        .header {
            position: fixed;
            top: 0;
            left: 220px;
            right: 0;
            height: 70px;
            background-color: #fff;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .main-content {
            margin-left: 220px;
            padding: 100px 30px 30px 30px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .badge {
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <a href="{{ route('products.index') }}">Products</a>
	<a href="{{ route('cart') }}">Features</a>
    <a href="{{ route('shop.index') }}">Shop</a>			
    <a href="{{ route('contact') }}">Contact</a>
    <a href="{{ route('about') }}">About</a>
    <a href="#">Settings</a>
</div>

<!-- Header -->
<div class="header">
    <div class="d-flex align-items-center">
        <a href="#"><img src="images/icons/logo-01.png" alt="Logo" height="40"></a>
        <span class="ms-3 fw-bold">Admin Dashboard</span>
    </div>
    <div class="d-flex align-items-center">
        <a href="#" class="me-3"><i class="zmdi zmdi-search"></i></a>
        <a href="#" class="me-3"><i class="zmdi zmdi-shopping-cart"></i></a>
        <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <h2>Product Management</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">+ Add New Product</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped shadow-sm bg-white">
        <thead class="table-dark">
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
                <td>{{ number_format($product->price, 2) ?? 'N/A'}} $</td>
                <td>
                    @if($product->on_sale)
                        <span class="badge bg-success">Available</span>
                    @else
                        <span class="badge bg-secondary">Stored</span>
                    @endif
                </td>
                <td>{{ $product->created_at->format('Y-m-d') ?? 'N/A'}}</td>
                <td>{{ $product->updated_at->format('Y-m-d') ?? 'N/A'}}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
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

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
