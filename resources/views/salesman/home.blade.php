@extends('app')
@section('css')
<style>
.main_page{
    height: 323px;
}

</style>
@endsection
@section('body')
<div class="container container-sm">
    <div class="row">

        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_top">

        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 header_bottom">

        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-1 main_page">
            <div class="row main_page_row">
                <a href="{{url('salesman/new-order')}}">
                    <div class="col-md-3 col-sm-3 col-3">
                        <div class="shadow p-4 mb-2 main_page_button">
                            <div class="image_section text-center">
                                <img src="{{asset('assets/image/new_order.png')}}" class="img-fluid">
                            </div>

                        </div>
                        <div class="button_text_section">
                           <a href="#"  class="text-decoration-none"> <p class="text-center text-uppercase button_text">New Order</p></a>
                        </div>

                    </div>
                </a>

                <a href="#">
                    <div class="col-md-3 col-sm-3 col-3">

                        <div class="shadow p-4 mb-2 main_page_button text-center">
                            <div class="image_section text-center">
                                <img src="{{asset('assets/image/pending_order.png')}}" class="img-fluid">
                            </div>

                        </div>
                        <div class="button_text_section">
                           <a href="#"  class="text-decoration-none"> <p class="text-center text-uppercase button_text">Pending Order</p></a>
                        </div>

                    </div>
                </a>

                <a href="#">
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

            </div>



        </div>

    </div>
</div>

@endsection
