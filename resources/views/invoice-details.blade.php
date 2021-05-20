<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
    <table id="customers">
        <tr>
          <td><h2>Laravel Learning</h2></td>
          <td><h2>School ERP</h2>
          <p>School Address</p>
          <p>Phone : 01756265446</p>
          <p>Email : sahabub.cse@gmail.com</p>
          </td>
        </tr>
    </table>

<table id="customers">
  <tr>
    <th width="10%">SI</th>
    <th width="30%">Item Name</th>
    <th width="30%">Description</th>
    <th width="30%">Unit Cost</th>
    <th width="30%">Amount</th>
    
  </tr>


  @php
  $count=0;
  @endphp


  @foreach ($allData as $key=>$invoice)
  <tr>
    <td>{{$key+1}}</td>
    <td>{{$invoice->item_name}}</td>
    <td>{{$invoice->description}}</td>
    <td>{{$invoice->unit_cost}}</td>
    <td>{{$invoice->amount}}</td>
   
  </tr>

  @php
    $count=$count+$invoice->amount
  @endphp

 
  @endforeach

  <tr>
    <td></td>
   
    <td>Total</td>
    <td></td>
    <td></td>
   
    <td><b>$ {{$count}}</b></td>
  </tr>
 
</table>
<br>
<i style="font-size:10px;float:right;">Print Date: {{date("d M Y")}}</i>

</body>
</html>
