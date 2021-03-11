@extends('layouts.app')

@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Holiday</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                    @if(Session::has('holiday_added'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('holiday_added')}}
                        </div>
                    @endif
                        <form method="POST" action="{{route('store.holiday')}}">
                        @csrf
                            <div class="form-group">
                                <label>Holiday Name <span class="text-danger">*</span></label>
                                <input class="form-control" name="title" type="text">
                            </div>
                            <div class="form-group">
                                    <label>Day</label>
                                    <select class="form-control" name="day">
                                        <option value="Sutarday">Sutarday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label>Holiday Date</label>
                                    <div class="cal-icon" >
                                        <!-- <input type="text" class="form-control datetimepicker"> -->
                                        <input type="text" id="datepicker" class="form-control" id="date" name="holiday_date">
                                    </div>
                                </div>
                                
                               
                            <div class="m-t-20">
                                <button type="submit" class="btn btn-primary ">Create Holiday</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
        </div>
        @endsection