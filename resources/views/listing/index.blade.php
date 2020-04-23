@extends('layouts.app')

@section('content')
<div class="container">
    <listings :listings="{{$listings->toJson()}}"></listings>
</div>
@endsection
