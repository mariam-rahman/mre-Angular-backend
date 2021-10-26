<div class="card p-2">
            <div class="card-body">
                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form wire:submit.prevent>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label>Customer</label>
                                    <select wire:model="customer_id"  class="form-control"> 
                                    <option  selected>Select customer</option>    
                                    <option value="0">Counter</option>
                                        @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>Source</label>
                                    <select wire:model="stock_id"  class="form-control">
                                    <option selected>Select source</option>
                                        <option value="1">Main stock</option>
                                        <option value="2">Sub stock</option>
                                        <option value="3">On sale</option>
                                    </select>
                                    @error('stock_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-6">
                                <label>Date</label>
                                <input type="Date" wire:model="sell_date" class="form-control">
                                @error('sell_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                            </div>
                                <button wire:click="sellCreate()"  class="btn btn-primary">Continue </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>