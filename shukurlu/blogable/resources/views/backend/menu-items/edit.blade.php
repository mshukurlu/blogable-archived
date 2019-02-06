@extends('blogable::backend.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Category
            <small>You can create quickly </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Category</a></li>

        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create a Menu Item</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route("backend.menus.items.update",['slug'=>$slug,'id'=>$data->id])}}">

                        {{csrf_field()}}

                        {{method_field('PATCH')}}

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
                                <label>Item Type</label>
                                <div>
                                    <label class="radio-inline"><input type="radio" value="0" name="url_type"  {{$data->url_type==0  || $data->url_type==3 ? "checked": ""}}>URL</label>
                                    <label class="radio-inline"><input type="radio" value="1" name="url_type" {{$data->url_type==1 ? "checked": ""}}>Internal item</label>
                                    <p class="help-block red">
                                        @if($errors->has('url_type'))

                                            {{$errors->first('url_type')}}

                                        @endif
                                    </p>

                                </div>
                            </div>

                            <div class="item_type_internal" style="{{$data->url_type!=1 ? "display:none":""}}">
                                <div class="form-group">
                                    <label>Pages - You can use page's content for menu item</label>
                                    <select name="blog_id" class="form-control">
                                        <option value="0">---</option>
                                        @foreach($posts as $post)
                                            <option value="{{$post->id}}" {{$post->id==$data->blog_id ? "selected": ""}}>{{$post->title}}</option>
                                        @endforeach
                                    </select>

                                    <p class="helper-block red">

                                        @if($errors->has('blog_id'))

                                            {{$errors->first('blog_id')}}

                                        @endif

                                    </p>
                                </div>

                            </div>

                            <div class="item_type_url" style="{{$data->url_type==1  ? "display:none" : ""}}">
                                <div class="form-group">
                                    <label>External Url adress</label>
                                    <input type="text" class="form-control" name="url" value="{{isset($data->url) ? $data->url:""}}" />
                                    <p class="helper-block red">

                                        @if($errors->has('url'))

                                            {{$errors->first('url')}}

                                        @endif

                                    </p>
                                </div>

                                <div class="form-group">
                                    <label>Url Actions</label>
                                    <p>Do you want this url open in a new tab? </p>

                                    <p><input type="checkbox" name="type" {{$data->url_type==3 ? "checked":""}} style="margin-top:2px"/> YES</p>
                                    <p class="helper-block red">

                                        @if($errors->has('type'))

                                            {{$errors->first('type')}}

                                        @endif

                                    </p>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">Attach to a Menu</label>
                                <select name="menu_slug" class="form-control">
                                    <option value="0">---</option>
                                    @foreach($blogable->all_menus as $menu)
                                        <option value="{{$menu->slug}}" {{$menu->slug==$data->menu_slug ? "selected":""}}>{{$menu->name}}</option>
                                    @endforeach
                                </select>

                                <p class="help-block">Select a category for this post.</p>

                                <p class="help-block" style="color:red">

                                    @if($errors->has('menu_slug'))

                                        {{$errors->first('menu_slug')}}

                                    @endif

                                </p>

                            </div>

                        </div>
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
    <script>
        $(document).ready(function(){

            $("input[type=radio][name=url_type]").change(function () {

                if($(this).val()==0)
                {
                    $(".item_type_url").show();

                    $(".item_type_internal").hide();
                }else
                {
                    $(".item_type_url").hide();

                    $(".item_type_internal").show();
                }
            })
        });
    </script>
@stop