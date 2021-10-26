@extends('layouts.app3')

 

@section('content')


<section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Featured Product</h1>
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>

            </div>
            <div class="row d-flex">
               <div class="col-md-4 d-flex">
               <img src="{{asset('storage/'.$product->image)}}" width="200px" class="card-img-top" alt="...">
               </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                          
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">{{$product->name}}</a>
                            <p class="card-text">
                            Reviews (24)
                            </p>
                            <form action="{{route('Mres.image_deatils',$product)}}" method="get">
                            <input type="submit" value="View" class="btn btn-outline-success p-1 px-2" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="card border-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body text-dark">
    <h5 class="card-title">Dark card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

@endsection