@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h1>Roles</h1>
        <div class="lead d-flex justify-content-between mb-3">
            <span>Manage your roles here.</span>
            @can('Create role')
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
            @endcan
        </div>
        
        <div class="mt-2">
            @include('layouts.message')
        </div>

        <table class="table table-striped table-hover">
          <tr class="table-dark">
             <th width="1%">No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @can('Detail role')
                    <a class="btn btn-light btn-sm rounded-lg shadow-sm" href="{{ route('roles.show', $role->id) }}">
                        <i class="bi bi-eye text-success"></i>
                    </a>
                    @endcan
                </td>
                <td>
                    @can('Update role')
                    <a class="btn btn-light btn-sm rounded-lg shadow-sm" href="{{ route('roles.edit', $role->id) }}">
                        <i class="bi bi-pencil-square text-dark"></i>
                    </a>
                    @endcan
                </td>
                <td>
                    @can('Create role')
                    <form action="{{route('roles.destroy',$role->id)}}" method="post" style="display: inline">
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
            {!! $roles->links() !!}
        </div>

    </div>
@endsection