@extends('root.master_page')

@section('title')
Deliver person Dashboard
@endsection

@section('navbar')
@include('deliver-person.navbar')
@endsection


@section('content')


@include('deliver-person.control_panel')



@endsection

@section('datatablescripts')


@endsection