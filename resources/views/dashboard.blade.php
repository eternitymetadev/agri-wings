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
.orderButton{
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
        We are a team of experienced professionals who provide efficient and reliable
        drone spraying services for various industries.<br />
        Using advanced drone technology, we provide precision spraying solutions for agriculture, forestry, landscaping,
        and other industries. Our team of trained pilots and technicians use state-of-the-art equipment to ensure the
        highest level of accuracy and safety for our clients.<br />
        Our drone spraying services offer a range of benefits, including increased efficiency, reduced costs, and
        minimal environmental impact. We take pride in providing innovative and sustainable solutions for our clients,
        while maintaining the highest standards of safety and quality. We have the expertise and technology to deliver
        superior results. Explore our website to learn more about our services and how we can help your business thrive.
    </p>
    <a href="{{$prefixurl.'service-booking'}}" class="btn btn-primary orderButton">Book Order</a>
   <?php }  ?>
</div>

@endsection