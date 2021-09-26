<div>
    @php
    $counter = 0;
    @endphp
    <div class="table-responsive p-2">
        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{++$counter}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->desc}}</td>
                    <td><img src="{{asset('storage/'.$category->image)}}" alt="" width="60"></td>
                    <td>
                        <div class="row">
                            <div class="col-sm-6 d-flex">

                                <button class="btn btn-danger px-1 py-0 " wire:click="delete({{$category->id}})"> <i class="fa fa-trash-o "></i> Delete</a></button>
                                <button type="button" class="btn btn-secondary px-1 py-0 ml-1" data-toggle="modal" data-target="#editModal" wire:click="edit({{$category->id}})"><i class="fa fa-pen "></i></button>

                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

    @include('livewire.category.form')

</div>

@include('partials.toaster')