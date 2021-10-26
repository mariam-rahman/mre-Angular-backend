<div class="card p-4">
    <div class="card-header">
        <h2>Customer Purchases</h2>
        <button class="btn btn-outline-secondary" wire:click="goBack()">Back</button>
    </div>
    <div class="row d-flex mt-4">

        <div class="col-4 d-flex">
            <li class=" d-flex mb-2">
                <h4 class="text-primary">Total Paid:</h4>
                <div class="card-title ml-2">{{$customer_data->paid}}</div>
            </li>
            </ul>

        </div>
        <div class="col-4 d-flex">
            <ul>
                <li class=" d-flex mb-2">
                    <h4 class="text-primary">Total Debt:</h4>
                    <div class="card-title ml-2">{{$customer_data->debt}}</div>
                </li>
            </ul>
        </div>
    </div>
    <hr>
    <br><br>
    <div class="table-responsive">
        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Stock</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sell_details as $sell)
                <tr>
                    <td>1</td>
                    <td>{{$sell->name}}</td>
                    <td>{{$sell->qty}}</td>
                    <td>{{$sell->price}}</td>
                    <td>stock</td>
                    <td>{{$sell->date}}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>