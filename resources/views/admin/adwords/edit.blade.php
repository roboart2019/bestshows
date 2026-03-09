@extends('layouts.admin')
@section('title', 'Edit Ad Placement')

@section('content')
<h1 class="section-title">Edit: {{ $adword->name }}</h1>

<form method="POST" action="{{ route('admin.adwords.update', $adword) }}" style="max-width: 700px;">
    @csrf @method('PUT')
    @include('admin.adwords._form', ['adword' => $adword])
    <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem;">Update Ad Placement</button>
    <a href="{{ route('admin.adwords.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
