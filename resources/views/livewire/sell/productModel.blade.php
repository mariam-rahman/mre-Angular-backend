<div class="modal fade" id="sellModal" wire:ignore.self>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add product</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form wire:submit.provent>
            
                            <div class="form-row">
                            <div class="form-group col-md-12">
                                    <label>Product</label>
                                    <select wire:model="product_id" id="inputState" class="form-control">
                                    <option value="">Select product</option>
                                        @foreach($sale->getProducts() as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Sell price</label>
                                    <input type="number" wire:model="sell_price" class="form-control">
                                    @error('sell_price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Qauntity</label>
                                    <input type="number" wire:model="qty" class="form-control">
                                    @error('qty') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                <button type="button" class="btn btn-primary" wire:click="sell({{$sale->id}},{{$sale->stock_id}})">Add</button>
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-times-circle"></i> Close</button>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
