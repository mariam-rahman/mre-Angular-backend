<?php

class MREPolicy
{
    
    function check($user,$name){
        if(count($user->permissions->whereIn('name',$name))>0) 
        return true;
        else  
        return false;
    }
}
?>