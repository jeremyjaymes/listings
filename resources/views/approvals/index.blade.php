@extends('layouts.app')

@section('content')
    <approvals :listings="{{$listings->toJson()}}"></approvals>
@endsection
