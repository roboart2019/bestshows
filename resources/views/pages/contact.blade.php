@extends('layouts.app')
@section('title', 'Contact Us')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <h1 class="section-title">Contact Us</h1>

    <p style="color: var(--gray-lighter); margin-bottom: 2rem;">
        Have a question, suggestion, or feedback? We'd love to hear from you.
    </p>

    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf

        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            @error('email') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}" required>
            @error('subject') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" class="form-control" required>{{ old('message') }}</textarea>
            @error('message') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.8rem;">Send Message</button>
    </form>
</div>
@endsection
