@extends('layouts.main')
@section('page-heading')My Dashboard @endsection
@section('content')
<style>
.widget-four .widget-content .w-summary-info .summary-count {
    display: block;
    /* font-size: 16px; */
    margin-top: 4px;
    font-weight: 600;
    color: #515365;
    background: #03a9f4 ! important;

}

.widget-four .widget-content .w-summary-info h6 {
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 0;
    color: #fbfbfc;
}

.widget-four .widget-content .summary-list:nth-child(1) .w-icon svg {
    color: #ffffff;
    /* fill: rgb(255 255 255 / 16%); */
}

.widget-four .widget-content .w-icon {
    border-radius: 12px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 38px;
    width: 50px;
    margin-right: 12px;
}

h4 {
    font-size: clamp(1.4rem, 10vw, 2rem);
    font-weight: 600;
    margin-bottom: 2rem;
    text-align: left;
}

.dashboardText {
    font-size: 17px;
    line-height: 28px;
    color: #2d2d2d;
    max-width: 900px;
    font-weight: 600;
    text-align: left;
    max-width: 500px;
}

.orderButton {
    padding: 10px 1rem;
    width: 200px;
    border-radius: 12px;
    font-size: 18px;
    margin: 2rem auto;
}

.mainDiv {
    padding-top: 2rem;
    gap: 2.5rem;
}

.myWidget {
    padding: 1rem;
    border-radius: 12px;
    box-shadow: 0 6px 20px #838383d1;
}

.ctaBox {
    display: flex;
    gap: 1rem;
    position: relative;
    flex: 1;
    padding-bottom: 6rem;
    justify-content: space-around
}

.ctaBox .dashboardIllustration {
    max-width: 400px;
}

.ctaBox .orderButton {
    position: absolute;
    bottom: -46px;
    right: -8px;
    border-radius: 16px 0;
    height: 65px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    background: linear-gradient(45deg, #28a745, #06601a);
    border-color: #28a745 !important;
}

.chartBox: {
    flex: 1;
}

@media(max-width: 600px) {
    .chartBox: {
        flex: 1;
    }
}
</style>


<div class="layout-px-spacing text-center" style="min-height: calc(100vh - 140px);">
    <div class="page-header layout-spacing">

    </div>

    <?php $authuser = Auth::user();
    $currentURL = url()->current();
    $url = URL::to('/');
    $string = request()->route()->getPrefix();
    $getprefix = str_replace('/', '', $string);
    $segment = Request::segment(2);
    $prefixurl = $url . '/' . $getprefix . '/';
    if($authuser->role_id == 7){ ?>

    <div class="row layout-top-spacing mainDiv">

        <div class="myWidget ctaBox flex-wrap">
            <div class="d-flex flex-column" style="justify-content: center">
                <h4>Welcome to AgriWings!</h4>
                <p class="dashboardText">
                    We're passionate about what we do, and we believe that our services can help revolutionize the
                    way you do business. Book our cutting-edge drone technology to tackle crop management needs.
                </p>
            </div>
            <img src="{{asset('assets/dashboardIllustration.svg')}}" class="img-responsive dashboardIllustration"
                alt="" />
            <a href="{{$prefixurl.'service-booking'}}" class="btn btn-primary orderButton">Book Order</a>
        </div>

        <div class="myWidget chartBox">
            <div class="widget-heading">
                <h5 class="">Orders Analytics</h5>
            </div>
            <div class="widget-content">
                <div id="chart-2" class=""></div>
            </div>
        </div>


    </div>

    <?php }  ?>
</div>

@endsection