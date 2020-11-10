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
                  <th scope="col">Category Name</th>
                  <th scope="col">Category Description</th>
                  <th scope="col">Publication Status</th>
                  <th scope="col">action</th>                  
                </tr>
              </thead>
              @php ($i=1)
              @foreach($categories as $category)
              <tbody>
                <td>{{$i++}}</td>
                <td>{{$category->category_name}}</td>
                <td>{{$category->category_description}}</td>
                <td>{{$category->publication_status == 1 ? 'published':'unpublished'}}</td>
                <td>
                    @if($category->publication_status==1)
                    <a href="{{route('unpublished-category',['id'=>$category->id])}}" class="btn btn-info btn-sm">
                        <span class=""><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                    </a>
                    @else
                    <a href="{{route('published-category',['id'=>$category->id])}}" class="btn btn-warning btn-sm">
                        <span class=""><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                    </a>
                    @endif

                    <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-success btn-sm">
                    <i class="fas fa-edit    "></i>
                    </a>
                    <a href="{{route('delete-category',['id'=>$category->id])}}" class="btn btn-danger btn-sm">
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