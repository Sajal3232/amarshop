@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="well">

            @if ($message=Session::get('message'))
                <h2 id="xyz" class="text-center text-success">{{$message}}</h2>
            @endif           
             <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">SI No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">product Name</th>
                    <th scope="col">product image</th>
                    <th scope="col">product price</th>
                    <th scope="col">product quantity</th>
                    <th scope="col">Publication Status</th>
                    <th scope="col">action</th>                  
                    </tr>
                </thead>
                @php($i=1)
                @foreach($products as $product)
                <tbody>
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->brand_name}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>
                            <img src="{{asset($product->product_image)}}" height="80" width="80">
                        </td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->product_quantity}}</td>
                        <td>{{$product->publication_status==1 ? 'published' :'unpublished'}}</td>
                        <td>  
                            @if($product->publication_status==1)                    
                                <a href="{{route('unpublished-product',['id'=>$product->id])}}" class="btn btn-info btn-sm" title="published">
                                    <span class=""><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                                </a>
                            @else
                            <a href="{{route('published-product',['id'=>$product->id])}}" class="btn btn-warning btn-sm" title="published">
                                    <span class=""><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                            </a>
                            @endif

                            <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-success btn-sm" title="edit">
                            <i class="fas fa-edit    "></i>
                            </a>
                            <a href="" class="btn btn-danger btn-sm" title="delete">
                                <i class="fas fa-trash    "></i>
                            </a>
                        </td>
                        
                    </tr>
                </tbody>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection