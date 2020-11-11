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
            <p  class= "text-right">Home/User Creation/Report Menue</p>
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
           <form action="{{route('show_report')}}" method="post">
           @csrf
               <div class="row">
                   <div class="col-md-3 p-0 m-0">
                    <label for="fullname" class="">From Date</label>
                    <label for="username" class="">To Date</label>
                    <label for="password" class="">Delivery Partner</label>
                    <label for="re-password" class="">Order Generator</label>
                   
                   </div>
                   <div class="col-md-9 p-0 m-0">
                   <input type="date" name="from_date" class="search form-control" placeholder="From Dates">
                   <input type="date" name="to_date" class="search form-control" placeholder="To Date">
                   <select style="padding: 0px 20px 0 10px;" name="delivery_partner" class="form-control" id="exampleFormControlSelect1">
                        <option value="All">All</option>
                        @foreach($delivery_partners as $delivery_partner)
                        <option value="{{$delivery_partner->name}}">{{$delivery_partner->name}}</option>
                        @endforeach
                      
                    </select>
                    <select style="padding: 0px 20px 0 10px;" name="order_generator" class="form-control" id="exampleFormControlSelect1">
                        <option value="All">All</option>
                        @foreach($order_generators as $order_generator)
                        <option value="{{$order_generator->name}}">{{$order_generator->name}}</option>
                        @endforeach
                      
                    </select>
                  
                  
                
                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-success">Show Report</button>
                    </div>
                   </div>
               </div>
           </form>
        </div>


        </div>

    </div>
</div>
@endsection
