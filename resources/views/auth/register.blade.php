@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div style="max-width: 450px; margin: 2rem auto;">
    <h1 class="section-title">Become a Member</h1>

    <div style="background: var(--gray); padding: 2rem; border-radius: 8px;">
        <p style="color: var(--gray-lighter); margin-bottom: 1.5rem;">Join Best Shows Entertainment to rate and review your favorite movies and TV shows.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                @error('name') <p class="form-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email') <p class="form-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password') <p class="form-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.8rem;">Create Account</button>
        </form>

        <p style="text-align: center; margin-top: 1.5rem; color: var(--gray-lighter);">
            Already have an account? <a href="{{ route('login') }}" style="color: var(--primary);">Login here</a>
        </p>
    </div>
</div>
@endsection
