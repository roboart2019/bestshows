@extends('layouts.admin')
@section('title', 'Add Show')

@section('content')
<h1 class="section-title">Add New Show</h1>

<form method="POST" action="{{ route('admin.shows.store') }}" style="max-width: 800px;">
    @csrf
    @include('admin.shows._form')
    <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem;">Create Show</button>
    <a href="{{ route('admin.shows.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
