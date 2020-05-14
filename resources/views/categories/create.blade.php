@extends('layouts.app')

@section('content')
    <category-create :categories='@json($categories)'></category-create>
@endsection

