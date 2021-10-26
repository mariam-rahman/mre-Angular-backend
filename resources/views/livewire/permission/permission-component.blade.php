
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
                            <td>{{++$counter}}</td>
                            <td>{{$perm->name}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-6 d-flex">
                                       
                                            <button wire:click="delete({{$perm->id}})" class="btn btn-outline-danger px-1 py-1 "> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                   
                                        <button wire:click="edit({{$perm->id}})" class="btn btn-outline-secondary px-1 py-1 ml-1" data-toggle="modal" data-target="#basicModal"> <i class="fa fa-pencil fa-fw"></i> Edit</button>

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