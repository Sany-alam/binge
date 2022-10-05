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
    .dataTables_scrollBody{
        height:257px !important;
        max-height:257px !important;
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
            <p  class= "text-right">Home/User Creation</p>
        </div>
    </div>

    @if(Session::has('success'))
    <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-success" >

        {{Session::get('success')}}

        </div>
    @endif

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
                            <th>Update Password</th>
                            <th>Edit Data</th>
                            <th>Delete Data</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                        $i=1;
                     ?>
                     @foreach($users as $user)

                     <tr>
                        <td>{{$i++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->user_name}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>{{$user->user_role}}</td>
                        <td class="text-center"><a href="update_password/{{$user->id}}"><img style="width:20px" src="{{asset('assets/image/edit.png')}}" alt=""></a></td>

                        <td class="text-center"><a href="edit_user/{{$user->id}}"><img style="width:20px" src="{{asset('assets/image/edit.png')}}" alt=""></a></td>
                        <td class="text-center"><a href="#"><img style="width:20px" src="{{asset('assets/image/delete.png')}}" alt=""></a></td>
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
        $('.table').dataTable({
            searching: true,
            paging: true,
            info: false,
            scrollY: 240,
            bJQueryUI: true,
        });
    })
</script>
@endsection
