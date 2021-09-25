@php
$counter = 0;
@endphp
<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Role</h4>
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
                       
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-6 d-flex">
                                      
                                          
                                            <button class="btn btn-danger px-1 py-0 ">Delete</button>
                            
                                        <button class="btn btn-secondary px-1 py-0 ml-1" data-toggle="modal" data-target="#basicModal">Edit</button>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    

                    </tbody>
                </table>
            </div>
            @include('livewire.role.form')
        </div>
        @include('partials.toaster')