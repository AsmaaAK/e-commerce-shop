@extends('layouts.app')

@section('content')
<div class="container">
  <h1>ل</h1>
  <p>products: {{ $productsCount }}</p>
  <p>عدد الفئات: {{ $categoriesCount }}</p>
  <a href="{{ route('admin.products') }}">عرض المنتجات</a>
  <a href="{{ route('admin.categories') }}">عرض الفئات</a>
</div>
@endsection
