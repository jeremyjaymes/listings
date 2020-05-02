@extends('layouts.app')

@section('button')
    <listing-create :states="{{ $states }}"></listing-create>
@endsection
@section('content')
    <listings :listings="{{$listings->toJson()}}"></listings>
@endsection
