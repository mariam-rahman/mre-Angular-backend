<link href="{{asset('css/mre.css')}}" rel="stylesheet">




@extends('layouts.app')
@section('content')


<div class="row justify-content-center">

    <div class="col-sm-8 d-flex " style="justify-content: space-between;">
        <ol class="ml-2 p-2">
            <li>
                <h3 class="my-0">Move to on sale</h3>
            </li>
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
                        <form action="{{route('substock.move_to_sell',$productId)}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Qauntity</label>
                                    <input type="number" name="move_qty" class="form-control mre">
                                </div>

                                <div class="form-group col-md-6">
                                <label>Discount %</label>
                                <input type="number" name="discount" class="form-control mre">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Sell price per Item</label>
                                <input type="number" name="sell_price" class="form-control mre">
                                </div>
                            </div>
                                <input type="submit" value="Move" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

@endsection