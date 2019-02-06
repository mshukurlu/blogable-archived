@extends('blogable::backend.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Pages
            <small>You can create quickly </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pages</a></li>

        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Write a post</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route("backend.posts.store")}}">

                        {{csrf_field()}}


                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" value="" name="title" class="form-control"  placeholder="title">
                                <p class="help-block" style="color:red">

                                    @if($errors->has('title'))

                                        {{$errors->first('title')}}

                                    @endif

                                </p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Content</label>
                                <textarea name="text" id="editor1" class="form-control" name="editor1" rows="10" cols="80">
                                            {{isset($post->text) ? $post->text : ""}}
                                </textarea>

                                <p class="help-block" style="color:red">

                                    @if($errors->has('text'))

                                        {{$errors->first('text')}}

                                    @endif

                                </p>
                            </div>


                            <div class="form-group">
                                <label>Slug :</label>
                                <input type="text" value="{{isset($post->slug) ? $post->slug : ""}}" name="slug" />

                                <p class="help-block">Slug is end part of url it using for identifying url adreses</p>

                                <p class="help-block" style="color:red">

                                    @if($errors->has('slug'))

                                        {{$errors->first('slug')}}

                                    @endif

                                </p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($blogable->categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                <p class="help-block">Select a category for this post.</p>

                                <p class="help-block" style="color:red">

                                    @if($errors->has('category_id'))

                                        {{$errors->first('category_id')}}

                                    @endif

                                </p>

                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">Publish</label>
                                <select name="is_published" class="form-control">

                                    <option value="0" >Deactive</option>
                                    <option value="1" >Active</option>
                                </select>

                                <p class="help-block">Publishing post</p>

                                <p class="help-block" style="color:red">

                                    @if($errors->has('is_published'))

                                        {{$errors->first('is_published')}}

                                    @endif

                                </p>

                            </div>

                            <div class="form-group">
                                <label>Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="created_at" type="text" class="form-control pull-right" id="datepicker">

                                    <script>
                                        $("#datepicker").datepicker("setDate", new Date);
                                    </script>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
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

    <script src="{{asset("/blogable/backend/js/lib/select2.full.min.js")}}"></script>
    <!-- CK Editor -->
    <script src="{{asset("/blogable/backend/ckeditor/ckeditor.js")}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset("/blogable/backend/js/lib/bootstrap3-wysihtml5.all.min.js")}}"></script>

    <script src="{{asset("/blogable/backend/js/lib/datepicker.min.js")}}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })



    </script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();




            $('#datepicker').datepicker("setValue", '01/10/2014' );
        })
    </script>
@stop