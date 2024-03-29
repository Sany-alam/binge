@extends('app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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

        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_top_new_order d-flex align-items-center justify-content-between">
            <h5 class="m-0 text-light"><a href="javascript:history.back()" style="text-decoration: none;" class="text-light mr-2"><</a> <a href="{{route('admin')}}" style="text-decoration: none;" class="text-light mr-2">Home</a></h5>
            <h5 class="m-0 text-light">Logged in as Admin <a href="{{route('logout')}}"><img style="width: 20px" src="{{asset('assets/image/loggedinAsAdmin.png')}}"></a></h5>
        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_bottom_new_order text-center">
        <img src="{{asset('assets')}}/image/logo_white.png">
        </div>

    </div>
    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 breadcumb">
            <p  class= "text-right">Home/Report</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 main_page">
     
            <div class="my-3 table-responsive">
                <table class="table  table-bordered">
                    <thead>
                        <tr>
                        <th></th>
                            <th>SL No</th>
                            <th>Customer Name</th>
                            <th style="word-break:break-all;width:200px">Customer Address</th>
                            <th>Sold Status</th>
                            <th>Device Quantity</th>
                            <th>Device Serial Number</th>
                            <th>Source of Lead</th>
                            <th style="word-break:break-all;width:200px">Own Remarks</th>
                            <th style="word-break:break-all;width:200px">Admin Remarks</th>
                            <th>Date and Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                     <tr>
                     <td class="text-center"><a href="edit_report/{{$order->id}}"><img style="width:20px" src="{{asset('assets/image/edit.png')}}" alt=""></a></td>
                         <td>{{$order->id}}</td>
                         <td>{{$order->customer_name}}</td>
                         <td style="word-break:break-all;width:200px">{{$order->customer_address}}</td>
                         <td>{{$order->sold_status}}</td>
                         <td>{{$order->device_quantity}}</td>
                         <td>{{$order->device_serial_number}}</td>
                         <td>{{$order->source_of_lead}}</td>
                         <td style="word-break:break-all;width:200px">{{$order->brand_promoter_remarks}}</td>
                       
                         <td>{{$order->admin_remarks}}</td>
                         <td>{{$order->created_at}}</td>
                        
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
<script>
    $(function() {
        $('.table').dataTable({
            searching: true,
            paging: true,
            info: false,
            sScrollX: "100%",
            sScrollXInner: "110%",
            bJQueryUI: true,
        });
    })
</script>
@endsection
