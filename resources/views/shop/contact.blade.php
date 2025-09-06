@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
{{-- @include('shop._alerts') --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5 mb-5">
    <h1 class="mb-4">Contact Us</h1>

    <form action="{{ route('contact.submit') }}" method="POST" class="mt-3">
        @csrf

        {{-- Name --}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="{{ old('email') }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Message --}}
        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="5" maxlength="500">{{ old('message') }}</textarea>
            <div class="form-text">Max 500 characters.</div>
            @error('message')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Submit --}}
        <button class="btn btn-primary">Send</button>
    </form>

    {{-- Contact Info --}}
    <div class="mt-5">
        <h4>Contact Information</h4>
        <p><i class="bi bi-geo-alt"></i> Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US</p>
        <p><i class="bi bi-telephone"></i> +1 800 1236879</p>
        <p><i class="bi bi-envelope"></i> contact@example.com</p>
    </div>
    <div class="mt-4">
        <iframe 
            src="https://www.google.com/maps?q=40.691446,-73.886787&hl=es;z=14&amp;output=embed"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
    </div>
</div>
@endsection
