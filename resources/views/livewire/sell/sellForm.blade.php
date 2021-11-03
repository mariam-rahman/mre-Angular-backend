
<div class="mb-4">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sellModal">Add Product</button>
</div>
<div class="card">
    <div class="card-header">

    <div>
        <h3 class="text-secondary">Sale Form</h3>
    </div>
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
        <li class=" d-flex mb-2">
                <h4 class="text-primary">Source:</h4>
                <div class="card-title ml-2">{{$sale->getStock()}}</div>
                </li>
            </ul>
          
        </div>
        <div class="col-4 d-flex">
        <ul>
        <li class=" d-flex mb-2">
                <h4 class="text-primary">Date:</h4>
                <div class="card-title ml-2">{{$sale->sell_date}}</div>
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
                        <th>Price</th>
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
                                
                                  
                                    <button wire:click="" class="btn btn-outline-danger px-1 py-1"> <i class="fa trash-o" aria-hidden="true"></i> Delete</button>
                                
                                <button wire:click="" class="btn btn-outline-secondary px-1 pr-2 py-1 ml-1"> <i class="fa fa-pencil fa-fw"></i> Edit</button>

                            </div>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <button class="btn btn-outline-success px-5 pt-2 pb-1" data-toggle="modal" data-target="#paymentModal" wire:click="changeState()" ><div class="font-weight-bold" ><h3 class="text-center">Pay</h3></div></button>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">Add Product</button> -->
    </div>
</div>
