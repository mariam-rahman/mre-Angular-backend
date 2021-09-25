@php
$counter = 0;
@endphp
<div>
    @if($isVisible)
    <div class="card">
    <div class="card-header d-flex justify-content-center">       
            <h2 class="text-secondary">MRES Shop</h2>
        </div>
        <div class="card-header">       
            <h4 class="card-title">Products On Sale</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>remaining_qty</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($onsales as $onsale)
                        <tr>
                            <td>{{++$counter}}</td>
                            <td>{{$onsale->product->name}}</td>
                            <td>{{$onsale->qty}}</td>
                            <td>{{$onsale->remaining_qty}}</td>

                            <td>{{$onsale->stock_id==2?'Sub stock':'Main stock'}}</td>
                            <td>
                                <button wire:click="details({{$onsale->product_id}})" class="btn btn-info btn-sm px-1 py-1 ml-1">Details</button>
                                <a href="{{route('sale.index')}}" class="btn btn-success px-1 py-1 ">Sale</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    @include('livewire.onsale.onsale_details')
    @endif
</div>