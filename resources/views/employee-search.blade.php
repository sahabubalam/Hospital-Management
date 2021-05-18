@extends('layouts.app')

@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Employee</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="/add-employee" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Employee</a>
                    </div>
                </div>
             
                {{-- <div class="input-group mb-2">
                    <form action="/search" method="get">
                        <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-primary">search</button>
                    </form>
                </div>
                 --}}
                <div class="row form-group">
                    <div class="col-md-5">
                    <form action="/search" method="get" class="form-inline">
                    <input class="form-control" type="search" name="search">
                    
                      <button class="btn btn-secondary" type="submit">search</button>
             
                   </form>
                </div>
                </div>
             

                <div class="row">
                    <div class="col-md-12">
						<div class="table-responsive">
                        @if(Session::has('employee_deleted'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('employee_deleted')}}
                        </div>
                    @endif
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th style="min-width:200px;">Name</th>
                                        <th>Employee ID</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th style="min-width: 110px;">Join Date</th>
                                        <th>Role</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>
											<img width="28" height="28" src="{{asset('employees')}}/{{$employee->photo}}" class="rounded-circle" alt=""> <h2>{{$employee->first_name}}</h2>
										</td>
                                        <td>{{$employee->employee_id}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>{{$employee->date}}</td>
                                        <td>
                                            <span class="custom-badge status-green">{{$employee->role}}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="/edit-employee/{{$employee->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="/delete-employee/{{$employee->id}}" data-toggle="modal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
        @endsection