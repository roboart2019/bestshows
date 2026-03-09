@extends('layouts.admin')
@section('title', 'Add Ad Placement')

@section('content')
<h1 class="section-title">Add Ad Placement</h1>

<form method="POST" action="{{ route('admin.adwords.store') }}" style="max-width: 700px;">
    @csrf
    @include('admin.adwords._form')
    <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem;">Create Ad Placement</button>
    <a href="{{ route('admin.adwords.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
