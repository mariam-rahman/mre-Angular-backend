
<link href="{{asset('css/mre.css')}}" rel="stylesheet">


    

@extends('layouts.app2')
@section('content')


<div class="row justify-content-center">

     <div class="col-sm-8 d-flex " style="justify-content: space-between;">
         <ol class="ml-2 p-2">
         <li ><h3 class="my-0">Edit Category</h3></li>
         </ol>
        <ol class="breadcrumb p-2 mr-2">
            <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">dashboard</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="card ">
            <div class="card-body">
                <div class="basic-form">
                <div class="basic-form custom_file_input">
                    <form action="{{route('category.update',$category)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Title</label>
                                <input type="text" name="title" value="{{$category->title}}" class="form-control mre" placeholder="Enter Title">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Descriptiion</label>
                                <textarea name="desc"  id="" cols="30" rows="5" class="form-control mre">{{$category->desc}}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                            <label>Image</label>
                            <img src="{{asset('storage/'.$category->image)}}" width="80" alt="">
                            <div class="input-group mt-3">
                                       <input type="file" name="image" class="form-control mre" id="">
                                       
                            </div>
                                
                        </div>
                       
                      
                        <input type="submit" value="Update" class="btn btn-primary">
                        <a href="{{route('category.index')}}" class="btn btn-secondary ml-1" data-dismiss="modal">Close</a>
                    </form>
</div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
        
@endsection