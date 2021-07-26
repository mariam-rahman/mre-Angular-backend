@extends('layouts.app')
@section('content')
<link href="{{asset('css/mre.css')}}" rel="stylesheet">

<div class="row justify-content-center">

    <div class="col-sm-8 d-flex " style="justify-content: space-between;">
        <ol class="ml-2 p-2">
            <li>
                <h3 class="my-0">Sell Item</h3>
            </li>
        </ol>
        <ol class="breadcrumb p-2 mr-2">
            <li class="breadcrumb-item"><a href="">move to sale</a></li>
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
                        <form action="{{route('sale.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label>Customer</label>
                                    <select name="customer_id" id="inputState" class="form-control">     
                                    <option value="01">Counter</option>
                                        @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Source</label>
                                    <select name="stock_id" id="inputState" class="form-control">     
                                        <option value="1">Main stock</option>
                                        <option value="2">Sub stock</option>
                                        <option value="3">On sale</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                <label>Date</label>
                                <input type="Date" name="sell_date" class="form-control mre">
                                </div>
                                
                            </div>
                                <input type="submit" value="Continue" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

@endsection