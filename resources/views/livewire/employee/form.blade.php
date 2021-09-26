<div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                
            @if($updateMode)
                <h5 class="modal-title">Update Employee</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="basic-form">
                            <form wire:submit.prevent>
                                <input type="hidden" wire:model="selected_id">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input type="text" wire:model="name" class="form-control">
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" wire:model="email" class="form-control">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Phone</label>
                                        <input type="text" wire:model="phone" class="form-control">
                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <input type="text" wire:model="address" class="form-control">
                                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        @if ($image)
                                        <img width="100" src="{{ $image->temporaryUrl() }}">
                                        @endif
                                        <label>Image</label>
                                        <input type="file" wire:model="image" class="form-control">
                                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>joining Date</label>
                                        <input type="date" wire:model="joining_date" class="form-control">
                                        @error('joining_date') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button wire:click='update()' class="btn btn-secondary" >Update</button>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal" wire:click="resetInputFields()">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            @else
            <h5 class="modal-title">Add a new Employee</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="basic-form">
                        <form wire:submit.prevent>
                        <input type="hidden" wire:model="selected_id">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" wire:model="name" class="form-control">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" wire:model="email" class="form-control">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input type="text" wire:model="phone" class="form-control">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Address</label>
                                    <input type="text" wire:model="address" class="form-control">
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Designation</label>
                                    <input type="text" wire:model="designation" class="form-control">
                                    @error('designation') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    @if ($image)
                                    <img width="100" src="{{ $image->temporaryUrl() }}">
                                    @endif
                                    <label>Image</label>
                                    <input type="file" wire:model="image" class="form-control">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Salary</label>
                                    <input type="number" wire:model="salary" class="form-control">
                                    @error('salary') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>joining Date</label>
                                    <input type="date" wire:model="joining_date" class="form-control">
                                    @error('joining_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button wire:click='save()' class="btn btn-secondary">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="resetInputFields()">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            @endif
    </div>
</div>
</div>

@include('partials.toaster')