@extends('layouts.admin')
@section('title', 'Message')

@section('content')
<h1 class="section-title">Message from {{ $message->name }}</h1>

<div style="background: var(--gray); padding: 1.5rem; border-radius: 8px; max-width: 700px;">
    <div style="margin-bottom: 1rem;">
        <strong>From:</strong> {{ $message->name }} ({{ $message->email }})<br>
        <strong>Subject:</strong> {{ $message->subject }}<br>
        <strong>Date:</strong> {{ $message->created_at->format('F j, Y g:ia') }}
    </div>

    <div style="background: var(--darker); padding: 1rem; border-radius: 4px; line-height: 1.7;">
        {{ $message->message }}
    </div>

    <div style="margin-top: 1.5rem;">
        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-primary">Reply via Email</a>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Back to Messages</a>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" style="display: inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this message?')">Delete</button>
        </form>
    </div>
</div>
@endsection
