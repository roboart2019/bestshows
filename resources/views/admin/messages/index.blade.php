@extends('layouts.admin')
@section('title', 'Contact Messages')

@section('content')
<h1 class="section-title">Contact Messages</h1>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Status</th>
                <th>From</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
            <tr style="{{ !$message->is_read ? 'font-weight: bold;' : '' }}">
                <td><span class="badge {{ $message->is_read ? 'badge-success' : 'badge-warning' }}">{{ $message->is_read ? 'Read' : 'New' }}</span></td>
                <td>{{ $message->name }}<br><small style="color: var(--gray-lighter);">{{ $message->email }}</small></td>
                <td><a href="{{ route('admin.messages.show', $message) }}" style="color: var(--primary);">{{ $message->subject }}</a></td>
                <td>{{ $message->created_at->format('M j, Y g:ia') }}</td>
                <td>
                    <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-secondary">View</a>
                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" style="display: inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this message?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align: center; color: var(--gray-lighter);">No messages.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination">{{ $messages->links('partials.pagination') }}</div>
@endsection
