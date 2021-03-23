@extends('layouts.app')

@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Leave</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                    @if(Session::has('employee_leave'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('employee_leave')}}
                        </div>
                    @endif
                        <form method="POST" action="{{route('update.leave')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$empLeave->id}}" >
                           <div class="row">
							   <div class="col-md-6">
                                   <div class="form-group">
                                   <label>Leave Type <span class="text-danger">*</span></label>
                                    <select class="form-control" name="leave_type">
                                        <option >Select Leave Type</option>
                                        <option value="Casual Leave" <?php if($empLeave->leave_type=='Casual Leave') echo "selected";?> >Casual Leave</option>
                                        <option value="Medical Leave" <?php if($empLeave->leave_type=='Medical Leave') echo "selected";?>>Medical Leave</option>
                                        
                                    </select>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                   <label>Employee Name <span class="text-danger">*</span></label>
                                    <select class="form-control" name="employee_id">
                                        <option>Select Employee ID</option>
                                        @foreach($employees as $employee)
                                        <option value="{{$employee->id}}" <?php if($employee->id==$empLeave->employee_id) echo "selected";?> >{{$employee->first_name}}</option>
                                        @endforeach
                                    </select>
                                   </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>From <span class="text-danger">*</span></label>
                                        <div class="cal-icon" >
                                           
                                            <input type="text" id="datepicker" value="{{$empLeave->from}}" <?php if($empLeave->from) echo "selected";?> class="form-control" id="date" name="from">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>To </label>
                                        <div class="cal-icon" >
                                            <!-- <input type="text" class="form-control datetimepicker"> -->
                                            <input type="text" id="datepicker" class="form-control" value="{{$empLeave->to}}" <?php if($empLeave->to) echo "selected";?> id="date" name="to">
                                        </div>
                                    </div>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Number of days <span class="text-danger">*</span></label>
										<input class="form-control" name="no_of_days" value="{{$empLeave->no_of_days}}" <?php if($empLeave->no_of_days) echo "selected";?>  type="text">
									</div>
								</div>
								
							</div>
                            <div class="form-group">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea rows="4" name="leave_reason" cols="5" class="form-control"></textarea>
                            </div>
                            <div class="m-t-20">
                                <button type="submit" class="btn btn-primary">Send Leave Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
        </div>
        @endsection