<div>
    @php
    $counter = 0;
    @endphp
    <div class="mb-4">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal"  wire:click="create()">Add Users</button>
    </div>
    <div class="card px-3">
                    <div class="card-header">
                        <h4 class="card-title">List of Users</h4>
                    </div>
   
    <div class="table-responsive">
        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{++$counter}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-6 d-flex">
                               
                                    <button wire:click="delete({{$user->id}})" class="btn btn-outline-danger px-1 py-1 "> <i class="fa fa-trash-o"></i> Delete</button>
                                <button wire:click="edit({{$user->id}})" class="btn btn-outline-secondary px-1 py-1 ml-1" data-toggle="modal" data-target="#userModal"> <i class="fa fa-pencil fa-fw"></i> Edit</button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('livewire.userm.form')
</div>
</div>
@include('partials.toaster')