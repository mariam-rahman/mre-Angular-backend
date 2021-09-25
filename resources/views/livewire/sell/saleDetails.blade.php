<div class="card">
    <div class="card-header">
    <h2>Sales Details</h2>
        
        <button class="btn btn-outline-secondary" wire:click="goBack()">Back</button>
    </div>
    
     <div class="row d-flex mt-4 pl-4">
        <div class="col-4">
            <ul>
                <li class=" d-flex mb-2">
                <h4 class="text-primary">Customer:</h4>
                <div class="card-title ml-2">{{$sale->customer_id == 0 ? 'Counter':$sale->customer->name}}</div>
                </li>
            </ul>
            <ul>
        </div>
        <div class="col-4 d-flex">
            <li class="d-flex">
                <h4 class="text-primary">Source:</h4>
            <div class=" card-title ml-2">{{$sale->getStock()}}</div>
            </li>
            </ul>
          
        </div>
        <div class="col-4 d-flex">
        <ul>
            <li class="d-flex">
            <h4 class="text-primary">Date:</h4>
            <div class=" card-title ml-2">{{$sale->sell_date}}</div>
            </li>
            </ul>
        </div>
</div>
<div class="row d-flex pl-4 mt-1">
        <div class="col-4 d-flex">
        <ul>
            <li class="d-flex">
            <h4 class="text-primary">Paid:</h4>
            <div class=" card-title ml-2">{{$payment_record->paid }}</div>
            </li>
            </ul>
        </div>
        <div class="col-4 d-flex">
        <ul>
            <li class="d-flex">
            <h4 class="text-primary">Debt:</h4>
            <div class=" card-title ml-2">{{$payment_record->debt }}</div>
            </li>
            </ul>
        </div>
        </div>  
    




    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Total payment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sale->sell_details as $sell)
                    <tr>
                        <td>{{++$counter}}</td>

                        <td>{{$sell->product->name}}</td>
                        <td>{{$sell->qty}}</td>
                        <td>{{$sell->sell_price}}</td>
                        <td>
                            <div class="d-flex">
                                
                                  
                                    
                                
                                <button  wire:click="deleteProduct({{$sell->product_id}},{{$sell->id}},{{$sell->qty}},{{$sale->stock_id}})" class="btn btn-danger px-1 py-0 ml-1" >Delete</button>

                            </div>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@include('partials.toaster')