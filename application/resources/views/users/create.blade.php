@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h1>Add new user</h1>
        <div class="lead d-flex justify-content-between">
            Add new user and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email') }}"
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control 
                            @error('password') is-invalid @enderror" 
                            name="password" 
                            placeholder="Password"
                            required 
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input 
                        id="password-confirm" 
                        type="password" 
                        class="form-control" 
                        name="password_confirmation" 
                        placeholder="Confirm password"
                        required autocomplete="confirm-password">
                </div>

                <button type="submit" class="btn btn-primary">Save user</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection