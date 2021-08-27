<div>

@php
$counter = 0;
@endphp
    <div class="table-responsive">
        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Phone</th>
                    <th>Customer</th>
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

                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  @include('livewire.customer.form')
</div>

@include('partials.toaster')