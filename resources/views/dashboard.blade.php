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
    text-align: center;
    font-size: clamp(1.4rem, 10vw, 2rem);
    font-weight: 600;
    margin-block: 2rem;
}

.dashboardText {
    font-size: 17px;
    line-height: 28px;
    color: #2d2d2d;
    max-width: 900px;
    font-weight: 600;
    margin: auto;
    text-align: center;
}

.orderButton {
    padding: 10px 1rem;
    width: 200px;
    border-radius: 12px;
    font-size: 18px;
    margin: 2rem auto;
}
</style>

<div class="layout-px-spacing text-center">
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
    <h4>Welcome to our AgriWings service!</h4>
    <p class="dashboardText">
        We're thrilled to have you here. As a Booking Partner, we understand that you value efficient and effective
        solutions to keep your business running smoothly. That's why we offer cutting-edge drone technology to help you
        tackle your farmers crop management needs. </br>
        We're passionate about what we do, and we believe that our services can help revolutionize the way you do
        business. If you have any questions or would like to learn more about our services, please don't hesitate to
        reach out to us<Helpline No>. We're here to help you achieve your goals and grow your business.
            Thank you for choosing AgriWings, and we look forward to working with you!
    </p>
    <a href="{{$prefixurl.'service-booking'}}" class="btn btn-primary orderButton">Book Order</a>
    <?php }  ?>
</div>

@endsection