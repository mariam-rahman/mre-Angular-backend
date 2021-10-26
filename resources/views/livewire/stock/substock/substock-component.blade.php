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
                            <th>Category</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($substocks as $substock)
                        <tr>
                            <td>{{++$counter}}</td>
                            <td>{{$substock->product->name ?? ''}}</td>
                            <td>{{$substock->qty}}</td>
                            <td>{{$substock->remaining_qty}}</td>
                            <td>{{$substock->product->category->title ?? ''}}</td>

                            <td>
                                <button type="button" class="btn btn-outline-secondary  px-1 py-1" data-toggle="modal" data-target="#moveModal" wire:click="setId({{$substock->product_id}})"><i class="fa fa-arrow-right" aria-hidden="true"></i> Move to OnSale</button>
                                <button wire:click="details({{$substock->product_id}})" class="btn btn-outline-info px-1 py-1"> <i class="fa fa-snowflake-o" aria-hidden="true"></i> Details</button>
                                <a href="{{route('sale.index')}}" class="btn btn-outline-success px-1 py-1"> <i class="fa fa-check" aria-hidden="true"></i> Sale</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('livewire.stock.substock.moveForm');
            @else
            @include('livewire.stock.substock.item_details');
            @endif
        </div>
    </div>

</div>