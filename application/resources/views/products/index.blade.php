@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h2>Products</h2>
        <div class="lead d-flex justify-content-between">
            Manage your products here.
            @can('Create product')
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right">Add product</a>
            @endcan
        </div>
        
        <div class="mt-2">
            @include('layouts.message')
        </div>

        <table class="table table-striped">
          <tr class="table-dark">
             <th width="1%">No</th>
             <th>Name</th>
             <th>Description</th>
             <th>Price</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($products as $key => $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ $product->price }}</td>
                <td>
                  @can('Show product')
                  <a class="btn btn-light btn-sm rounded-lg shadow-sm" href="{{ route('products.show', $product->id) }}">
                    <i class="bi bi-eye text-success"></i>
                  </a>
                  @endcan
                </td>
                <td>
                  @can('Update product')
                  <a class="btn btn-light btn-sm rounded-lg shadow-sm" href="{{ route('products.edit', $product->id) }}">
                    <i class="bi bi-pencil-square text-dark"></i>
                  </a>
                  @endcan
                </td>
                <td>
                  @can('Delete product')
                  <form action="{{route('products.destroy',$product->id)}}" method="post" style="display: inline">
                      @csrf
                      @method('delete')
                      <button 
                          type="submit" 
                          onclick="return confirm('Are you sure you want to Remove?');"
                          class="btn btn-light btn-sm rounded-lg shadow-sm">
                          <i class="bi bi-trash text-danger"></i>
                      </button>
                  </form>
                  @endcan
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $products->links() !!}
        </div>

    </div>
@endsection