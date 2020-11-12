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
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_top_new_order d-flex align-items-center justify-content-between">
            <h5 class="m-0 text-light"><a href="javascript:history.back()" style="text-decoration: none;" class="text-light mr-2"><</a> <a href="{{route('admin')}}" style="text-decoration: none;" class="text-light mr-2">Home</a></h5>
            <h5 class="m-0 text-light">Logged in as Admin <a href="{{route('logout')}}"><img style="width: 20px" src="{{asset('assets/image/loggedinAsAdmin.png')}}"></a></h5>
        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 breadcumb">
            <p  class= "text-right">Home/New Order</p>
        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 main_page_new_order">
            <div class="main_page_row_new_order">
           <form>
               <div class="row">
                   <div class="col-md-5 p-0 m-0">
                    <label for="OrderNo" class="">Order No.</label>
                    <label for="CustomerName" class="">Customer Name</label>
                    <label for="TicketNo" class="">Ticket no</label>
                    <label for="Source of lead" class="">Source of lead</label>
                    <label for="Customer Address" class="">Customer Address</label>
                    <label for="Customer Phone number" class="">Customer Phone number</label>
                    <label for="Special Instruction" class="">Special Instruction</label>
                   </div>
                   <div class="col-md-7 p-0 m-0">
                    <input type="text" readonly class="form-control-plaintext" id="OrderNo" value="email@example.com">
                    <input type="text" class="form-control" id="CustomerName" placeholder="Customer Name">
                    <input type="text" class="form-control" id="TicketNo" placeholder="Ticket No">
                    <input type="text" class="form-control" id="Source of lead" placeholder="Source of lead">
                    <input type="text" class="form-control" id="Customer Address" placeholder="Customer Address">
                    <input type="text" class="form-control" id="Customer Phone number" placeholder="Customer Phone number">
                    <textarea id="Special Instruction" class="form-control" placeholder="Special Instruction"></textarea>
                    <div class="text-right mt-3">
                        <button class="btn btn-success">Confirm</button>
                    </div>
                   </div>
               </div>
           </form>
        </div>


        </div>

    </div>
</div>
@endsection
