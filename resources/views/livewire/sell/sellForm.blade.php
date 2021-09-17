<div class="card">
                    <div class="card-header">
                        <div class="col-3 card-title">Customer:{{$sale->customer_id == 0 ? 'Counter':$sale->customer->name}}</div>
                        <div class="col-3 card-title">Source:{{$sale->getStock()}}</div>
                        <div class="col-3 card-title">Date:{{$sale->sell_date}}</div>
                        <div class="col-3" style="text-align:right; "><a href="{{route('sale.invoice',$sale->id)}}" class="btn btn-warning text-white">Print invoice</a></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sale->sell_details as $sell)
                                    <tr>
                                        <td>{{++$counter}}</td>

                                        <td>{{$sell->product->name}}</td>
                                        <td>{{$sell->qty}}</td>
                                        <td>{{$sell->sell_price}}</td>
                                        <td>

                                            <div class="d-flex">
                                                <form action="" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="btn btn-danger px-1 py-0">
                                                </form>
                                                <a href="" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>

                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>