@php
$counter = 0;
@endphp
<div>
    @if($isVisible)

    <div class="row page-titles  mx-0">
        <div class="col-sm-6 p-md-0">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Employee</button>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if($isVisible)
                    <h4 class="card-title">List of Employees</h4>
                    @endif

                </div>
                <div class="table-responsive p-2">
                    <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{++$counter}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>
                                    <button class="btn btn-danger px-1 py-0 " wire:click="delete({{$employee->id}})">Delete</button>
                                    <button class="btn btn-secondary px-1 py-0 ml-1" data-toggle="modal" data-target=".bd-example-modal-lg" wire:click="edit({{$employee->id}})">Edit</button>
                                    <a href="{{route('employee.show',$employee->id)}}" class="btn btn-success px-1 py-0 ml-1">Show</a>
                                    <button wire:click="payslip({{$employee->id}})" class="btn btn-info px-1 py-0 ml-1">PaySlip</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('livewire.employee.form')

                @else
                @include('livewire.employee.pay')
                @include('livewire.employee.payModel')
                @endif
            </div>
        </div>

        @include('partials.toaster')