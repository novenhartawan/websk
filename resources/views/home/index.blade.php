@extends('layout.master')

@section('title', 'Homee')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    @if (Auth::check())
        
    <h2>Selamat Datang {{ Auth::user()->email }}</h2>
    @else
    <h2>Anda Belum login</h2>
    @endif
@endsection
