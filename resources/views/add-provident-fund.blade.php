@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Provident Fund</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                @if(Session::has('fund_added'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('fund_added')}}
                </div>
                @endif
                <form method="POST" action="{{route('store.providentfund')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Employee Name</label>
                                <select class="form-control @error('employee_id') is-invalid @enderror select" name="employee_id">
                                    <option selected="true" disabled >Select Employee</option>
                                    @foreach ($employee as $row)
                                    <option value="{{$row->id}}">{{$row->first_name}}</option>
                                    @endforeach
                                   
                                </select>
                                @error('employee_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Provident Fund Type</label>
                                <select class="form-control @error('fund_type') is-invalid @enderror select" name="fund_type">
                                    <option selected="true" disabled>Select</option>
                                    <option value="Fixed Amount">Fixed Amount</option>
                                    <option value="Percentage of Basic Salary">Percentage of Basic Salary</option>
                                </select>
                                @error('fund_type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                      
                        <div class="col-sm-12">
                            <div class="show-basic-salary">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Employee Share (%)</label>
                                            <input class="form-control @error('employee_share') is-invalid @enderror" type="text" name="employee_share">
                                            @error('employee_share')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Organization Share (%)</label>
                                            <input class="form-control @error('organization_share') is-invalid @enderror" type="text" name="organization_share">
                                            @error('organization_share')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4" cols="50"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20">
                        <button type="submit" class="btn btn-primary">Save Provident Fund</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</div>
@endsection