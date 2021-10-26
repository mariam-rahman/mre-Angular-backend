@php
$counter = 0;
@endphp
<div>
    @if($visible == 0)
 <div class="mb-4">
    <button wire:click="sellOption()" class="btn btn-primary"> Sell product</button>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">list of Sold product</h4>
           
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Stock</th>
                            <th>Date</th>
                            <th>Total amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                        <tr>
                            <td>{{++$counter}}</td>
                            <td>{{$sale->customer_id == 0 ? 'Counter':$sale->customer->name}}</td>
                            <td>{{$sale->getStock()}}</td>
                            <td>{{$sale->sell_date}}</td>
                            <td>{{$sale->getTotal()}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-12 d-flex">
                                    <button wire:click="delete({{$sale->id}})" class="btn btn-outline-danger px-1 py-1 " wire:click=""> <i class="fa fa-trash-o " aria-hidden="true"></i> Delete</button>
                                        <button wire:click="sell_details({{$sale->id}})" class="btn btn-outline-info px-1 py-1 ml-1" > <i class="fa fa-snowflake-o"></i> Details</button>
                                    </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @elseif($visible == 1)
    @include('livewire.sell.sellOption')
    @elseif($visible == 2)
    @include('livewire.sell.saleDetails')
    
    @elseif($visible == 4)
    @include('livewire.sell.paymentModel')
    @else
    @include('livewire.sell.sellForm')
    @include('livewire.sell.productModel')
    
    @endif
    @include('partials.toaster')
</div>

