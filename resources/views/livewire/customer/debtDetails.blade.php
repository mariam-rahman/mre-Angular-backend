
<div class="card p-5">
    <div class="card-header">
        <h2>Purchased Product Details</h2>
        <button class="btn btn-outline-secondary" wire:click=" gobackdebt()">Back</button>
    </div>
    @php
$counter = 0;
@endphp
    <div class="table-responsive">
        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sell_details as $sell)
                <tr>
                    <td>{{++$counter}}</td>
                    <td>{{$sell->product->name}}</td>
                    <td>{{$sell->sell_price}}</td>
                    <td>{{$sell->qty}}</td>                                 
                    <td>{{$sell->created_at}}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>