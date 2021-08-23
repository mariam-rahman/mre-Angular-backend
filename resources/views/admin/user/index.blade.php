@extends('layouts.app')

@section('content')

@php
$counter = 0;
@endphp


<link rel="stylesheet" href="{{asset('css/mre.css')}}">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/validation.css">
<!--**********************************
            Content body start
        ***********************************-->
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0 mb-0">
            <div class="col-sm-6 p-md-0">
                <a href="{{route('user.create')}}" class="btn btn-primary">Add Users</a></li>
            
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List of Users</h4>
                    </div>
                    <div class="card-body">
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
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="basicModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Information</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="{{route('user.store')}}" method="post" id="form">
                            @CSRF
                            
                           
                                    <div >
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control " id="name" >
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                    <small>error massge</small>
                                    </div>
                               

                           
                                <div >
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control " id="email" >
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                    <small>error massge</small>
                                    </div>
                               
                               </div>
                           
                                <div >
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control " id="password" >
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                    <small>error massge</small>
                                </div>
                    
                                <div >
                                    <label>confirme password</label>
                                    <input type="text" name="password" class="form-control " id="conpass">
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                    <small>error massge</small>
                                 </div>
                                <ul>
                                    <label for="">Choose permissions:</label>
                                @foreach($permissions as $permission)
                                   <li><input type="checkbox" class=" m-2" name="permissions[]" value="{{$permission->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$permission->name}}</span></li> 
                                 @endforeach
                                </ul>
                           
                            
                                
                                
                                <div class="modal-footer">
                                    <input type="submit" value="Save" class="btn btn-secondary">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






    const form = document.getElementById('form');
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const compass = document.getElementById('conpass');

 

    //event
    form.addEventListener('submit',(event)=>{
        event.preventDefault();
        validate();

    })

 const sendData = (sRate,count) =>{

     if(sRate == count){
         alert('done');
     }

 }

    const finalmassge = ()=>{
        var conform = document.getElementsByClassName('fc');
       var sRate = 0;
        for(var i = 0; i < conform.length; i++){
            if(conform[i].className == 'fc success'){
                 sRate += 1;
            }
            else {
                return false;
            }
        }
        sendData(sRate,conform.length);
    }


//     var isEmail = (emailval)=>{
//       var atSymbol = emailval.indexOf("@");
//       if(atSymbol < 1) return false;
//       var dot = emailval.lastindexOf(".");
//       if(dot < atSymbol + 2) return false;
//       if(dot === emailval.lenght - 1) return false;
//       return true;
//   }

    //validate function

    const validate =() =>{

    const nameval = document.getElementById('name').value.trim();
    const emailval = document.getElementById('email').value.trim();
    const passwordval = document.getElementById('password').value.trim();
    const compassval = document.getElementById('conpass').value.trim();



    if(nameval === ""){
        setErrorMsg(name,'name cannot be null');
    }

    // if(nameval.lenght <= 2){
    //     setErrorMsg(name, 'name cannot have lenght of two charachters');
    // }
    else{
        setSuccessMsg(name);
    }
    



//email validation
    if(emailval === ""){
        setErrorMsg(email,'Email cannot be null');
    }
    // else if(!isEmail(emailval)){
    //     setErrorMsg(email, 'invalid email');
    // }
    else{
        setSuccessMsg(email);
    }


    //password
    if(passwordval === ""){
        setErrorMsg(password,'password cannot be null');
    }
    // else if(passwordval.lenght < 8){
    //     setErrorMsg(password, 'name cannot have lenght of two charachters');
    // }
    else{
        setSuccessMsg(password);
    }

    //confirm password

    if(compassval === ""){
        setErrorMsg(compass,'this field cannot be null');
    }
    else if(compassval != passwordval){
        setErrorMsg(compass, 'password did not matched');
    }
    else{
        setSuccessMsg(compass);
    }

      finalmassge();
    
}
    
    // SetmassageError

    function setErrorMsg(input, errormsgs){
       const ffc = input.parentElement;
       const small = ffc.querySelector('small');
       ffc.className = "fc error";
       small.innerText = errormsgs;
    }

     // SetmassageSuccess

     function setSuccessMsg(input, errormsgs){
       const ffc = input.parentElement;
       ffc.className = "fc success";
       
    }
 
@endsection