@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h1>Role - {{ $role->name }}</h1>
        
        <div class="container mt-4">
            <h3>Assigned permissions</h3>
            <table class="table table-striped">
                <thead class="table-dark">
                    <th scope="col" width="20%">Name</th>
                    <th scope="col" width="1%">Guard</th> 
                </thead>

                @foreach($rolePermissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('roles.index') }}" class="btn btn-light shadow-sm">Back</a>
        </div>
    </div>
@endsection