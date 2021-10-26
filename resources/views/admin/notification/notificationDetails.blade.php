@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container">


        <div class="row">
            <div class="col-12">
                <div class="card pr-4">

                    <div class="row d-flex mt-4 pl-4">
                        <div class="col-6">
                            <ul>
                                <li class=" d-flex mb-2">
                                    <h4 class="text-primary">Name:</h4>
                                    <div class="card-title ml-2"></div>
                                </li>
                            </ul>
                            <ul>
                        </div>
                        <div class="col-6 d-flex">
                            <li class="d-flex">
                                <h4 class="text-primary">Date:</h4>
                                <div class=" card-title ml-2"></div>
                            </li>
                            </ul>

                        </div>

                        <div class="card-header">
                            
                        <div><h4>Details of Sold Products</h4> 
                            <a href="" class="btn btn-outline-secondary">Back</a>
                            </div>
                            </div>
                    

                        <div class="table-responsive p-2">
                            <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Sale Price</th>
                                        <th>paid</th>
                                        <th>Debt</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection