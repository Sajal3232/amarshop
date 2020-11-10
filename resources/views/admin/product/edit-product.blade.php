@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="well">
            @if($message=Session::get('message'));         
            <h2 class="text-center text-success">{{$message}}</h2>
            @endif
            {{ Form::open(['route'=>'product-update', 'method'=>'post', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'name'=>'editProductsForm']) }}
            <div class="form-group">
                <label for="" class="control-label col-md-3">Category Name</label>
                <div class="col-lg-9">
                    <select name="category_id" id="" class="form-control">
                        <option value="">----select category name----</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : ' '}}</span>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Brand Name</label>
                <div class="col-lg-9">
                    <select name="brand_id" id="" class="form-control">
                        <option value="">----select category name----</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{ $brand->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-danger">{{ $errors->has('brand_id') ? $errors->first('brand_id') : ' '}}</span>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Product Name</label>
                <input type="text" name="product_name" class='col-md-9 form-control' value="{{$product->product_name}}">
                <input type="hidden" name="product_id" class='col-md-9 form-control' value="{{$product->id}}">
                <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : ' '}}</span>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Product price</label>
                <input type="number" name="product_price" class='col-md-9 form-control' value="{{$product->product_price}}">
                <span class="text-danger">{{ $errors->has('product_price') ? $errors->first('product_price') : ' '}}</span>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Product Quantity</label>
                <input type="number" name="product_quantity" class='col-md-9 form-control' value="{{$product->product_quantity}}">
                <span class="text-danger">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' '}}</span>
            </div>


            <div class="form-group">
                <label for="" class="control-label col-md-3">Short Description</label>
                <textarea name="short_description" class="form-control col-md-9">{{$product->short_description}}</textarea>
                <span class="text-danger">{{ $errors->has('short_description') ? $errors->first('short_description') : ' '}}</span>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">{{$product->long_description}}</label>
                <textarea name="long_description" id="editor" class="form-control col-md-9">{{$product->long_description}}</textarea>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Product Image</label>
                <input type="file" name="product_image" accept="image/*"><br>
                <img src="{{asset($product->product_image)}}" alt="" height="80" width="80">
                <span class="text-danger">{{ $errors->has('product_image') ? $errors->first('product_image') : ' '}}</span>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-3">Publication Status</label>
                <span class="text-danger"></span>
                <div class='col-md-9'>
                    <label><input type="radio" name="publication_status" {{$product->publication_status ==1 ? 'checked' :' '}} value="1">published</label>
                    <label><input type="radio" name="publication_status" {{$product->publication_status ==0 ? 'checked' :' '}}  value="0"/>unpublished</label><br>
                  <span class="text-danger">  {{ $errors->has('publication_status') ? $errors->first('publication_status') : ' '}}</span>
                </div>
            </div>
            <input type="submit" name="btn" class='btn btn-lg btn-info' value="update product info">
            {{ Form::close() }}
        </div>
    </div>
</div>
<script>
    document.forms['editProductsForm'].elements['category_id'].value='{{$product->category_id}}';
    document.forms['editProductsForm'].elements['brand_id'].value='{{$product->brand_id}}';
</script>
@endsection