<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

//  public function __construct()
//  {
//      $this->middleware('auth');
//  }

    public function index(){
        $users = User::all();
        $permissions = Permission::all();
        return view('admin/user/index',compact('users','permissions'));
    }

    public function create(){
        $permissions = Permission::all();
        return view('admin/user/create',compact('permissions'));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect(route('user.index'));
    }

    public function edit(User $user){
        return view('admin/user/edit',compact('user'));
    }



    public function update(Request $request ,$user){

        $users = User::find($user); 

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->update();

        return redirect(route('user.index'));

    }

 /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
     function store(Request $request)
    {

    $this->validator($request->all());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->syncPermissions($request->permissions);
        return redirect(route('user.index'));
    }

    public function permission(){
        $permissions = Permission::latest()->get();
        return view('admin/permission/index',compact('permissions'));
    }


    public function permissionStore(Request $request){
        Permission::create($request->all());
        return redirect(route('permission.index'));
    }




}
