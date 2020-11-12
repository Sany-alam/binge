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

        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_top_new_order d-flex align-items-center justify-content-between">
            <h5 class="m-0 text-light"><a href="javascript:history.back()" style="text-decoration: none;" class="text-light mr-2"><</a> <a href="{{route('admin')}}" style="text-decoration: none;" class="text-light mr-2">Home</a></h5>
            <h5 class="m-0 text-light">Logged in as Admin <a href="{{route('logout')}}"><img style="width: 20px" src="{{asset('assets/image/loggedinAsAdmin.png')}}"></a></h5>
        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_bottom_new_order">

        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 breadcumb">
            <p  class= "text-right">Home/User Creation/Update Password</p>
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
           <form action="{{route('update_user_password')}}" method="post">
           @csrf
               <div class="row">
                   <div class="col-md-3 p-0 m-0">

                    <label for="password" class="">Password</label>
                    <label for="re-password" class="">Re-Password</label>

                   </div>
                   <div class="col-md-9 p-0 m-0">

                    <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                    <input type="hidden" class="form-control" name="user_id" id="password" placeholder="Password" value="{{$user_id}}">
                    <input type="text" class="form-control" name="password_confirmation" id="re-password" placeholder="Re-Password">


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
