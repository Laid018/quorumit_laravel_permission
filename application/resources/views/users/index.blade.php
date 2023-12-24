@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h1>Users</h1>
        <div class="lead d-flex justify-content-between">
            <span>Manage your users here.</span>
            @can('Create user')
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Add new user</a>
            @endcan
        </div>
        
        <div class="mt-2">
            @include('layouts.message')
        </div>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="10%">Roles</th>
                <th scope="col" width="1%" colspan="3">Actions</th>    
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge bg-primary">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @can('Show user')
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-light btn-sm rounded-lg shadow-sm">
                                <i class="bi bi-eye text-success"></i>
                            </a>
                            @endcan
                        </td>
                        <td>
                            @can('Update user')
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-light btn-sm rounded-lg shadow-sm">
                                <i class="bi bi-pencil-square text-dark"></i>
                            </a>
                            @endcan
                        </td>
                        <td>
                            @can('Delete user')
                            <form action="{{route('users.destroy',$user->id)}}" method="post" style="display: inline">
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
            </tbody>
        </table>

        <div class="d-flex">
            {!! $users->links() !!}
        </div>

    </div>
@endsection