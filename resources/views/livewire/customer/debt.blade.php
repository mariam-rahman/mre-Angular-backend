<div class="card p-4">
    <div class="card-header">
        <h2>{{$name->name}} : Debt</h2>
        <button class="btn btn-outline-secondary" wire:click="goBack()">Back</button>
    </div>
    <div class="row d-flex mt-4">
        <div class="col-6">
            <li class=" d-flex">
                <h4 class="text-primary">Total Paid:</h4>
                <div class="card-title ml-2">{{$customer_data->paid}}</div>
            </li>
            <li class="d-flex mb-2">
                    <h4 class="text-primary">Total Debt:</h4>
                    <div class="card-title ml-2">{{$customer_data->debt}}</div>
                </li>
            </ul>

        </div>
        <div class="col-6 d-flex" style="justify-content: right">
            <ul>
            <button wire:click="deptPay({{$customer_id}})" class="btn btn-outline-success px-5 pt-2 pb-1"><div class="font-weight-bold" ><h3 class="text-center">Pay</h3></div></button> 
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
                    <th>Payment</th>
                    <th>debt</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
          @foreach($debts as $debt)
                <tr>
                    <td>1</td>
                    <td>{{$debt->paid}}</td>
                    <td>{{$debt->debt}}</td>
                    <td>{{$debt->created_at}}</td>
                    <td>
                    <button type="button" class="btn btn-outline-info px-1 ml-1" wire:click="debtDetails({{$debt->sale_id}})"><i class="fa fa-asterisk"></i>  Details</button>
                    </td>
                 
                </tr>
                @endforeach
           
            </tbody>
        </table>
    </div>
    </div>
</div>