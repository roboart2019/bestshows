@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div style="max-width: 450px; margin: 2rem auto;">
    <h1 class="section-title">Member Login</h1>

    <div style="background: var(--gray); padding: 2rem; border-radius: 8px;">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                @error('email') <p class="form-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password') <p class="form-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label class="form-check">
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.8rem;">Login</button>
        </form>

        <p style="text-align: center; margin-top: 1.5rem; color: var(--gray-lighter);">
            Don't have an account? <a href="{{ route('register') }}" style="color: var(--primary);">Sign up free</a>
        </p>
    </div>
</div>
@endsection
