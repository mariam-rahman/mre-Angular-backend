@php
$counter = 0;
@endphp

<div class="content-body">
    <div class="container">
        <div class="row ">
            <div class="col-md-4">
                <span class="text-primary mr-3">Name:</span>{{$employee->name}}
                <hr>
            </div>
            <div class="col-md-4">
                <span class="text-primary mr-3">ID:</span>{{$employee->id}}
                <hr>
            </div>
            <div class="col-md-4">
                <span class="text-primary mr-3">Salary:</span>{{$employee->salaries[0]->salary}}
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Pay</button>

                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example" class=" table table-striped table-bordered" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>payment</th>
                                        <th>payment date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employee->slips as $slip)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$slip->payment}}</td>
                                        <td>{{$slip->payment_date}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--model-->

<div class="modal fade" id="basicModal" wire:ignore.self>
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
</div>


@include('partials.toaster')