<div class="modal fade" id="basicModal" wire:ignore.self>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">

                @if($updateMode)
                <h5 class="modal-title">Update Category</h5>
                @else
                <h5 class="modal-title">Add a new Category</h5>
                @endif

                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent>
                    <div class="form-row">
                        <div class="form-group col-md-12">
      <!--this code is to display message-->
                            <div>
                                @if(session()->has('message'))
                                <script>
                                    toastr.success("{{session()->get('message')}}");
                                </script>
                                @endif
                            </div>     
                            <div>
                                @if(session()->has('update'))

                                <script>
                                    toastr.info("{{session()->get('update')}}");
                                </script>
                                @endif
                            </div>
    <!--end code for message-->
    
                            <label>Product Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <textarea wire:model="desc" id="" cols="30" class="form-control"></textarea>
                            @error('desc') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-12">
                            @if ($image)
                            <img width="100" src="{{ $image->temporaryUrl() }}">
                            @endif
                            <input type="file" wire:model="image" id="" class="form-control">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Category</label>
                            <select wire:model="category_id" id="inputState" class="form-control">
                                <option selected>Choose category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach

                            </select>
                            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-footer">
                            @if($updateMode)
                            <button wire:click='update()' class="btn btn-secondary">Update</button>
                            @else
                            <button wire:click='save()' class="btn btn-secondary">Save</button>
                            @endif
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                        </div>
                </form>

            </div>
        </div>

    </div>
</div>
</div>
</div>
