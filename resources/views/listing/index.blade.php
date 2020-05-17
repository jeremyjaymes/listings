@extends('layouts.app')

@section('button')
    <listing-create :categories="{{ $categories }}" :tags='@json($tags)' :states="{{ $states }}"></listing-create>
@endsection

@section('search')
    @include('partials.search')
@endsection

@section('content')
    <listings :listings='@json($listings)'></listings>
@endsection

@section('sidebar')
    <sidebar :categories="{{ $categories }}" title="{{ config('listings.category_title') }}"></sidebar>
@endsection
