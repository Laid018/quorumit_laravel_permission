@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h2>Update product</h2>
        <div class="lead">
            Edit product.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('products.update', $product->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $product->name }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea cols="30" rows="4" value="{{ $product->description }}" 
                        type="text" 
                        class="form-control" 
                        name="description" 
                        placeholder="Description" required>

                      {{ $product->description }}
                    </textarea>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input
                        type="number" 
                        class="form-control" 
                        name="price" 
                        value="{{ $product->price }}"
                        placeholder="price" required/>

                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                

                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('products.index') }}" class="btn btn-light shadow-sm">Back</a>
            </form>
        </div>

    </div>
@endsection