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
            <p  class= "text-right">Home/User Creation</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 main_page">
            <div class=" my-3 d-flex justify-content-end">
                <a href="{{url('admin/add-user')}}" class="btn btn-success">Add User</a>
            </div>
            <div class="my-3 table-responsive">
                <table class="table  table-bordered">
                    <thead>
                        <tr>
                            <th>Sl no</th>
                            <th>Name</th>
                            <th>User name</th>
                            <th>Phone number</th>
                            <th>Role</th>
                            <th>Default password</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                     @for ($i = 0; $i < 20; $i++)
                     <tr>
                        <td>1</td>
                        <td>asdaf</td>
                        <td>dfsdf</td>
                        <td>284648</td>
                        <td>assda</td>
                        <td>asd</td>
                        <td class="text-center"><a href="#"><img style="width:20px" src="{{asset('assets/image/edit.png')}}" alt=""></a></td>
                        <td class="text-center"><a href="#"><img style="width:20px" src="{{asset('assets/image/delete.png')}}" alt=""></a></td>
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
            scrollY: 240,
            bJQueryUI: true,
        });
    })
</script>
@endsection
