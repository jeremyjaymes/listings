@extends('layouts.app')

@section('content')
    <ul class="text-sm mb-6">
        <li class="inline">
            <a class="text-blue-300" href="{{ url('/') }}">Home</a>
        </li>
        <li class="inline">
            &raquo; {{ $listing->name }}
        </li>
    </ul>
    <listing-edit :listing='@json($listing)' :categories="{{ $categories }}"
                  :tags='@json($tags)' :states="{{ $states }}"></listing-edit>
@endsection
