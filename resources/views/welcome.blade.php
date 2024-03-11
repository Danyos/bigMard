@extends('layouts.base')

@section('content')
<h1>Hello Daniel</h1>
    @include('includes.WelcoomSlid')
    @include('includes.service')
    <!--Shopping-->
    <livewire:item />
    <!--Shopping ends-->

@endsection
