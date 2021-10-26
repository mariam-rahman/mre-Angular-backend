<div class="modal fade" id="promoteModal"  wire:ignore.self>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Information</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form wire:submit.prevent>
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
                                <button type="button" class="btn btn-secondary" wire:click="savePromote({{$employee->id}})">save</button>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-times-circle fa-fw"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
