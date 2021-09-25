<div>

<!--this code is to display message-->

<!--end code for message-->
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
                            <div class="col-sm-6 d-flex">
                            <button class="btn btn-danger px-1 py-0 " wire:click="delete({{$product->id}})">Delete</button>
                             <button type="button" class="btn btn-secondary px-1 py-0 ml-1" data-toggle="modal" data-target="#basicModal" wire:click="edit({{$product->id}})">Edit</button>
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