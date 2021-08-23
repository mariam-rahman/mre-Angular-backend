

@extends('layouts.app3')

 

@section('content')



    <!--Slider -->

    <div class="bgcolor mx-auto w-80 ">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row p-5 d-flex">
                            <div class="mx-auto col-md-6 order-lg-last">
                                <img class="img-fluid" src="images/shose.jpg" class="d-block" alt="...">
                            </div>
                            <div class="col-md-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="h1 text-success"><b>Zay</b> eCommerce</h1>
                                    <h3 class="h2">Tiny and Perfect eCommerce Template</h3>
                                    <p>
                                        Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta 1).
                                        This template is 100% free provided by <a rel="sponsored" class="text-success" href="https://templatemo.com/" target="_blank">TemplateMo</a> website.
                                        Image credits go to <a rel="sponsored" class="text-success" href="https://stories.freepik.com/" target="_blank">Freepik Stories</a>,
                                        <a rel="sponsored" class="text-success" href="https://unsplash.com/" target="_blank">Unsplash</a> and
                                        <a rel="sponsored" class="text-success" href="https://icons8.com/" target="_blank">Icons 8</a>.
                                    </p>
                                </div>

                            </div>
                            <!--row-->
                        </div>
                        <!--container-->
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="container">
                        <div class="row p-5 d-flex">
                            <div class="mx-auto col-md-6 order-lg-last">
                                <img src="images/banner_img_02.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="col-md-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="h1 text-success"><b>Zay</b> eCommerce</h1>
                                    <h3 class="h2">Tiny and Perfect eCommerce Template</h3>
                                    <p>
                                        Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta 1).
                                        This template is 100% free provided by <a rel="sponsored" class="text-success" href="https://templatemo.com/" target="_blank">TemplateMo</a> website.
                                        Image credits go to <a rel="sponsored" class="text-success" href="https://stories.freepik.com/" target="_blank">Freepik Stories</a>,
                                        <a rel="sponsored" class="text-success" href="https://unsplash.com/" target="_blank">Unsplash</a> and
                                        <a rel="sponsored" class="text-success" href="https://icons8.com/" target="_blank">Icons 8</a>.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="carousel-item">
                    <div class="container">
                        <div class="row p-5 d-flex">
                            <div class="mx-auto col-md-6 order-lg-last">
                                <img src="images/banner_img_03.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="col-md-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="h1 text-success"><b>Zay</b> eCommerce</h1>
                                    <h3 class="h2">Tiny and Perfect eCommerce Template</h3>
                                    <p>
                                        Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta 1).
                                        This template is 100% free provided by <a rel="sponsored" class="text-success" href="https://templatemo.com/" target="_blank">TemplateMo</a> website.
                                        Image credits go to <a rel="sponsored" class="text-success" href="https://stories.freepik.com/" target="_blank">Freepik Stories</a>,
                                        <a rel="sponsored" class="text-success" href="https://unsplash.com/" target="_blank">Unsplash</a> and
                                        <a rel="sponsored" class="text-success" href="https://icons8.com/" target="_blank">Icons 8</a>.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>








            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <!--conrainer-->






    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories of The Month</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-12 col-md-4 p-5 mt-3 ">
                <a href="#"><img src="{{asset('storage/'.$category->image)}}" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">{{$category->title}}</h5>
                <p class="text-center"><a class="btn btn-success">view</a></p>
            </div>
            @endforeach
        </div>
    </section>
    <!-- End Categories of The Month -->





    <!-- Start Featured Product -->
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
            <div class="row">
                @foreach($products as $product)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="{{'storage/'.$product->image}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>

                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">{{$product->name}}</a>
                            <p class="card-text">
                                {{$product->desc}}
                            </p>
                            <p class="text-muted">Reviews (24)</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Featured Product -->




@endsection

