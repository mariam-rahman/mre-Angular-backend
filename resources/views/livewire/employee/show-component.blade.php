@php
$counter = 0;
@endphp
<div>

    <div class="content-body">
        <div class="container">
            <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                <div class="card">
                    <!--start template-->

                    <div class="row">
                        <div class="col-lg-12 mx-auto text-secondary text-center pt-5">
                            <h2>Employee Information</h2>
                            <p class="lead mb-0"> Findout information about the mentioned employee. </p>
                        </div>
                    </div><!-- End -->


                    <div class="row py-5 px-4">
                        <div class="col-xl-12 col-md-4 col-sm-10 mx-auto">

                            <!-- Profile widget -->
                            <div class="bg-white shadow rounded overflow-hidden">
                                <div class="px-4 pt-0 pb-4 bg-info">
                                    <div class="media align-items-end profile-header">
                                        <div class="profile mr-3 mt-3"><img src="{{asset('storage/'.@$employee->image)}}" alt="..." width="130" class="rounded mb-2 img-thumbnail">

                                            <button onclick="history.back()" class="btn btn-dark btn-sm btn-block">Go back</button>
                                        </div>
                                        <div class="media-body mb-3 text-white">
                                            <h4 class="mt-0 mb-0">{{$employee->name?? ''}}</h4>
                                            <p class="small mb-4"> <i class="fa fa-map-marker mr-2"></i>{{$employee->address?? ''}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bg-light p-4 d-flex mt-5">
                                    <div class="col-md-4">
                                        <ul>
                                            <li class="mb-3">
                                                <h5 class="font-weight-bold mb-0 d-block">Email</h5><small class="text-muted"> <i class="fa fa-envelope fa-fw mr-2"></i>{{$employee->email ?? ''}}</small>
                                            </li>
                                            <li class="mb-3">
                                                <h5 class="font-weight-bold mb-0 d-block">Contact Number</h5><small class="text-muted"><i class="fa fa-phone fa-fw mr-2"></i>{{$employee->phone ?? ''}}</small>
                                            </li>
                                            <li class="mb-3">
                                                <h5 class="font-weight-bold mb-0 d-block">Address</h5><small class="text-muted"> <i class="fa fa-map-marker mr-2"></i>{{$employee->address?? ''}}</small>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <ul>
                                            <li class="mb-3">
                                                <h5 class="font-weight-bold mb-0 d-block">Employee Position</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-2"></i>{{$employee->salaries[0]->designation ?? ''}}</small>
                                            </li>
                                            <li class="mb-3">
                                                <h5 class="font-weight-bold mb-0 d-block">Current Salary</h5><small class="text-muted"> <i  class="fa fa-money mr-2"></i>{{$employee->salaries[0]->salary ?? ''}}</small>
                                            </li>
                                            <li class="mb-3">
                                                <h5 class="font-weight-bold mb-0 d-block">joining Date</h5><small class="text-muted"> <i class="fa fa-calendar mr-2"></i>{{$employee->joining_date ?? ''}}</small>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <ul>
                                            <li class="mb-3">
                                                <h5 class="font-weight-bold mb-0 d-block">Contarct Date</h5><small class="text-muted"> <i class="fa fa-calendar mr-2"></i>{{$employee->created_at?? ''}}</small>
                                            </li>
                                            <li class="mb-3">
                                                <h5 class="font-weight-bold mb-0 d-block">Contract updated</h5><small class="text-muted"> <i class="fa fa-calendar mr-2"></i>{{$employee->updated_at??''}}</small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- End profile widget -->
                        </div>
                    </div>
                    <!--end template-->
                     




                        <!--Promote Employee-->
                       
                        <div class="row py-5 px-4">
                        <div class="col-xl-12 col-md-4 col-sm-10 mx-auto">
                        <h3 class="text-center mb-5">Employee Promotion</h3>
                       
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#promoteModal">Promote</button>
                     
                        

                        <div class="table-responsive ">

                            <table class="table table-striped table-bordered " style="min-width: 845px;">
                                <thead>
                                    <tr class="text-danger">
                                        <th>#</th>
                                        <th>Designation</th>
                                        <th>Salary</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($employee->salaries ?? '' != null)
                                    @foreach($employee->salaries as $sal)
                                    <tr class="text-dark">
                                        <td>{{++$counter}}</td>
                                        <td>{{$sal->designation ?? ''}}</td>
                                        <td>{{$sal->salary ?? ''}}</td>
                                        <td>{{$sal->created_at}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-10 d-flex">
                                                    <button type="button" wire:click="editPromote({{$sal->id}})" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editModal">Edit</button>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        </div> </div>
                    </div>
                </div>
            </div>
        </div>
        <!--model for promote-->
        @include('livewire.employee.promote')
        <!--model for Edit Promote-->
        @include('livewire.employee.editPromote')
        @include('partials.toaster')
  

</div>