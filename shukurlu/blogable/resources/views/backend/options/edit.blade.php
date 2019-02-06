@extends('blogable::backend.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Options
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
                        <h3 class="box-title">Options</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route("backend.options.update",['id'=>$data->id])}}">

                        {{csrf_field()}}
                        {{method_field("PATCH")}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option Name</label>
                                <input type="text" value="{{$data->option_name}}" name="option_name" class="form-control"  placeholder="Options Key">
                                <p class="help-block" style="color:red">

                                    @if($errors->has('option_name'))

                                        {{$errors->first('option_name')}}

                                    @endif

                                </p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Option Value</label>
                                <input type="text" value="{{$data->option_value}}" name="option_value" class="form-control"  placeholder="Option Value">
                                <p class="help-block" style="color:red">

                                    @if($errors->has('option_value'))

                                        {{$errors->first('option_value')}}

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