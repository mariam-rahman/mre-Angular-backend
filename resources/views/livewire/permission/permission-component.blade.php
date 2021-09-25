
@php
$counter = 0;
@endphp
<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Permission</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($permissions as $perm)
                        <tr>
                            <td>1</td>
                            <td>{{$perm->name}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-6 d-flex">
                                       
                                            <button wire:click="" class="btn btn-danger px-1 py-0 ">Delete</button>
                                   
                                        <button wire:click="" class="btn btn-secondary px-1 py-0 ml-1" data-toggle="modal" data-target="#basicModal">Edit</button>

                                    </div>
                                </div>
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            @include('livewire.permission.form')
        </div>
        @include('partials.toaster')