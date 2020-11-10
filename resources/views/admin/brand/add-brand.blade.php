@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="well">
            @if($message=Session::get('message'))
                <h2 class="text-center text-success">{{$message}}</h2>
            @endif

            {{Form::open(['route'=>'new-brand','method'=>'post','class'=>'form-horizontal'])}}
                <div class="form-group">
                    <label for="" class="col-sm-3">Brand Name</label>
                     <div class="col-sm-9">
                         <input type="text" name="brand_name" id="" class="form-control"/>
                         <span class="text-danger">{{$errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
                     </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3">Brand Description</label>
                     <div class="col-sm-9">
                         <textarea name="brand_description" id="" cols="20" rows="5" class="form-control"></textarea>
                            <span class="text-danger">{{$errors->has('brand_description') ? $errors->first('brand_description') : ' '}}</span>
                     </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3">Publication Status</label>
                     <div class="col-sm-9">
                     <label for=""><input type="radio" name="publication_status" id="" value="1">published</label>
                     <label for=""><input type="radio" name="publication_status" id="" value="0">unpublished</label><br>
                     <span class="text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status') : ' '}}</span>
                     </div>
                </div>
                <div class="form-group">
                     <div class="col-sm-9">
                         <input type="submit" value="add brand info" name="btn" class="btn btn-success mt-4">
                     </div>
                </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@endsection