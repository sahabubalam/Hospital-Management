@extends('layouts.app')

@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Appointment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                    @if(Session::has('appointed_added'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('appointed_added')}}
                        </div>
                    @endif
                        <form method="POST" action="{{route('store.appointment')}}">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
										<label>Appointment ID</label>
										<input class="form-control @error('appointment_id') is-invalid @enderror" name="appointment_id" type="text" >
                                            @error('appointment_id')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Patient Name</label>
										<select class="form-control patient_name @error('patient_id') is-invalid @enderror" name="patient_id">
                                        <option selected="true" disabled >Select</option>
                                       
                                            @foreach($patients as $patient)
											<option value="{{$patient->id}}">{{$patient->name}}</option>
										    @endforeach	
                                           
                                        
										</select>
                                        @error('patient_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                        
									</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control @error('department_id') is-invalid @enderror" name="department_id">
                                        <option>Select</option>
                                        @foreach($departments as $department)
											<option value="{{$department->id}}">{{$department->department_name}}</option>
										@endforeach	
                                        </select>
                                        @error('department_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id">
                                        <option>Select</option>
                                        @foreach($doctors as $doctor)
											<option value="{{$doctor->id}}">{{$doctor->first_name}}</option>
										@endforeach	
                                        </select>
                                        @error('doctor_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="cal-icon">
                                            <input id="datepicker" name="date" type="text" class="form-control datetimepicker @error('date') is-invalid @enderror">
                                            @error('date')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Appointment Time</label>
                                        <select class="form-control" name="time">
                                            <option>Select</option>
                                            <option value="10:00am - 11:00am">10:00am - 11:00am</option>
                                            <option value="10:00am - 11:00am">11:00am - 12:00am</option>
                                            <option value="10:00am - 11:00am">2:00pm - 3:00pm</option>
                                            <option value="10:00am - 11:00am">4:00pm - 5:00pm</option>
                                            <option value="10:00am - 11:00am">6:00pm - 7:00pm</option>
                                            <option value="10:00am - 11:00am">7:00pm - 8:00pm</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Email</label>
                                        <input class="form-control pat_email" name="patient_email" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Phone Number</label>
                                        <input class="form-control pat_number" name="patient_phone" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" name="message" rows="4" class="form-control"></textarea>
                            </div>
                           
                            <div class="m-t-20">
                                <button type="submit" class="btn btn-primary ">Create Appointment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
        </div>
        <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.patient_name').change(function(){
                console.log("hmm its change");
                var p_id=$(this).val();
                console.log(p_id);
                var op="";
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findPatientEmail')!!}',
                    data:{'id':p_id},
                    dataType:'json',
                    success:function(data){
                        if(data === null) {
                            alert('empty');
                            return;
                        }
                        console.log("email");
                        console.log(data.email);
                        $('.pat_email').val(data.email);
                        $('.pat_number').val(data.phone);
                        
                    },
                    error:function(){
                        
                    }
                });

            });

        });
        </script>

       
        @endsection