@extends('layouts.app')
@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">

<div class="bg-color flex-center position-ref full-height">
       <div class=" container">
            <div class="row">
                <div class="col-sm-6">
                    <img class="logo_index" src="{{ asset('images/logo_big.png') }}" alt="logo">
                </div>
                <div class="col-sm-6">
                    <img class="logo_IFCE" src="{{ asset('images/logo_ifce.png') }}" alt="logo">
                </div>
            </div>
        </div>
</div>
@endsection

