<div class="modal fade" id="payModal" wire:ignore.self>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">monthly Salary</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form wire:submit.provent>

                            <div class="form-row">
                                <input type="hidden" wire:model="emp_id" value="{{$employee->id}}">
                                <div class="form-group col-md-12">
                                    <label>Payment</label>
                                    <input type="number" wire:model="payment" class="form-control" max="{{$employee->salaries[0]->salary}}">
                                    @error('payment') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Payment Date</label>
                                    <input type="date" wire:model="pdate" class="form-control">
                                    @error('pdate') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" wire:click="createPayment({{$employee->id}})">Pay</button>
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

