<div>

    @php
    $counter = 0;
    @endphp
    @if($isVisible == 0)
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Add Customer</button></li>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card px-5 pb-5 pt-2">
                <div class="card-header">
                    <h4 class="card-title">Customer Information</h4>
                </div>

                <div class="table-responsive">
                    <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{++$counter}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->address}}</td>
                                <td>
                                 


                                            <button type="button" class="btn btn-outline-danger px-1  " wire:click="delete({{$customer->id}})"><i class="fa fa-trash-o "></i> Delete</button>
                                            <button type="button" class="btn btn-outline-secondary px-1 ml-1" data-toggle="modal" data-target="#editModal" wire:click="edit({{$customer->id}})"><i class="fa fa-pencil fa-fw"></i> Edit</button>
                                            <button type="button" class="btn btn-outline-info px-1 ml-1" wire:click="details({{$customer->id}})"><i class="fa fa-asterisk"></i> Details</button>
                                            <button type="button" class="btn btn-outline-warning px-1 ml-1" wire:click="debt({{$customer->id}})"><i class="fa fa-asterisk"></i> debts</button>

                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @include('livewire.customer.form')
                @elseif($isVisible == 1)
                @include('livewire.customer.customeretails')
                @elseif($isVisible == 2)
                @include('livewire.customer.debt')
                @elseif($isVisible == 3)
                @include('livewire.customer.debtPayModel')
                @else
                @include('livewire.customer.debtDetails')
                @endif
            </div>
        </div>
    </div>
</div>