<div class="modal fade" id="basicModal" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                @if($update)
                <h5 class="modal-title">Update Product</h5>
                @else
                <h5 class="modal-title">Purchase Product</h5>
                @endif
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card pb-0">
                        <div class="card-body pb-0">
                            <div class="basic-form">
                                <form wire:submit.prevent>
                                    <div class="form-row">
                                        
                                        <div class="form-group col-md-6">
                                            <label>Select Product</label>
                                            <select wire:model="product_id" id="inputState" class="form-control">
                                                <option>Select product</option>
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('product_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Quantity</label>
                                            <input type="number" wire:model="qty" class="form-control">
                                            @error('qty') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Price</label>
                                            <input type="number" wire:model="price" class="form-control">
                                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Stocks</label>
                                            <select wire:model="stock_id" id="inputState" class="form-control">
                                                <option>Choose stocks</option>
                                                <option value="1">Main stock</option>
                                                <option value="2">Substock</option>
                                             
                                            </select>
                                            @error('stock_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                            </div>
                            @if($update)
                            <button wire:click="update()" class="btn btn-secondary"><i class="fa fa-pencil-square-o"></i>  Update</button>
                            @else
                            
                            <button wire:click="save()" class="btn btn-secondary">Save</button>
                            @endif
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>