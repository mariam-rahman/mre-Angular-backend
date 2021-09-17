@php
$counter = 0;
@endphp
<div>
    @if($visible == 0)
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">list of Sold product</h4>
            <button wire:click="sellOption()" class="btn btn-primary"> Sell product</button>
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
                                        <form action="" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger px-1 py-0">
                                        </form>

                                        <a href="{{route('sale.sell_detail',$sale->id)}}" class="btn btn-warning px-1 py-0 ml-1" style="color:white">Details</a>

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
    @else
    @include('livewire.sell.sellForm')
    @endif
</div>