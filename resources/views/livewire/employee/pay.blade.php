@php
$counter = 0;
@endphp
<div class="row d-flex justify-content-center">
    <div class="col-md-10">
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
                        <h3>Employees payment Details</h3>
                        <button class="btn btn-outline-secondary" wire:click="goBack()">Back</button>
                    </div>
                    <div class="ml-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payModal">Pay</button>
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