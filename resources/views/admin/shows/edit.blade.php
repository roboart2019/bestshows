@extends('layouts.admin')
@section('title', 'Edit Show')

@section('content')
<h1 class="section-title">Edit: {{ $show->title }}</h1>

<form method="POST" action="{{ route('admin.shows.update', $show) }}" style="max-width: 800px;">
    @csrf @method('PUT')
    @include('admin.shows._form', ['show' => $show])
    <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem;">Update Show</button>
    <a href="{{ route('admin.shows.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
