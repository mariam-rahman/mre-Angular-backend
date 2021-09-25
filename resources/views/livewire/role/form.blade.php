<div class="modal fade" id="basicModal" wire:ignore.self>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Roles</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form  wire:submit.prevent >
                         
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Role</label>
                                    <input type="text" wire:model="name" class="form-control" >
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Permissions</label>
                                 <select wire:model="permissions[]" class="form-control " id="" multiple>
                                
                                 <option  value=""></option>
                                  
                                 </select>
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button wire:click="" class="btn btn-secondary">Save</button>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>