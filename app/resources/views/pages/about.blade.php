@extends('layout')

@section('title', 'About')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- about section -->
    @include('sections.about-section')

    <!-- info section -->
    @include('sections.info-section')
@endsection
