@extends('layouts.admin')
@section('title', 'Manage Shows')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h1 class="section-title" style="margin-bottom: 0; border: none; padding: 0;">Manage Shows</h1>
    <a href="{{ route('admin.shows.create') }}" class="btn btn-primary">+ Add New Show</a>
</div>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Rating</th>
                <th>Year</th>
                <th>Featured</th>
                <th>Published</th>
                <th>Reviews</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($shows as $show)
            <tr>
                <td><a href="{{ route('shows.show', $show) }}" style="color: var(--primary);">{{ $show->title }}</a></td>
                <td>{{ $show->type === 'movie' ? 'Movie' : 'TV Show' }}</td>
                <td>{{ $show->standard_rating ?? '-' }}</td>
                <td>{{ $show->release_year ?? '-' }}</td>
                <td><span class="badge {{ $show->is_featured ? 'badge-success' : 'badge-danger' }}">{{ $show->is_featured ? 'Yes' : 'No' }}</span></td>
                <td><span class="badge {{ $show->is_published ? 'badge-success' : 'badge-danger' }}">{{ $show->is_published ? 'Yes' : 'No' }}</span></td>
                <td>{{ $show->reviews()->count() }}</td>
                <td>
                    <a href="{{ route('admin.shows.edit', $show) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('admin.shows.destroy', $show) }}" method="POST" style="display: inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this show and all its reviews?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="8" style="text-align: center; color: var(--gray-lighter);">No shows yet. Add your first one!</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination">{{ $shows->links('partials.pagination') }}</div>
@endsection
