@extends('layouts.app')

@section('title', 'Payment')
@section('css')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="../../assets/css/global.css">
<link rel="stylesheet" href="../../assets/css/variable.css">
    <link rel="stylesheet" href="../../assets/css/payment.css">

    <title>Payment Page</title>
@endsection

@section('content')
    <div id="navbar-top">
        <div class="navbar-simple-wrapper">
            <button class="btn-transparent">
                <a href="javascript:void(0)" class="text-white" onclick="goBack()">
                    <img src="../../assets/img/icons/back-light.svg" alt="">
                </a>
            </button>
            <h4 class="navbar-wrapper-title">Pembayaran</h4>
        </div>
    </div>

    <div class="screen">
        <div class="row">
            <div class="col-12">
                <div class="nominal-section">
                    <input type="text" class="nominal-donasi rupiah" value="{{$_GET['n']}}" placeholder="Nominal donasi lainnya">
                </div>
            </div>

             <div class="col-12">
                <div class="method-section">
                    @error('payment')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                    <div class="line-separator"></div>
                    <h4 class="section-title">Metode pembayaran</h4>

                    <a href="payment?n={{ Request::get('n') }}&q={{ Request::get('q') }}" class="method-bar">
                        <h4 class="method-title">{{ Session::get('payment') ?? 'Pilih metode pembayaran' }}</h4>
                        <button class="btn btn-choose-method"><img src="../../assets/img/icons/choose-dark.svg" alt=""></button>
                    </a>

                    <div class="line-separator"></div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-section">
                    @if (!auth::user())
                    <h4 class="form-title"><a href="/login">Masuk</a> atau lengkapi data dibawah</h4>
                    @endif
                    <form method="post" id="form-nominal" action="{{ url()->current() }}">
                        @include('layouts.notif')
                        @csrf
                    @error('nominal')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                    <input type="hidden" name="nominal" value="{{ Request::get('n') }}">
                    @error('qurban')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                    <input type="hidden" name="qurban" value="{{ Request::get('q') }}">

                    <input type="hidden" name="url" value="@if(request()->has('t')) {{ base64_decode(request()->t) }} @endif">

                    @error('donature_name')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                    <input type="text" class="form-input" placeholder="Nama Lengkap" name="donature_name" @if (auth::user()) value="{{auth::user()->name}}" @endif>

                    @error('donature_email')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                    <input type="text" class="form-input" placeholder="Email" name="donature_email" @if (auth::user()) value="{{auth::user()->email}}" @endif>

                    @error('donature_phone')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                    <input type="text" class="form-input" placeholder="Nomor Whatsapp" name="donature_phone" @if (auth::user()) value="{{auth::user()->phone}}" @endif>

                    @error('atas_nama')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                    <input type="text" class="form-input" placeholder="Berqurban atas nama" name="atas_nama">

                    <div class="form-slider-group">
                        <h4 class="form-slider-label">Bersedia dihubungi melalui WhatsApp?</h4>
                        <label class="form-slider">
                            <input type="checkbox" name="whatsapp" value="1">
                            <span class="slider round"></span>
                        </label>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div id="navbar-bottom">
        <button class="btn-pay-donation">Qurban Sekarang</button>
    </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="../../assets/js/global.js"></script>
<script src="../../assets/js/payment.js"></script>
@endsection