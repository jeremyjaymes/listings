@extends('layouts.app')

@section('button')
    <listing-create :states="{{ $states }}"></listing-create>
@endsection

@section('search')
    @include('partials.search')
@endsection

@section('content')
    <listings :listings="{{$listings->toJson()}}"></listings>
@endsection

@section('sidebar')
    <sidebar :categories="{{ $tags }}"></sidebar>
@endsection
