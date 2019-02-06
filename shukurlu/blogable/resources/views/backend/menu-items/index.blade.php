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

                        <div class="box-tools">
                            <form action="" method="GET">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="q" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>

                            @foreach($data as $item)
                                <tr>

                                    <td>{{$item->name}}</td>

                                    <td>

                                        <form style="display: none" id="deleteForm{{$item->id}}" action="{{route("backend.menus.items.destroy",["id"=>$item->id,"menu_slug"=>$item->menu_slug])}}" method="POST">
                                            {{ method_field('delete') }}
                                            {{csrf_field()}}
                                            <button class="btn btn-default deleteItem" type="submit"></button>
                                        </form>

                                        <a href="{{route("backend.menus.items.edit",['slug'=>$item->menu_slug,'id'=>$item->id])}}"><i class="fa fa-fw fa-edit "></i></a>
                                        <a onclick="document.getElementById('deleteForm{{$item->id}}').submit();"><i style="color:red" class="fa fa-fw fa-remove"></i></a>

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