<div class="modal fade" id="moveModal"  wire:ignore.self>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Move to substock</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form wire:submit.prevent>
                            <div>
                                <label>Quantity to move</label>
                                <input type="number" wire:model="move_qty" class="form-control">
                                @error('move_qty') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                          
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" wire:click="moveTo()">Move</button>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
