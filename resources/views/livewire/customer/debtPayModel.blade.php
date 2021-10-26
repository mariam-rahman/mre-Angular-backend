



        <div class="card pb-5 p-2">
            <div class="card-header">
                <div class="card-title">PAYMENT FORM</div>
                <button class="btn btn-outline-secondary" wire:click="gobackdebt()">Back</button>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="d-flex mt-3">
                        <h3 class="text-muthed">Total payment:</h3>
                        <div class="ml-3 font-weight-bold"></div>
                    </div>
                    <hr>
                    <div class="basic-form custom_file_input">
                        <form wire:submit.provent>
                            <div class="form-group">
                                <label> <strong> Total paid:</strong> </label>
                                <input type="number" wire:model="amount" class="form-control">
                            </div>
                            <button type="button" class="btn btn-primary" wire:click="saveDept()">Save</button>
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        </form>
                    </div>



                </div>
            </div>

        </div>
  