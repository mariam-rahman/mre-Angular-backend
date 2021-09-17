@php
$counter = 0;
@endphp
<div>
<div class="card">
        <div class="card-header">
           @if($visible == 0)
            <h4 class="card-title">List of Products</h4>
            @else
            <h4 class="card-title"> Product details</h4>
            <button class="btn btn-outline-secondary" wire:click="goBack()">Back</button>
            @endif
        </div>
        <div class="card-body">
        @if($visible == 0)
        <div class="table-responsive">
            <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Total products</th>
                        <th>Remaining products</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                    <tr>
                        <td>{{++$counter}}</td>
                        <td>{{$purchase->product->name ?? 'nil'}}</td>
                        <td>{{$purchase->qty}}</td>
                        <td>{{$purchase->remaining_qty}}</td>
                        <td>{{$purchase->price}}</td>
                        <td>{{$purchase->product->category->title ?? 'nil'}}</td>
                        <td>
                            <button type="button" class="btn btn-secondary  px-1 py-1" data-toggle="modal" data-target="#moveModal" wire:click="setProductId({{$purchase->product_id}})">Move to Sub Stock</button>
                            <button wire:click="details({{$purchase->product_id}})" class="btn btn-success btn-sm px-1 py-1">Details</button>
                            <button wire:click="d" class="btn btn-info btn-sm px-1 py-1">Sale</button>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @include('livewire.stock.main.moveForm')
        @else
        @include('livewire.stock.main.item_details');
        @endif
        </div>
    </div>

</div>