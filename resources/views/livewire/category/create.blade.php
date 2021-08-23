<<<<<<< HEAD:resources/views/livewire/category-component.blade.php
=======
<div class="modal fade" id="basicModal"  >
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
      
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @else
            <h5 class="modal-title">Add a new Category</h5>
            @endif
         
                
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <div class="basic-form">
        <div class="basic-form custom_file_input" >
            <form wire:submit.prevent >

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Title</label>
                        <input type="text" wire:model="title" class="form-control" placeholder="Enter Title">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
>>>>>>> 5bd29036f6211ff67bde4d141f84bcd146401553:resources/views/livewire/category/create.blade.php

@livewireStyles
    <form wire:submit.prevent="submit">
        
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Title</label>
                <input type="text" wire:model="title" class="form-control" placeholder="Enter Title">
                @error('title') <span class="text-danger"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-12">
                <label>Descriptiion</label>
                <textarea wire:model="desc" id="" cols="30" rows="3" class="form-control"></textarea>
                @error('desc') <span class="text-danger"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12">
                @if ($image)
                <img width="100" src="{{ $image->temporaryUrl() }}">
                @endif

                <div class="custom-file">
                    <input type="file" wire:model="image" class="custom-file-input" id="">
                    <label class="custom-file-label">Choose file</label>
                </div>
                <p> @error('image') <span class="text-danger"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
                </p>
            </div>
        </div>

        </div>
        <!--row closing-->

<<<<<<< HEAD:resources/views/livewire/category-component.blade.php
        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
=======
                    <div class="modal-footer">
                  
                        <button wire:click='save()' class="btn btn-secondary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
>>>>>>> 5bd29036f6211ff67bde4d141f84bcd146401553:resources/views/livewire/category/create.blade.php

        </div>
<<<<<<< HEAD:resources/views/livewire/category-component.blade.php
    </form>
    @livewireScripts
=======
    </div>

    </div>
        </div>
    </div>
</div>
>>>>>>> 5bd29036f6211ff67bde4d141f84bcd146401553:resources/views/livewire/category/create.blade.php
