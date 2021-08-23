@extends('layouts.app')

@section('content')

<!--**********************************
        Content body start
    ***********************************-->
<div class="row justify-content-center mt-5">
<div class="col-sm-8 justify-content-sm-start">


</div>
</div>

<div class="row justify-content-center">

     <div class="col-sm-8 d-flex " style="justify-content: space-between;">
         <ol class="ml-2 p-2">
         <li ><h3 class="my-0">Add Category</h3></li>
         </ol>
        <ol class="breadcrumb p-2 mr-2">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">dashboard</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="card ">
            <div class="card-body">
                <div class="basic-form">
                <div class="basic-form custom_file_input">
                    <form action="" method="" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Descriptiion</label>
                                <textarea name=""  id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                            <label>Image</label>
                            <div class="input-group mb-3">
                                       <input type="file" name="image" class="form-control" id="">
                                       
                            </div>
                                
                        </div>
                       
                      
                        <input type="submit" value="Add" class="btn btn-primary">
                    </form>
</div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<!--**********************************
        Content body end
    ***********************************-->

@endsection