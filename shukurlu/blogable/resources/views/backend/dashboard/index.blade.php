@extends('blogable::backend.layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>You can create quickly </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('backend.dashboard.index')}}">Dashboard</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <h2>You can customize your dashboard how you want</h2>
    </section>
    <!-- /.content -->

@stop