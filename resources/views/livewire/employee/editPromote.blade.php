
<div class="modal fade" id="editModal" wire:ignore.self>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Salary</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form wire:submit.prevent>
                            <input type="hidden" wire:model="emp_id">
                            <div>
                                <label>Salary</label>
                                <input type="number" wire:model="salary" class="form-control">
                                @error('salary') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label>Designation</label>
                                <input type="text" wire:model="designation" class="form-control ">
                                @error('designation') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" wire:click="updatePromote()" class="btn btn-secondary">save</button>
                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>