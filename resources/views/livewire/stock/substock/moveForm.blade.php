<div class="modal fade" id="moveModal" wire:ignore.self>
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
                            <div class="form-group">
                                <label>Quantity to move</label>
                                <input type="number" wire:model="move_qty" class="form-control">
                                @error('move_qty') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Discount %</label>
                                <input type="number" wire:model="discount" class="form-control">
                                @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Sell price per Item</label>
                                <input type="number" wire:model="sell_price" class="form-control">
                                @error('sell_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" wire:click="moveToSell()">Move</button>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>