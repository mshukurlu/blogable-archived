@extends('blogable::backend.layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Menus
            <small>You can create quickly </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('backend.category.index')}}">Menus</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Menus</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>

                            @foreach($blogable->all_menus as $item)
                            <tr>

                                <td>{{$item->name}}</td>

                                <td>

                                    <a href="{{route("backend.menus.items.index",['slug'=>$item->slug])}}"><i class="fa fa-fw fa-edit "></i></a>


                                </td>
                            </tr>
                            @endforeach
                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->

@stop