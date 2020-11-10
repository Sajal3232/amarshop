@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="well">
            @if($message=Session::get('message'))
                <h2 class="text-center text-success">{{$message}}</h2>
            @endif
            <form action="{{route('update-category')}}" class="" method="POST">
                    {{csrf_field()}}
                <div class="form-group">
                    <label for="" class="col-sm-3">Category Name</label>
                     <div class="col-sm-9">
                         <input type="text" name="category_name" id="" value="{{$category->category_name}}" class="form-control"/>
                         <input type="hidden" name="category_id" id="" value="{{$category->id}}" class="form-control"/>
                     </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3">Category Description</label>
                     <div class="col-sm-9">
                         <textarea name="category_description" id="" cols="20" rows="5" class="form-control">{{$category->category_description}}</textarea>
                     </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3">Publication Status</label>
                     <div class="col-sm-9">
                     <label for=""><input type="radio" name="publication_status" id="" {{$category->publication_status == 1 ? 'checked' :' '}} value="1">published</label>
                     <label for=""><input type="radio" name="publication_status" id="" {{$category->publication_status == 0 ? 'checked' :' '}} value="0">unpublished</label>
                     </div>
                </div>
                <div class="form-group">
                     <div class="col-sm-9">
                         <input type="submit" value="update category info" name="btn" class="btn btn-success mt-4">
                     </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection