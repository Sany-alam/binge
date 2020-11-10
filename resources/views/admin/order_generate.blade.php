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
<div class="container container-sm">
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
           <form action="{{route('submit_order')}}" method="post">
           @csrf
               <div class="row">
                   <div class="col-md-3 p-0 m-0">
                    <label for="fullname" class="">Order No</label>
                    <label for="username" class="">Customer Name</label>
                    <label for="password" class="">Ticket No</label>
                    <label for="re-password" class="">Source of lead</label>
                    <label class="">Customer Address</label>
                    <label for="phoneNumber" class="">Customer Phone Number</label>
                    <label for="Customer Instruction" class="">Customer Instruction</label>
                   </div>
                   <div class="col-md-9 p-0 m-0">
                    <input type="text" class="form-control" name="order_no" id="fullname" placeholder="Full Name" value="1" disabled>
                    <input type="text" class="form-control" name="customer_name" id="username" placeholder="Customer Name">
                    <input type="text" class="form-control" name="ticket_no" id="re-password" placeholder="Ticket No">

                    <select style="padding: 0px 20px 0 10px;" name="source_of_lead" class="form-control" id="exampleFormControlSelect1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>


                    <input type="text" class="form-control" name="customer_address" id="re-password" placeholder="Customer Address">

                    <input type="text" class="form-control" name="customer_phone_number" id="Phone number" placeholder="Customer Phone Number">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
