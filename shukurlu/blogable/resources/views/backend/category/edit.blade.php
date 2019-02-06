@extends('blogable::backend.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Category
            <small>You can create quickly </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('backend.category.index')}}">Category</a></li>

        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create a Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route("backend.category.update",['id'=>$data->id])}}">

                        {{csrf_field()}}

                        {{method_field('PUT')}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" value="{{isset($data->name) ? $data->name: ""}}" name="name" class="form-control"  placeholder="Name">
                                <p class="help-block" style="color:red">

                                    @if($errors->has('name'))

                                        {{$errors->first('name')}}

                                    @endif

                                </p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Parent Category</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">---</option>
                                    @foreach($blogable->categories as $category)
                                        <option value="{{$category->id}}" {{$category->id==$data->parent_id ? "selected":""}}>{{$category->name}}</option>
                                    @endforeach
                                </select>

                                <p class="help-block">Select a category for this post.</p>

                                <p class="help-block" style="color:red">

                                    @if($errors->has('parent_id'))

                                        {{$errors->first('parent_id')}}

                                    @endif

                                </p>

                            </div>

                            <div class="form-group">
                                <label>Slug :</label>
                                <input type="text" value="{{isset($data->slug) ? $data->slug : ""}}" name="slug" />

                                <p class="help-block">Slug is end part of url it using for identifying url adreses</p>

                                <p class="help-block" style="color:red">

                                    @if($errors->has('slug'))

                                        {{$errors->first('slug')}}

                                    @endif

                                </p>
                            </div>



                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->

        </div>
        <!-- /.row -->
    </section>
@stop
@section('scripts')


@stop