<div class="modal fade" id="editModal" wire:ignore.self>
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
                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form wire:submit.prevent>
                            <input type="hidden" wire:model="selected_id">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Title</label>
                                    <input type="text" wire:model="title" class="form-control" placeholder="Enter Title">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Descriptiion</label>
                                    <textarea wire:model="desc" id="" cols="30" rows="3" class="form-control"></textarea>
                                    @error('desc') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    @if ($image)
                                    <img width="100" src="{{ $image->temporaryUrl() }}">
                                    @endif

                                    <div class="input-group mb-3">

                                        <input type="file" wire:model="image" class="form-control">
                                        <p>
                                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                                        </p>

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    @if($updateMode)
                                    <button wire:click='update()' class="btn btn-secondary">Update</button>
                                    @else
                                    <button wire:click='save()' class="btn btn-secondary">Save</button>
                                    @endif
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="resetInputFields()">Close</button>

                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>