<div class="row">
                       <div class="col-6">
                         <ul>
                             <li class="mb-2">Name:
                                 <span class="text-primary"><b>{{$substock->product->name}}</b></span>
                                </li>
                             <li>Category:
                                 <span class="text-primary"><b>{{$substock->product->category->title}}</b></span>
                                </li>
                         </ul>
                       </div>

                       <div class="col-6 " style="text-align:right">
                       <ul>
                             <li class="mb-2">Total products: 
                            <span class="text-primary"><b>{{$substock->qty}}</b></span> 
                            </li>
                             <li>Remaining products: 
                             <span class="text-primary"><b>{{$substock->remaining_qty}}</b></span>
                            </li>                             
                         </ul>
                       </div>
                       </div>
                       <hr>
                       <br><br>
                        <div class="table-responsive">
                        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Remaining quantity</th>
                                        <th>Transform date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->remaining_qty}}</td>
                                        <td>{{$item->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>