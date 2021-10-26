@php
$counter = 0;
@endphp

<div>
<div class="row page-titles m-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Purchase Product</button></li>
            </div>
</div>


<div class="col-12 ">
                <div class="card px-3">
                    <div class="card-header">
                        <h4 class="card-title">List of Products</h4>
                    </div>
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
                <th>Stock</th>
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
                <td>{{$purchase->stock_id==1?'Main stock':'Sub stock'}}</td>
                <td>

                    <div class="d-flex">
                        <button type="button" wire:click="delete({{$purchase->id}})" class="btn btn-outline-danger px-1 py-1 ml-1"><i class="fa fa-trash-o " aria-hidden="true"></i> Delete</button>
                        <button type="button" wire:click="edit({{$purchase->id}})" class="btn btn-outline-secondary px-1 py-1 ml-1" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</button>

                    </div>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    @include('livewire.purchase.form')
</div>
@include('partials.toaster')