@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link href="{{ asset('css/style-app.css') }}" rel="stylesheet">

<div class="bg-color flex-center position-ref full-height">
       <div class="content">
        <a href="{{ route('login') }}"><img class="logo_index" src="{{ asset('images/logo_big.png') }}" alt="logo"></a>
    </div>
</div>
@endsection

