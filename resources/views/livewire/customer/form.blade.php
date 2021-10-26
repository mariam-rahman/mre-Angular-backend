<div class="modal fade" id="editModal" wire:ignore.self>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">

                @if($updateMode)
                <h5 class="modal-title">Update Customer Information</h5>
                @else
                <h5 class="modal-title">Customer Registeration </h5>
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
                                    <label>Customer Name</label>
                                    <input type="text" wire:model="name" class="form-control">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>E-mail</label>
                                    <input type="text" wire:model="email" class="form-control">
                                    @error('email') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Phone</label>
                                    <input type="text" wire:model="phone" class="form-control">
                                    @error('phone') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Address</label>
                                    <input type="text" wire:model="address" class="form-control">
                                    @error('address') <span class="text-danger">{{$message}}</span>@enderror
                                </div>

                            </div>

                            <div class="modal-footer">
                                @if($updateMode)
                                <input type="submit" value="update" wire:click="update()" class="btn btn-secondary">
                                @else
                                <input type="submit" value="Save" wire:click="save()" class="btn btn-secondary">
                                @endif
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-times-circle"></i> Close</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.toaster')