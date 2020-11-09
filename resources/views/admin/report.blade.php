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
           <div class="row">
                <div class="col-2">
                   <input type="number" class="search form-control" placeholder="Order no.">
                </div>
                <div class="col-4">
                   <input type="date" class="search form-control" placeholder="From Date">
                </div>
                <div class="col-4">
                   <input type="date" class="search form-control" placeholder="To Date">
                </div>
                <div class="col-2">
                   <select name="" id="" class="search form-control">
                       <option value="">Delivery Status</option>
                   </select>
                </div>
           </div>
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
                            <th>Delivery Partner</th>
                            <th>Order Generator Date & Time</th>
                            <th>Delivery completed Date & time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                     <tr>
                         <td>Order No</td>
                         <td>Customer Name</td>
                         <td>Customer Pdone number</td>
                         <td>Ticket</td>
                         <td>Customer Address</td>
                         <td>Customer Instruction</td>
                         <td>Admin Instruction</td>
                         <td>Source of lead</td>
                         <td>Delivery Partner</td>
                         <td>Order Generator Date & Time</td>
                         <td>Delivery completed Date & time</td>
                         <td>Status</td>
                     </tr>
                     <tr>
                         <td>Order No</td>
                         <td>Customer Name</td>
                         <td>Customer Pdone number</td>
                         <td>Ticket</td>
                         <td>Customer Address</td>
                         <td>Customer Instruction</td>
                         <td>Admin Instruction</td>
                         <td>Source of lead</td>
                         <td>Delivery Partner</td>
                         <td>Order Generator Date & Time</td>
                         <td>Delivery completed Date & time</td>
                         <td>Status</td>
                     </tr>
                     <tr>
                         <td>Order No</td>
                         <td>Customer Name</td>
                         <td>Customer Pdone number</td>
                         <td>Ticket</td>
                         <td>Customer Address</td>
                         <td>Customer Instruction</td>
                         <td>Admin Instruction</td>
                         <td>Source of lead</td>
                         <td>Delivery Partner</td>
                         <td>Order Generator Date & Time</td>
                         <td>Delivery completed Date & time</td>
                         <td>Status</td>
                     </tr>
                     <tr>
                         <td>Order No</td>
                         <td>Customer Name</td>
                         <td>Customer Pdone number</td>
                         <td>Ticket</td>
                         <td>Customer Address</td>
                         <td>Customer Instruction</td>
                         <td>Admin Instruction</td>
                         <td>Source of lead</td>
                         <td>Delivery Partner</td>
                         <td>Order Generator Date & Time</td>
                         <td>Delivery completed Date & time</td>
                         <td>Status</td>
                     </tr>
                     <tr>
                         <td>Order No</td>
                         <td>Customer Name</td>
                         <td>Customer Pdone number</td>
                         <td>Ticket</td>
                         <td>Customer Address</td>
                         <td>Customer Instruction</td>
                         <td>Admin Instruction</td>
                         <td>Source of lead</td>
                         <td>Delivery Partner</td>
                         <td>Order Generator Date & Time</td>
                         <td>Delivery completed Date & time</td>
                         <td>Status</td>
                     </tr>
                     <tr>
                         <td>Order No</td>
                         <td>Customer Name</td>
                         <td>Customer Pdone number</td>
                         <td>Ticket</td>
                         <td>Customer Address</td>
                         <td>Customer Instruction</td>
                         <td>Admin Instruction</td>
                         <td>Source of lead</td>
                         <td>Delivery Partner</td>
                         <td>Order Generator Date & Time</td>
                         <td>Delivery completed Date & time</td>
                         <td>Status</td>
                     </tr>
                     <tr>
                         <td>Order No</td>
                         <td>Customer Name</td>
                         <td>Customer Pdone number</td>
                         <td>Ticket</td>
                         <td>Customer Address</td>
                         <td>Customer Instruction</td>
                         <td>Admin Instruction</td>
                         <td>Source of lead</td>
                         <td>Delivery Partner</td>
                         <td>Order Generator Date & Time</td>
                         <td>Delivery completed Date & time</td>
                         <td>Status</td>
                     </tr>
                     <tr>
                         <td>Order No</td>
                         <td>Customer Name</td>
                         <td>Customer Pdone number</td>
                         <td>Ticket</td>
                         <td>Customer Address</td>
                         <td>Customer Instruction</td>
                         <td>Admin Instruction</td>
                         <td>Source of lead</td>
                         <td>Delivery Partner</td>
                         <td>Order Generator Date & Time</td>
                         <td>Delivery completed Date & time</td>
                         <td>Status</td>
                     </tr>
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
        $('.table').dataTable({
            searching: false,
            paging: true,
            info: false,
            scrollY: 300,
            bJQueryUI: true,
        });
    })
</script>
@endsection
