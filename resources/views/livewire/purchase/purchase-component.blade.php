@php
$counter = 0;
@endphp
<div>
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
                        <button type="button" wire:click="delete({{$purchase->id}})" class="btn btn-danger px-1 py-0 ml-1">Delete</button>
                        <button type="button" wire:click="edit({{$purchase->id}})" class="btn btn-secondary px-1 py-0 ml-1" data-toggle="modal" data-target=".bd-example-modal-lg">Edit</button>

                    </div>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    @include('livewire.purchase.form')
</div>
@include('partials.toaster')