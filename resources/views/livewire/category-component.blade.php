    <div class="basic-form">
        <div class="basic-form custom_file_input" >
            <form wire:submit.prevent="submit" >
                @CSRF
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
                            <input type="file" wire:model="image" class="form-control" id="">
                        <p>
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                        </p>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>
            </form>
        </div>
    </div>