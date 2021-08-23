@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="{{asset('css/mre.css')}}">
<!--**********************************
            Content body start
        ***********************************-->
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <h3>Edit Product</h3>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>



       
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card w-75 justify-content-center">


                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('product.update',$product)}}" method="post">
                            @csrf
                            @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>product Name</label>
                                        <input type="text" name="name" class="form-control mre" value="{{$product->name}}">
                                    </div>


                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category</label>
                                        <select name="category_id" id="inputState" class="form-control mre">
                                            <option selected>Choose...</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $product->category_id? 'selected':''}}>{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>


                                <input type="submit" value="Update" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



</div>
</div>
</div>
</div>





@endsection