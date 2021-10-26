<?php
namespace App\Classes;

class MREPolicy{

    
   public function check($user,$name){
        if(count($user->permissions->whereIn('name',$name))>0 || $user->isAdmin) 
        return true;
        else  
        return false;
    }
}