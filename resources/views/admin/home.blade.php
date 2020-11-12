@extends('app')
@section('css')
<style>
    .main_page {
        height: 50vh;
        border: 1px solid black;
        margin-top: 6px;
        border-radius: 4px;
        background-color: #ECF0F1;
        margin-bottom: 50px;
    }
</style>
@endsection
@section('body')
<div class="container container-sm">
    <div class="row">

        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_top d-flex align-items-center justify-content-end">

            <h5 class="m-0 text-light">Logged in as Admin <a href="{{route('logout')}}"><img style="width: 20px" src="{{asset('assets/image/loggedinAsAdmin.png')}}"></a></h5>
        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_bottom">

        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 main_page">
            <div class="row main_page_row">
                <a href="{{url('admin/user-creation')}}">
                    <div class="col-md-3 col-sm-3 col-3">
                        <div class="shadow p-4 mb-2 main_page_button">
                            <div class="image_section text-center">
                                <img src="{{asset('assets')}}/image/user_creation.png" class="img-fluid">
                            </div>

                        </div>
                        <div class="button_text_section">
                        <a href="#"  class="text-decoration-none"> <p class="text-center text-uppercase button_text">USER CREATION</p></a>
                        </div>

                    </div>
                </a>

                <a href="{{url('admin/new-order')}}">
                    <div class="col-md-3 col-sm-3 col-3">

                        <div class="shadow p-4 mb-2 main_page_button text-center">
                            <div class="image_section text-center">
                                <img src="{{asset('assets/image/new_order.png')}}" class="img-fluid">
                            </div>

                        </div>
                        <div class="button_text_section">
                        <a href="#"  class="text-decoration-none"> <p class="text-center text-uppercase button_text">NEW ORDER</p></a>
                        </div>

                    </div>
                </a>

                <a href="{{url('admin/report')}}">
                    <div class="col-md-3 col-sm-3 col-3">

                        <div class="shadow p-4 mb-2 main_page_button">
                            <div class="image_section text-center">
                                <img src="{{asset('assets/image/report.png')}}" class="img-fluid" width="100%" height="100%">
                            </div>

                        </div>
                        <div class="button_text_section">
                            <a href="#"  class="text-decoration-none"><p class="text-center text-uppercase button_text">Report</p></a>
                        </div>

                    </div>
                </a>

                <a href="{{url('admin/order-generate')}}">
                    <div class="col-md-3 col-sm-3 col-3">

                        <div class="shadow p-4 mb-2 main_page_button">
                            <div class="image_section text-center">
                                <img src="{{asset('assets/image/report.png')}}" class="img-fluid" width="100%" height="100%">
                            </div>

                        </div>
                        <div class="button_text_section">
                            <a href="#"  class="text-decoration-none"><p class="text-center text-uppercase button_text">Order Generate</p></a>
                        </div>

                    </div>
                </a>

            </div>



        </div>

    </div>
</div>
@endsection
