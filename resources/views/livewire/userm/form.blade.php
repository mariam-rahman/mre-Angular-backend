<div class="modal fade" id="userModal" wire:ignore.self>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create user</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-form">
                    <div class="basic-form custom_file_input">
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
                        @foreach($permissions as $permission)
                        <li><input type="checkbox" class=" m-2" wire:model="permissions[]" value="{{$permission->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$permission->name}}</span></li>
                        @endforeach

                    </ul>
                    <div class="modal-footer">
                        <input type="button" wire:click="save()" value="Save" class="btn btn-secondary">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>