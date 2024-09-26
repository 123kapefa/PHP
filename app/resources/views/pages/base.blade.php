@extends('layout')

@section('title', 'Home')

@section('content')
    <!-- slider section -->
    @include('sections.slider-section')

    <!-- feature section -->
    @include('sections.feature-section')

    <!-- about section -->
    @include('sections.about-section')

    <!-- professional section -->
    @include('sections.professional-section')

    <!-- service section -->
    @include('sections.service-section')

    <!-- client section -->
    @include('sections.client-section')

    <!-- contact section -->
    @include('sections.contact-section')

    <!-- info section -->
    @include('sections.info-section')
@endsection
