@extends('layouts.admin')
@section('title', 'Ad Placements')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h1 class="section-title" style="margin-bottom: 0; border: none; padding: 0;">Ad Placements (AdWords)</h1>
    <a href="{{ route('admin.adwords.create') }}" class="btn btn-primary">+ Add New Ad</a>
</div>

<p style="color: var(--gray-lighter); margin-bottom: 1.5rem;">
    Manage your Google AdWords and other advertising code here. Paste your ad code snippets and assign them to different positions on the site.
</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Placement</th>
                <th>Status</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($adwords as $ad)
            <tr>
                <td>{{ $ad->name }}</td>
                <td>{{ $placements[$ad->placement] ?? $ad->placement }}</td>
                <td><span class="badge {{ $ad->is_active ? 'badge-success' : 'badge-danger' }}">{{ $ad->is_active ? 'Active' : 'Inactive' }}</span></td>
                <td>{{ $ad->sort_order }}</td>
                <td>
                    <a href="{{ route('admin.adwords.edit', $ad) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('admin.adwords.destroy', $ad) }}" method="POST" style="display: inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this ad placement?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align: center; color: var(--gray-lighter);">No ad placements yet. Add your Google AdWords code!</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="background: var(--gray); padding: 1.5rem; border-radius: 8px; margin-top: 2rem;">
    <h3 style="margin-bottom: 0.5rem;">Available Placements</h3>
    <ul style="list-style: none; color: var(--gray-lighter);">
        @foreach($placements as $key => $label)
            <li style="padding: 0.3rem 0;"><strong style="color: var(--white);">{{ $label }}:</strong>
                @switch($key)
                    @case('header') Appears above the navigation bar @break
                    @case('sidebar') Appears in the right sidebar on pages @break
                    @case('footer') Appears above the footer @break
                    @case('in_content') Appears within page content @break
                    @case('between_listings') Appears between show listings @break
                @endswitch
            </li>
        @endforeach
    </ul>
</div>
@endsection
