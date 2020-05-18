@extends('layouts.app')

@section('button')
    <listing-create :categories="{{ $categories }}" :tags='@json($tags)' :states="{{ $states }}"></listing-create>
@endsection

@section('search')
    @include('partials.search')
@endsection

@section('content')
    <div class="flex flex-no-wrap w-full flex-col md:flex-row">
        <h3 class="text-xl font-bold mb-8">Listings</h3>
    </div>
    <listings :listings='@json($listings)'></listings>
@endsection

@section('sidebar')
    <sidebar :categories="{{ $categories }}" title="{{ config('listings.category_title') }}"></sidebar>
@endsection
