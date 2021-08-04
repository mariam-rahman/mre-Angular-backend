@extends('layouts.app3')

 <!--this is a link to my own css stylesheet-->

 

    <!--link for fontAwsom-->
   
    @section('content')
    
   


  <!-- Start Content -->
  <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled ">
                    @foreach($categories as $category)
                    <li class="pb-3">
                        <a class=" d-flex justify-content-between h3 text-decoration-none" href="{{route('category.filter',$category)}}">
                            {{$category->title}}
                            <i class="fa fa-fw  mt-1 badge badge-secondary">{{$category->products->count()}}</i>
                        </a>
                    
                    </li>
                    @endforeach
                </ul>
            </div>
          <!-- all men women feature-->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Featured</option>
                                <option>A to Z</option>
                                <option>Item</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Posts start from here-->
                <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                        
                                <img class="card-img rounded-0 img-fluid" src="{{asset('storage/'.$product->image)}}">
                               
                            </div>
                            <div class="card-body">
                                <a href="" class="h3 text-decoration-none">Show Details</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>{{$product->name}}</li>
                                    
                                </ul>
                               
                               
                            </div>
                        </div>
                    </div> 
                    @endforeach
                </div>

                <!--pagination-->
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

    @endsection