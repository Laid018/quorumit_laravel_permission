@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h2>Edit permission</h2>
        <div class="lead">
            Editing permission.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $permission->name }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save permission</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-light shadow-sm">Back</a>
            </form>
        </div>

    </div>
@endsection