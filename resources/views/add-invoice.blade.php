@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Create Invoice</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @if(Session::has('invoice_created'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('invoice_created')}}
                </div>
            @endif
                <form method="POST" action="{{route('store.invoice')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Patient <span class="text-danger">*</span></label>
                                <select class="form-control" name="patient_id">
                                    <option selected="" disabled="">Please Select</option>
                                    @foreach ($patients as $patient)
                                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Department <span class="text-danger">*</span></label>
                                <select class="form-control" name="department_id">
                                    <option selected="" disabled="">Please Select</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Tax</label>
                                <select class="form-control" name="tax">
                                    <option selected="" disabled="">Please Select</option>
                                    @foreach ($taxes as $tax)
                                    <option value="{{$tax->id}}">{{$tax->tax_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Invoice date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control" name="date" type="date">
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                       
                        <div class="col-md-12 col-sm-12">
                            <div class="add_item"> 

                            <div class="table-responsive">
                                <table class="table table-hover table-white">
                                   
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">#</th>
                                            <th class="col-sm-2">Item</th>
                                            <th class="col-md-6">Description</th>
                                            <th style="width:100px;">Unit Cost</th>
                                            <th style="width:80px;">Qty</th>
                                            <th>Amount</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <input class="form-control" type="text" name="item_name[]" style="min-width:150px">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="description[]" style="min-width:150px">
                                            </td>
                                            <td>
                                                <input class="form-control" name="unit_cost[]" style="width:100px" type="text">
                                            </td>
                                            <td>
                                                <input class="form-control" name="qty[]" style="width:80px" type="text">
                                            </td>
                                            <td>
                                                <input class="form-control form-amt" name="amount[]" style="width:120px" type="text">
                                            </td>
                                            <td><a href="javascript:void(0)" class="text-success font-18 addeventmore" title="Add"><i class="fa fa-plus"></i></a></td>
                                        </tr>
                                     
                                    </tbody>
                               
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class=" m-t-20">
                       
                        <button class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
</div>





<div style="visibility:hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
           
            <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-hover table-white">
            <tbody>
                <tr>
                    <td style="width: 20px">1</td>
                    <td class="col-sm-2">
                        <input class="form-control" name="item_name[]" type="text" style="min-width:150px">
                    </td>
                    <td class="col-md-6">
                        <input class="form-control" name="description[]" type="text" style="min-width:150px">
                    </td>
                    <td style="width:100px;">
                        <input class="form-control" name="unit_cost[]" style="width:100px" type="text">
                    </td>
                    <td style="width:80px;">
                        <input class="form-control" name="qty[]" style="width:80px" type="text">
                    </td>
                    <td>
                        <input class="form-control form-amt" name="amount[]"  style="width:120px" type="text">
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="text-success font-18 addeventmore" title="Add"><i class="fa fa-plus"></i></a>
                        <a href="javascript:void(0)" class="text-success font-18 removeeventmore" title="Minus"><i class="fa fa-minus"></i></a>
                    </td>
                </tr>
               
             
            </tbody>
        </table>
    </div>
        </div>
    </div>
        </div>

    </div>

</div>

<script>
    $(document).ready(function(){
        var counter=0;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add=$('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",".removeeventmore",function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter-=1;

        });

    });
</script>    
@endsection