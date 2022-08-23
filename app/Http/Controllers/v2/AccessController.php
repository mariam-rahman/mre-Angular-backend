<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AccessController extends Controller
{
   function permissionsList()
   {
        return Permission::all();;
   }

   function roleList()
   {
       return Role::all();
   }
   
   function createRole(Request $req)
   { 
       Log::info($req->all());

       $permissions = $req->permissions;
       $role = new Role();
       $role->name = $req->name;
       
       if($role->save())
       {
           $role->permissions()->sync($permissions);
        return response()->json(true); 
       }
      
       else 
       return response()->json(false);
   }

   function deleteRole($id){
    $role = Role::find($id);
    $role->permissions()->detach();
    $role->delete();
 return response()->json(true);
}

function roleEdit($id){
   return Role::find($id);
}
function getpermission($id){
    $per = Role::find($id);
    return $per->permissions()->get(); 
}

//Permission Operation
function addPermission(Request $request){
    $permission = new Permission();
    $permission->name = $request->name;
    $permission->save();
    return response()->json(true);
}

function editPermission($id){
    return Permission::find($id);
}

function deletePermission($id){
    $per = Permission::find($id);
    $per->Roles()->detach();
    $per->delete();
 return response()->json(true);
}



}