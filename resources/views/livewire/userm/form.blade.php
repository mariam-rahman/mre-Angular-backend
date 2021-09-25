<div class="modal fade" id="userModal" wire:ignore.self>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
              
                @if($updateMode)
                <h5 class="modal-title">Create user</h5>
                @else
                <h5 class="modal-title">Update user</h5>
                @endif
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-form">
                    <div class="basic-form custom_file_input">
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
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" wire:model="password" class="form-control ">
                        @error('password') <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div>
                        <label>confirm password</label>
                        <input type="password" wire:model="password_confirmation" class="form-control ">
                        @error('password_confirmation') <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <ul>
                        @error('permissions') <span class="text-danger">{{$message}}</span>@enderror<br>
                        <label for="">Choose permissions:</label>
                        @if($permissions != null)
                        @foreach($permissions as $permission)
                        <li><input type="checkbox" class=" m-2" wire:model="perms.{{$permission->id}}" value="{{$permission->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$permission->name}}</span></li>
                        @endforeach
                        @endif

                    </ul>
                    <div class="modal-footer">
                        <button wire:click="save()" class="btn btn-secondary">save</button>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                    @else

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
                <ul>
                    @error('permissions') <span class="text-danger">{{$message}}</span>@enderror<br>
                    <label for="">Choose permissions:</label>
                    @if($permissions != null)
                    @foreach($permissions as $permission)
                     @if(in_array($permission->id,$userPerms))
                     <li><input type="checkbox"  wire:model="perms.{{$permission->id}}" value="{{$permission->id}}" checked = true>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$permission->name}}</span></li>
                     @else
                     <li><input type="checkbox"  wire:model="perms.{{$permission->id}}" value="{{$permission->id}}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$permission->name}}</span></li>
                     @endif
                    @endforeach
                    @endif
                </ul>
                <div class="modal-footer">
                    <button type="button" wire:click="update()" class="btn btn-secondary">Update</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
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