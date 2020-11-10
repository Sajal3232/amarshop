@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="well">
            @if($message=Session::get('message'))
                <h2 id="xyz" class="text-center text-success">{{$message}}</h2>
                @endif
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">SI No</th>
                  <th scope="col">Brand Name</th>
                  <th scope="col">Brand Description</th>
                  <th scope="col">Publication Status</th>
                  <th scope="col">action</th>                  
                </tr>
              </thead>
              @php ($i=1)
              @foreach($brands as $brand)
              <tbody>
                <td>{{$i++}}</td>
                <td>{{$brand->brand_name}}</td>
                <td>{{$brand->brand_description}}</td>
                <td>{{$brand->publication_status==1 ? 'published' : 'unpublished'}}</td>
                <td>
                    @if($brand->publication_status==1)
                    <a href="{{route('unpublished-brand',['id'=>$brand->id])}}" class="btn btn-info btn-sm">
                        <span class=""><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                    </a>
                    @else
                    <a href="{{route('published-brand',['id'=>$brand->id])}}" class="btn btn-warning btn-sm">
                        <span class=""><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                    </a>
                    @endif

                    <a href="{{route('edit-brand',['id'=>$brand->id])}}" class="btn btn-success btn-sm">
                    <i class="fas fa-edit    "></i>
                    </a>
                    <a href="{{route('delete-brand',['id'=>$brand->id])}}" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash    "></i>
                    </a>

                </td>
              </tbody>
              @endforeach
            </table>
        </div>
    </div>
</div>
@endsection