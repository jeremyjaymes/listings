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
    <listing :listing="{{ $listing->toJson() }}" tag-title="{{ config('listings.tag_title') }}"></listing>

    @if (auth()->user() && auth()->user()->is_admin)
       <a href="{{ route('listings.edit', ['listing' => $listing]) }}" class="text-blue-300">Edit</a>
    @endif
@endsection
