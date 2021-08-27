<div>
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
                    <td> {{$product->category->title}}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-6 d-flex">
                                @can('Delete_product')
                                <form action="{{route('product.destroy',$product)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger px-1 py-0 ">Delete</button>
                                </form>
                                @endcan

                                @can('Edit_product')
                                <a href="{{route('product.edit',$product)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
                                @endcan
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
