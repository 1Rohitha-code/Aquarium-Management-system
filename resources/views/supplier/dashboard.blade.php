@extends('root.master_page')

@section('seemorepagestyles')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<!--ADMIN LTE LINKS-->
<link rel="stylesheet" href="{{asset('AdminLTElinks/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminLTElinks/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTElinks/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!--ADMIN LTE LINKS-->
@endsection


@section('title')
Supplier Dashboard
@endsection

@section('navbar')
@include('supplier.navbar')
@endsection

@section('usertype')
Supplier Dashboard
@endsection

@section('content')
@include('supplier.control_panel')
@endsection
