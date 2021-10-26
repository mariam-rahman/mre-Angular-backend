<div class="modal fade" id="userModal" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                @php
                $counter = 0;
                @endphp
                @if($updateMode)
                <h5 class="modal-title">Update user</h5>

                @else
                <h5 class="modal-title">Create user</h5>
                @endif
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card pb-0">
                        <div class="card-body pb-0">
                            <div class="basic-form">




                                @if($updateMode)


                                <form wire:submit.prevent>
                                    <div>
                                        <label>Name</label>
                                        <input type="text" wire:model="name" class="form-control">
                                        @error('name') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>

                                    <div>
                                        <label>E-mail</label>
                                        <input type="email" wire:model="email" class="form-control ">
                                        @error('email') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>

                                    <div>
                                        <label>Password</label>
                                        <input type="text" wire:model="password" class="form-control ">
                                        @error('password') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div>
                                        <label>confirm password</label>
                                        <input type="password" wire:model="password_confirmation" class="form-control ">
                                        @error('password_confirmation') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    
                                    @error('permissions') <span class="text-danger">{{$message}}</span>@enderror<br>
                                    <label>Choose permissions:</label>
                                    <div class="row">
                                        @if($permissions != null)
                                        @foreach($permissions as $permission)

                                        <div class="col-md-4">
                                            <li><input type="checkbox"  wire:model.defer="perms" value="{{$permission->id}}" @if($perms->contains($permission->id)) checked @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$permission->name}}</span></li>
                                        </div>

                                        @endforeach
                                        @endif
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" wire:click="update()" class="btn btn-secondary"> <i class="fa fa-pencil fa-fw"></i> Update</button>
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-times-circle fa-fw"></i> Close</button>
                                    </div>
                                </form>

                                @else

                                <form wire:submit.prevent>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Name</label>
                                            <input type="text" wire:model="name" class="form-control">
                                            @error('name') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>E-mail</label>
                                            <input type="email" wire:model="email" class="form-control ">
                                            @error('email') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Password</label>
                                            <input type="password" wire:model="password" class="form-control ">
                                            @error('password') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>confirm password</label>
                                            <input type="password" wire:model="password_confirmation" class="form-control ">
                                            @error('password_confirmation') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>


                                    @error('permissions') <span class="text-danger">{{$message}}</span>@enderror<br>
                                    <label>Choose permissions:</label>
                                    <div class="row">
                                        @if($permissions != null)
                                        @foreach($permissions as $permission)

                                        <div class="col-md-4">
                                            <li><input type="checkbox" class=" m-2" wire:model="perms.{{$permission->id}}" value="{{$permission->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$permission->name}}</span></li>
                                        </div>

                                        @endforeach
                                        @endif

                                    </div>

                                    <div class="modal-footer">
                                        <button wire:click="save()" class="btn btn-secondary">save</button>
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-times-circle fa-fw"></i> Close</button>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.toaster')