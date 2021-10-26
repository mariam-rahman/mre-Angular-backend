<div>
@if($canCreate)
<div class="row page-titles m-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add Product</button></li>
            </div>
</div>
@endif

<div class="col-12 ">
                <div class="card px-3">
                    <div class="card-header">
                        <h4 class="card-title">List of Products</h4>
                    </div>
    <div class="table-responsive">
        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>1</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->desc}}</td>
                    <td><img src="{{asset('storage/'.$product->image)}}" width="50" alt=""></td>
                    <td> {{$product->category->title??''}}</td>
                    <td>
                        <div class="row">
                            <div class=" d-flex">
                            <button class="btn btn-outline-danger px-1 py-1 " wire:click="delete({{$product->id}})" {{$canDelete==true?'':'disabled'}}> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                             <button class="btn btn-outline-secondary px-1 py-1 ml-1" data-toggle="modal" data-target="#basicModal" wire:click="edit({{$product->id}})" {{$canEdit==true?'':'disabled'}}> <i class="fa fa-pencil fa-fw"></i> Edit</button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('livewire.product.form')

</div>

@include('partials.toaster')