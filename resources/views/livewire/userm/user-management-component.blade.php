<div>
    @php
    $counter = 0;
    @endphp
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
                                <form action="{{route('user.destroy',$user)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger px-1 py-0 ">
                                </form>
                                <a href="{{route('user.edit',$user)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
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
