@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-4">
                <h4 class="page-title">Provident Fund</h4>
            </div>
            <div class="col-sm-7 col-8 text-right m-b-30">
                <a href="/add-provident-fund" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Provident Fund</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    @if(Session::has('fund'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('fund')}}
                            </div>
                            @endif
                    <table class="table table-striped custom-table datatable mb-0">
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Provident Fund Type</th>
                                <th>Employee Share</th>
                                <th>Organization Share</th>
                              
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fund as $row)
                            <tr>
                                <td>
                                    <a href="profile.html" class="avatar">A</a>
                                    <h2><a href="/employee-profile/{{$row->id}}">{{$row->first_name}}  <span> {{$row->role}}</span></a></h2>
                                </td>
                                <td>{{$row->fund_type}}</td>
                                <td>{{$row->employee_share}}</td>
                                <td>{{$row->organization_share}}</td>
                             
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/edit-provident-fund/{{$row->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="/delete-provident-fund/{{$row->id}}" data-toggle="modal" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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