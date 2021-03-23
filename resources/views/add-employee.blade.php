@extends('layouts.app')

@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Employee</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                    @if(Session::has('employee_added'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('employee_added')}}
                        </div>
                    @endif
                        <form method="POST" action="{{route('store.employee')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input name="first_name" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="last_name" class="form-control" type="text">
                                    </div>
                                </div>
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input name="email" class="form-control" type="email">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Employee ID <span class="text-danger">*</span></label>
                                        <input  name="employee_id" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Joining Date</label>
                                        <div class="cal-icon" >
                                            <!-- <input type="text" class="form-control datetimepicker"> -->
                                            <input type="text" id="datepicker" class="form-control" id="date" name="date">
                                        </div>
                                    </div>
                                </div>
                 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input name="phone" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role">
                                            <option value="Admin">Admin</option>
                                            <option value="Doctor">Doctor</option>
                                            <option value="Nurse">Nurse</option>
                                            <option value="Laboratorist">Laboratorist</option>
                                            <option value="Pharmacist">Pharmacist</option>
                                            <option value="Accountant">Accountant</option>
                                            <option value="Receptionist">Receptionist</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Avatar</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img id="img" style="max-width:130px;" alt="doctor photo">
											</div>
											<div class="upload-input">
												<input type="file" id="file" name="file" class="form-control" onchange="readURL(this)">
											</div>
										</div>
									</div>
                                </div>
                            </div>
                          
                            <div class="m-t-20">
                                <button type="submit" class="btn btn-primary ">Create Employee</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
        </div>
        @endsection