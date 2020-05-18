@extends('emails.master')

@section('content')
    <div style="padding: 15px 15px 0;">
        <h3 style="margin-bottom: 10px; text-transform: uppercase; -webkit-font-kerning: auto; font-kerning: auto; font-weight: 600; color: #424242; margin-top: 22px;">
            Listing Approved
        </h3>
    </div>
    <div style="padding: 15px 15px 10px 15px;">
        <p style="color: #424242;font-family:sans-serif;font-size: 15px;margin:0;margin-bottom:20px">
            You can now view your listing at {{ url('/') }}.
        </p>
    </div>
@endsection
