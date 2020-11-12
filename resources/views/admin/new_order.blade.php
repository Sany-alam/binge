@extends('app')
@section('css')
<style>
    .search.form-control {
        margin-top: 12px;
        display: block;
        width: 100%;
        height: 30px;
        padding: 0px 5px;
        font-size: 12px;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    table.dataTable{
        font-size: 11px;
    }
    table.table td, table.table th {
        /* padding: .50rem!important; */
        padding-top: 0.25rem!important;
        padding-right: 0.25rem!important;
        padding-bottom: 0.25rem!important;
        padding-left: 0.25rem!important;
    }
    table.dataTable thead th, table.dataTable thead td{
        padding: 0px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button{
        padding: 0px!important;
    }
    .dataTables_paginate.paging_simple_numbers{
        font-size: 13px!important;
        padding-top: 8px!important;
    }
    table thead{
        background-color: #E20001;
        color: #fff;
    }
    .dataTables_length{
        display: none!important;
    }
    .dataTables_scrollBody{
        height:295px !important;
        max-height:295px !important;
        border:none !important;
    }
</style>
@endsection
@section('body')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_top d-flex align-items-center justify-content-between">
            <h5 class="m-0 text-light">Home</h5>
            <h5 class="m-0 text-light">Logged in as Admin <img style="width: 20px" src="{{asset('assets/image/loggedinAsAdmin.png')}}"></h5>
        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_bottom">

        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 breadcumb">
            <p  class= "text-right">Home/New Order</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 main_page">
            <div class="my-3 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order no</th>
                            <th>Customer Name</th>
                            <th>Ticket</th>
                            <th>Customer Phone number</th>
                            <th>Customer Address</th>
                            <th>Customer Instruction</th>
                            <th>Source of lead</th>
                            <th>Order Generator</th>
                            <th>Order Date and Time</th>
                            <th>Assign Delivery Partner</th>
                            <th>Admin Instruction</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($orders as $order)
                     <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->ticket_no}}</td>
                        <td>{{$order->customer_phone_no}}</td>
                        <td>{{$order->customer_address}}</td>
                        <td>{{$order->customer_instruction}}</td>
                        <td>{{$order->source_of_lead}}</td>
                        <td>{{$order->order_generator}}</td>
                        <td>{{$order->order_generated_date_time}}</td>
                        
                      
                        <td>
                            <select class="form-control" id="delivery_partner">
                            @foreach($delivery_partners as $delivery_partner)
                        <option value="{{$delivery_partner->id}}">{{$delivery_partner->name}}</option>
                        @endforeach
                            </select>
                        </td>
                        <td>
                        <textarea class="form-control" name="customer_instruction" id="admin_instruction" rows="2"></textarea>
                        </td>
                        <td><button class="btn btn-success btn-sm" onclick ="confirm_order('{{$order->id}}')">Confirm</button></td>
                    </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.table').dataTable({
            searching: false,
            paging: true,
            info: false,
            sScrollX: "100%",
            sScrollXInner: "100%",
            bJQueryUI: true,
        });
    })

    function confirm_order(order_no)
    {
        var delivery_partner = $("#delivery_partner").val();
        var admin_instruction = document.getElementById("admin_instruction").value;
        var formdata = new FormData();
         formdata.append('order_id',order_no);
         formdata.append('delivery_partner',delivery_partner);
         formdata.append('admin_instruction',admin_instruction);
       // alert(admin_instruction+" "+delivery_partner);
        $.ajax({
      processData: false,
      contentType: false,
      url:"confirm_order",
      type:"POST",
      data:formdata,
      success:function(data,status){
         
        
         location.reload();
        

      },

    });
    }
</script>
@endsection
