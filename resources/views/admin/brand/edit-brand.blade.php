@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="well">
            @if($message=Session::get('message'))
                <h2 class="text-center text-success">{{$message}}</h2>
            @endif
            {{Form::open(['route'=>'update-brand','method'=>'post'])}}
                <div class="form-group">
                    <label for="" class="col-sm-3">Brand Name</label>
                     <div class="col-sm-9">
                         <input type="text" name="brand_name" id="" value="{{$brand->brand_name}}" class="form-control"/>
                         <input type="hidden" name="brand_id" id="" value="{{$brand->id}}" class="form-control"/>
                     </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3">Brand Description</label>
                     <div class="col-sm-9">
                         <textarea name="brand_description" id="" cols="20" rows="5" class="form-control">{{$brand->brand_description}}</textarea>
                     </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3">Publication Status</label>
                     <div class="col-sm-9">
                     <label for=""><input type="radio" name="publication_status" id="" {{$brand->publication_status==1 ?'checked':' '}} value="1">published</label>
                     <label for=""><input type="radio" name="publication_status" id="" {{$brand->publication_status==0 ?'checked':' '}} value="0">unpublished</label>
                     </div>
                </div>
                <div class="form-group">
                     <div class="col-sm-9">
                         <input type="submit" value="update brand info" name="btn" class="btn btn-success mt-4">
                     </div>
                </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@endsection