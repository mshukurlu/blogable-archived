@extends('blogable::backend.layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pages
            <small>You can create , modify or  delete </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Pages</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Pages</h3>

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
                                <th>ID</th>
                                <th>Title</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Operations</th>
                            </tr>

                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td><span class="label label-success">{{$post->is_published==1 ? "Active":"Deactive"}}</span></td>
                                <td>

                                    <form style="display: none" id="deleteForm{{$post->id}}" action="{{route("backend.posts.destroy",["id"=>$post->id])}}" method="POST">
                                        {{ method_field('delete') }}
                                        {{csrf_field()}}
                                        <button class="btn btn-default deleteItem" type="submit"></button>
                                    </form>

                                    <a href="{{route("backend.posts.edit",['id'=>$post->id])}}"><i class="fa fa-fw fa-edit "></i></a>
                                    <a onclick="document.getElementById('deleteForm{{$post->id}}').submit();"><i style="color:red" class="fa fa-fw fa-remove"></i></a>

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