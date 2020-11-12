@extends('app')

@section('body')
<div class="container container-sm">
    <div class="row">

        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_top_new_order d-flex align-items-center justify-content-end">
            {{-- <h5 class="m-0 text-light"><a href="javascript:history.back()" style="text-decoration: none;" class="text-light mr-2"><</a> <a href="{{route('admin')}}" style="text-decoration: none;" class="text-light mr-2">Home</a></h5> --}}
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
                <div class="col-md-3 col-sm-3 col-3">
                    <div class="shadow p-4 mb-2 main_page_button">
                        <div class="image_section text-center">
                            <img src="image/new_order.png" class="img-fluid">
                        </div>

                    </div>
                    <div class="button_text_section">
                       <a href="#"  class="text-decoration-none"> <p class="text-center text-uppercase button_text">New Order</p></a>
                    </div>

                </div>

                <div class="col-md-3 col-sm-3 col-3">

                    <div class="shadow p-4 mb-2 main_page_button text-center">
                        <div class="image_section text-center">
                            <img src="image/pending_order.png" class="img-fluid">
                        </div>

                    </div>
                    <div class="button_text_section">
                       <a href="#"  class="text-decoration-none"> <p class="text-center text-uppercase button_text">Pending Order</p></a>
                    </div>

                </div>

                <div class="col-md-3 col-sm-3 col-3">

                    <div class="shadow p-4 mb-2 main_page_button">
                        <div class="image_section text-center">
                            <img src="image/report.png" class="img-fluid" width="100%" height="100%">
                        </div>

                    </div>
                    <div class="button_text_section">
                        <a href="#"  class="text-decoration-none"><p class="text-center text-uppercase button_text">Report</p></a>
                    </div>

                </div>

            </div>



        </div>

    </div>
</div>
@endsection
