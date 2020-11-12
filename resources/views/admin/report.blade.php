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
<div class="container container-sm">
    <div class="row">

        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_top">

        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_top_new_order">

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
                            <th>Order No</th>
                            <th>Customer Name</th>
                            <th>Customer Phone number</th>
                            <th>Ticket</th>
                            <th>Customer Address</th>
                            <th>Customer Instruction</th>
                            <th>Admin Instruction</th>
                            <th>Source of lead</th>
                            <th>Order Generator</th>
                            <th>Delivery Partner</th>
                            <th>Order Generator Date & Time</th>
                            <th>Delivery completed Date & time</th>
                            <th>Delivery Complete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                     <tr>
                         <td>{{$order->id}}</td>
                         <td>{{$order->customer_name}}</td>
                         <td>{{$order->customer_phone_no}}</td>
                         <td>{{$order->ticket_no}}</td>
                         <td>{{$order->customer_address}}</td>
                         <td>{{$order->customer_instruction}}</td>
                         <td>{{$order->admin_instruction}}</td>
                         <td>{{$order->source_of_lead}}</td>
                         <td>{{$order->order_generator}}</td>
                         <td>{{$order->delivery_partner}}</td>
                         <td>{{$order->order_generated_date_time}}</td>
                         <td>{{$order->order_completed_date_time}}</td>
                         @if($order->order_complete_status == 1)
                         <td class='text-success'>Complete</td>
                         @else
                         <td class='text-danger'>Pending</td>
                         @endif
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
            scrollY: 300,
            bJQueryUI: true,
        });
    })
</script>
@endsection
