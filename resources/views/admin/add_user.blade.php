@extends('app')
@section('css')
<style>
    label{
        font-weight: 700;
        font-size: 14px;
        display: block;
        margin-bottom: .5rem;
        padding-top: 14px;
    }
    input.form-control-plaintext{
        font-weight: 800;
        display: block;
        margin-top: 8px;
        width: 100%;
        padding: .375rem 0;
        margin-bottom: 0;
        font-size: 14px;
        line-height: 1.5;
        color: #212529;
        background-color: transparent;
        border: solid transparent;
        border-width: 1px 0;
    }
    .form-control {
        margin-top: 12px;
        display: block;
        width: 100%;
        height: 30px;
        padding: .75rem;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>
@endsection
@section('body')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_top_new_order">

        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_bottom_new_order">

        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 breadcumb">
            <p  class= "text-right">Home/User Creation/Add User</p>
        </div>
        

    </div>

    @if(Session::has('success'))
    <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-success" >
                
        {{Session::get('success')}}
                
        </div>
    @endif

    @if ($errors->any())
            <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-danger" >
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
     @endif
   
    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 main_page_new_order">
            <div class="main_page_row_new_order">
           <form action="{{route('add_user')}}" method="post">
           @csrf
               <div class="row">
                   <div class="col-md-3 p-0 m-0">
                    <label for="fullname" class="">Full Name</label>
                    <label for="username" class="">Username</label>
                    <label for="password" class="">Password</label>
                    <label for="re-password" class="">Re-Password</label>
                    <label class="">Role</label>
                    <label for="phoneNumber" class="">Phone Number</label>
                   </div>
                   <div class="col-md-9 p-0 m-0">
                    <input type="text" class="form-control" name="name" id="fullname" placeholder="Full Name">
                    <input type="text" class="form-control" name="user_name" id="username" placeholder="Username">
                    <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                    <input type="text" class="form-control" name="password_confirmation" id="re-password" placeholder="Re-Password">
                    <div class="form-inline" style="margin-top: 20px;">
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="user_role" id="admin" value="admin" checked>
                            <label class="form-check-label p-0" for="admin">Admin</label>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="user_role" id="order-generator" value="order-generator" checked>
                            <label class="form-check-label p-0" for="order-generator">Order generator</label>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="user_role" id="delivery-partner" value="delivery-partner" >
                            <label class="form-check-label p-0" for="delivery-partner">Delivery partner</label>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="user_role" id="delivery-partner" value="bp">
                            <label class="form-check-label p-0" for="delivery-partner">BP</label>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="user_role" id="delivery-partner" value="retailer">
                            <label class="form-check-label p-0" for="delivery-partner">Retailer</label>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="phone_number" id="Phone number" placeholder="Phone number">
                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                   </div>
               </div>
           </form>
        </div>


        </div>

    </div>
</div>
@endsection
