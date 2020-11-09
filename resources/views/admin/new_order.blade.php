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
                            <th>Ticked</th>
                            <th>Customer Phone number</th>
                            <th>Customer Address</th>
                            <th>Special Instruction</th>
                            <th>Order Generator</th>
                            <th>Order Date and Time</th>
                            <th>Assign Delivery Partner</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                     @for ($i = 0; $i < 20; $i++)
                     <tr>
                        <td>{{$i}}</td>
                        <td>ticket</td>
                        <td>Ticked</td>
                        <td>0187665656</td>
                        <td>test Address</td>
                        <td>test Instruction</td>
                        <td>Order Generator</td>
                        <td>as</td>
                        <td>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                    </tr>
                     @endfor
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
