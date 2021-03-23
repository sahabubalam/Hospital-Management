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
                    @if(Session::has('holiday_update'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('holiday_update')}}
                        </div>
                    @endif
                        <form method="POST" action="{{route('update.holiday')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$holiday->id}}" >
                            <div class="form-group">
                                <label>Holiday Name <span class="text-danger">*</span></label>
                                <input class="form-control" name="title" value="{{$holiday->title}}" <?php if($holiday->title) echo "selected";?> type="text">
                            </div>
                            <div class="form-group">
                                    <label>Day</label>
                                    <select class="form-control" name="day">
                                        <option value="Sutarday" <?php if($holiday->day=='Sutarday') echo "selected";?> >Sutarday</option>
                                        <option value="Sunday" <?php if($holiday->day=='Sunday') echo "selected";?>>Sunday</option>
                                        <option value="Monday" <?php if($holiday->day=='Monday') echo "selected";?>>Monday</option>
                                        <option value="Tuesday" <?php if($holiday->day=='Tuesday') echo "selected";?>>Tuesday</option>
                                        <option value="Wednesday" <?php if($holiday->day=='Wednesday') echo "selected";?>>Wednesday</option>
                                        <option value="Thursday" <?php if($holiday->day=='Thursday') echo "selected";?>>Thursday</option>
                                        <option value="Friday" <?php if($holiday->day=='Friday') echo "selected";?>>Friday</option>
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label>Holiday Date</label>
                                    <div class="cal-icon" >
                                        <!-- <input type="text" class="form-control datetimepicker"> -->
                                        <input type="text" id="datepicker" class="form-control" value="{{$holiday->holiday_date}}" <?php if($holiday->holiday_date) echo "selected";?> id="date" name="holiday_date">
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