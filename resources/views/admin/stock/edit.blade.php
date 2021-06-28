


    

@extends('layouts.app')

@section('content')

@include('partials.sidenav')
<div class="row justify-content-center">

     <div class="col-sm-8 d-flex " style="justify-content: space-between;">
         <ol class="ml-2 p-2">
         <li ><h3 class="my-0">Edit Stock</h3></li>
         </ol>
        <ol class="breadcrumb p-2 mr-2">
            <li class="breadcrumb-item"><a href="{{route('stock.index')}}">Stock</a></li>
            <li class="breadcrumb-item active"><a href="dashboard.index">dashboard</a></li>
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
                    <form action="{{route('stock.update',$stock)}}" method="post">
                    @csrf
                    @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Stock Name</label>
                                <input type="text" name="stock_type" value="{{$stock->stock_type}}" class="form-control mre">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Location</label>
                                <input type="text" name="address" value="{{$stock->address}}" class="form-control mre">
                            </div>
                           
                       
                      
                        <input type="submit" value="Update" class="btn btn-primary">
                        <a href="{{route('stock.index')}}" class="btn btn-secondary ml-1" data-dismiss="modal">Close</a>
                    </form>
</div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
        
@endsection