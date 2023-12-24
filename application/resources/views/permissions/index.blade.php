@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h2>Permissions</h2>
        <div class="lead d-flex justify-content-between mb-3">
            Manage your permissions here.
            @can('Create permission')
            <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right">Add permissions</a>
            @endcan
        </div>
        
        <div class="mt-2">
            @include('layouts.message')
        </div>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Guard</th> 
                <th scope="col" colspan="3" width="1%"></th> 
            </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>
                            @can('Update permission')
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-light btn-sm rounded-lg shadow-sm">
                                <i class="bi bi-pencil-square text-dark"></i>
                            </a>
                            @endcan
                        </td>
                        <td>
                            @can('Delete permission')
                            <form action="{{route('permissions.destroy',$permission->id)}}" method="post" style="display: inline">
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

    </div>
@endsection