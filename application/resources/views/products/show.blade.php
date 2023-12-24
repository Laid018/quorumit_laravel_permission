@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h2>Product detail</h2>
        
        <div class="container mt-4">
          <table class="table border-secondary table-light table-bordered">
            <tr>
              <th>Name</th>
              <td>{{ $product->name}}</td>
            </tr>
            <tr>
              <th>Description</th>
              <td>{{ $product->description}}</td>
            </tr>
            <tr>
              <th>Price($)</th>
              <td>$ {{ $product->price}}</td>
            </tr>
          </table>
        </div>
        <div class="mt-4">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-light shadow-sm">Back</a>
        </div>
    </div>

@endsection