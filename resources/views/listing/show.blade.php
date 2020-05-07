@extends('layouts.app')

@section('content')
    <listing :listing="{{ $listing->toJson() }}"></listing>
@endsection
