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
                <div class="card pl-5 pr-5 pb-5 pt-2">
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
                        <div class="row">
                            <div class="col-sm-6 d-flex">
                               
                            
                            <button class="btn btn-danger px-1 py-0 " wire:click="delete({{$customer->id}})">Delete</button>
                            <button type="button" class="btn btn-secondary px-1 py-0 ml-1" data-toggle="modal" data-target="#editModal" wire:click="edit({{$customer->id}})">Edit</button>
                            <button type="button" class="btn btn-info px-1 py-0 ml-1" wire:click="details({{$customer->id}})">Details</button>

                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  @include('livewire.customer.form')
  @else
  @include('livewire.customer.customeretails')
  @endif
</div>
</div>
</div>
</div>

