@extends('layouts.app')

@section('content')
    <h1>Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm password</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Register</button>
    </form>
@endsection
