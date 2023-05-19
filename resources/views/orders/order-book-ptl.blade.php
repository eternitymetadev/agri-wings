@extends('layouts.main')
@section('page-heading')Order Book @endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

<style>
@media only screen and (max-width: 600px) {
    .checkbox-round {
        margin-left: 1px;
    }

}

h4 {
    font-size: 18px;

}


.checkbox-round {
    width: 2.3em;
    height: 2.3em;
    border-radius: 55%;
    border: 1px solid #ddd;
    margin-left: 103px;
}

p {
    font-size: 11px;
    font-weight: 500;
}


th,
td {
    text-align: left;
    padding: 8px;
    color: black;
}

.cont {
    background: white;
    height: 240px;
    border-style: ridge;
    width: 390px;
    border-radius: 17px;
}

.mini_container {
    margin-top: 8px;
}

.wizard {
    background: #fff;
}

.wizard .nav-tabs {
    position: relative;
    margin: 40px auto;
    margin-bottom: 0;
}

.wizard>div.wizard-inner {
    position: relative;
}

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;

    top: 42%;

}

.nav-tabs {
    border-bottom: none;
}

.wizard .nav-tabs>li.active>a,
.wizard .nav-tabs>li.active>a:hover,
.wizard .nav-tabs>li.active>a:focus {
    color: #555555;
    cursor: default;
    border: none;
}

span.round-tab {
    width: 50px;
    height: 50px;
    line-height: 51px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}

span.round-tab i {
    color: #555555;
}

.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;

}

.wizard li.active span.round-tab i {
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs>li {
    width: 25%;
}

.wizard .nav-tabs>li a {
    width: 48px;
    height: 70px;
    border-radius: 100%;
    padding: 0;
}

@media (max-width: 585px) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs>li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}

/* / ////////////////////////////////////////////////////////////////////end wizard / */
.select2-results__options {
    list-style: none;
    margin: 0;
    padding: 0;
    height: 160px;
    /* scroll-margin: 38px; */
    overflow: auto;
}

/*.form-group {*/
/*    margin-bottom: 0;*/
/*}*/

.form-row>.col,
.form-row>[class*=col-] {
    padding-inline: 10px !important;
}

span.select2.select2-container.mb-4 {
    margin-bottom: 0 !important;
}

.form-row {
    padding: 1rem;
    border-radius: 12px;
    /* box-shadow: 0 0 3px #83838360; */
    margin-bottom: 1rem;
}

.form-row h6 {
    margin-bottom: 1rem;
    font-weight: 700;
}

.mainTr {
    outline: 1px solid #838383;
    background: #f4f4f4;
    border-radius: 12px;
    width: 100%;
}

.childTable {
    background: #F9B60030;
    border-radius: 12px;
}

.addRowButton {
    text-align: right;
    width: 100%;
    font-weight: 800;
    color: #f9b600;
    margin-right: 10px;
    cursor: pointer;
}

.addItem {
    float: right;
    font-weight: 800;
    color: #f9b600;
    margin-right: 10px;
    cursor: pointer;
}

.items_table_body tr {
    position: relative;
}


.main_table_body td {
    min-width: 150px;
}

.main_table_body td:has(div.removeIcon) {
    min-width: 50px;
    width: 50px;
}

.main_table_body td div.removeIcon:has(span) {
    cursor: pointer;
    height: 20px;
    width: 20px;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50vh;
    color: darkred;
    font-weight: 800;
    border: 1px solid darkred;
    transition: all 200ms ease-in-out;
}

.main_table_body td div.removeIcon:has(span):hover {
    background: darkred;
    color: white;
}

.appendedAddress:has(br) {
    padding: 1rem;
    border-radius: 12px;
    margin-top: 1rem;
    background: #f9b60024;
    color: #000;
}

#cropSection {
    background: url('{{asset('assets/order-book.png')}}');
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 340px;
}

.cropSelection {
    min-height: 340px;
    display: none;
}

.cropSelection .form-group {
    position: relative;
    max-width: 82px;
    width: 100%;
}

.cropSelection .form-group.farm {
    max-width: 180px;
}


.cropSelection input[type="radio"]:checked+label {
    display: flex;
    flex-direction: column-reverse;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    outline: 4px solid #28a745db;
    outline-offset: 2px;
    border: 1px solid var(--secondaryColor);
    padding: 1rem 0.5rem 0.3rem;
    font-size: 14px;
    color: var(--secondaryColor) !important;
}

.cropSelection input[type="radio"]+label {
    display: flex;
    flex-direction: column-reverse;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    outline: 4px solid #28a74515;
    outline-offset: 2px;
    border: 1px solid #28a74500;
    padding: 1rem 0.5rem 0.3rem;
    font-size: 14px;
    color: #838383;
    transition: all 350ms ease-in-out;
}

.cropSelection label img {
    width: 100%;
    max-width: 120px;
}

.cropSelection input[type="radio"] {
    position: absolute;
    top: 2px;
    right: 2px;
    height: 20px;
    width: 20px;
    accent-color: var(--secondaryColor);
}


.cropSelection .farm input[type="radio"] {
    top: 6px;
    left: 10px;
    height: 24px;
    width: 24px;
}

.cropSelection .farm input[type="radio"]+label {
    padding: 8px;
}



#cropSection.enabled {
    background: none;
}

#cropSection.enabled .cropSelection {
    min-height: 340px;
    display: flex;
}




/* for toggler */
.Switcher {
    position: relative;
    display: flex;
    border-radius: 5em;
    overflow: hidden;
    cursor: pointer;
    -webkit-animation: r-n 0.5s;
    animation: r-n 0.5s;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    font-size: 3vmin;
    will-change: transform;
    /* max-width: 320px; */
    outline: 2px solid var(--secondaryColor);
    outline-offset: 2px;
}

.Switcher::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 50%;
    border-radius: inherit;
    background-color: var(--secondaryColor);
    transform: translateX(0);
    transition: transform 0.5s ease-in-out;
}

.Switcher__checkbox:checked+.Switcher::before {
    transform: translateX(100%);
}

.Switcher__trigger {
    position: relative;
    z-index: 1;
    font-size: 16px;
    padding: 8px;
    text-align: center;
    width: 50%;
    color: var(--secondaryColor);
}

.Switcher__trigger::after {
    content: attr(data-value);
}

.Switcher__trigger::before {
    --i: var(--x);
    content: attr(data-value);
    position: absolute;
    color: var(--primaryContrast);
    transition: opacity 0.3s;
    opacity: calc((var(--i) + 1) / 2);
    transition-delay: calc(.3s * (var(--i) - 1) / -2);
}

.Switcher__checkbox:checked+.Switcher .Switcher__trigger::before {
    --i: calc(var(--x) * -1);
}

.Switcher__trigger:nth-of-type(1)::before {
    --x: 1;
}

.Switcher__trigger:nth-of-type(2)::before {
    --x: -1;
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
}

.box {
    overflow: hidden;
    perspective: 750px;
}

.intro {
    width: 90%;
    max-width: 50rem;
    padding-top: 0.5em;
    padding-bottom: 1rem;
    margin: 0 auto 1em;
    font-size: calc(1rem + 2vmin);
    text-transform: capitalize;
    text-align: center;
    font-family: serif;
}

.intro small {
    display: block;
    text-align: right;
    opacity: 0.5;
    font-style: italic;
    text-transform: none;
    border-top: 1px dashed rgba(255, 255, 255, 0.75);
}

.info {
    margin: 0;
    padding: 1em;
    font-size: 0.9em;
    font-style: italic;
    font-family: serif;
    text-align: right;
    opacity: 0.75;
}

.info a {
    color: inherit;
}



/* for new form */
.createButton {
    display: flex;
    align-items: flex-end;
    padding-bottom: 8px;
}

/* for number counters */
.counter {
    display: flex;
    align-items: stretch;
    justify-content: space-evenly;
    gap: 4px;
    border: 1px solid var(--secondaryColor);
    border-radius: 9px;
    background: #6b6b6b33;
    min-height: 45.39px;
}

.value-button {
    display: inline-block;
    margin: 0px;
    text-align: center;
    user-select: none;
    color: var(--secondaryColor);
    font-size: 36px;
    line-height: 41px;
    border-radius: 8px 0 0 8px;
    background: none;
    border: none;
    cursor: pointer;
}


#input-wrap {
    margin: 0px;
    padding: 0px;
}

.counter input[type=number] {
    text-align: center;
    border: none;
    margin: 0px;
    max-width: 60px;
    border-radius: 5px;
    font-size: 22px;
    font-weight: 600;
    color: var(--secondaryColor);
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}



#sprayTable {
    width: 100%;
    border-radius: 10px;
    overflow: hidden;
    z-index: -1;
}

.form-row:has(#sprayTable):hover #sprayTable {
    z-index: 0 !important;

}

#sprayTable thead {
    background: #28a74552;
}




.farmerInfo {
    background: #28a74526;
    padding: 1rem;
    border-radius: 0 20px;
    flex-wrap: wrap;
    flex: 1;
    display: none;
}

.farmerInfo img {
    /* background: #28a74563; */
    border-radius: inherit;
    /* padding: 2px; */
    width: 100px;
    height: 100px;
    object-fit: contain;
}

.farmerDes {
    padding: 8px 16px;
}

.farmerDes p {
    font-size: 14px;
    margin: 0;
    line-height: 24px;
    color: var(--secondaryColor);
}

.farmerDes p.title {
    font-size: 18px;
    font-weight: 600
}

.farmerDes p:has(svg) {
    font-size: 14px;
}

.farmerDes p svg {
    height: 1rem;
    width: 1rem;
    margin-right: 4px;
}

.cButton {
    height: 2.5rem;
    width: 2.5rem;
    min-width: 2.5rem;
    border-radius: 50vh;
}


.farmerInfo {
    opacity: 0.05;
    user-select: none;
    transition: all 300ms ease-in-out;
}

.form-group {
    height: 87px;
    margin-bottom: 0;
}

.lastCol {
    position: relative;
}

.dltItemRow {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: red;
    height: 2rem;
    width: 2rem;
    background: #fae3e5;
    padding: 7px;
    border-radius: 50vh;
    box-shadow: 0 0 2px inset;
    /* opacity: 0; */
    /* pointer-events: none; */
    cursor: pointer;
    transition: all 300ms ease-in-out;
}

tr:hover .dltItemRow {
    opacity: 1;
    pointer-events: all;
}

.ui-widget-content {
    border: none !important;
    background: #c7f8d3 !important;
    color: #333;
    border-radius: 12px !important;
    padding: 6px !important;
    list-style: none;
}

.ui-menu .ui-menu-item:hover {
    background: var(--secondaryColor) !important;
    border-radius: 8px !important;
    border: none !important;
}

.ui-menu .ui-menu-item-wrapper:hover {
    background: var(--secondaryColor) !important;
    border-radius: 8px !important;
    border: none !important;
    padding: 6px !important;
}

.activeFormRow {
    box-shadow: 0 6px 20px #838383d1;
}

#billToInfo{
    margin-bottom: 8rem;
}

@media(max-width: 600px) {
    .innerBoxes {
        min-width: 100%;
    }
    #billToInfo{
    margin-bottom: 2rem;
}
}
</style>


<div class="layout-px-spacing mt-5 animate__animated animate__fadeIn">
    <form class="general_form" method="POST" action="{{url($prefix.'/store-Ptl-order')}}" id="createconsignment"
        style="margin: auto auto 170px;">

        <div class="row flex-wrap mx-0" style="gap: 2rem">

            <div class="innerBoxes"
                style="flex:1; align-content: flex-start; justify-content: center; min-width: 300px;">
                <div class="form-row justify-content-center activeFormRow"
                    style="min-height: 340px; align-content: flex-start">
                    <h6 class="col-12">Farmer Details </h6>
                    <div class="row align-items-center justify-content-center" style="width: 100%">
                        <!-- choose farmer type -->
                        <div class="box py-2 col-md-12">
                            <input class="Switcher__checkbox sr-only" id="io" type="checkbox"
                                onchange="onFarmerTypeChange()" />
                            <label class="Switcher" for="io">
                                <div class="Switcher__trigger" data-value="New"></div>
                                <div class="Switcher__trigger" data-value="Existing"></div>
                            </label>
                        </div>

                        <!-- for existing farmer -->
                        <div id="selectFarmerId" class="row" style="width: 100%; display: none">
                            <div class="col-md-12">
                                <div class="form-group" style="max-width: 320px">
                                    <label for="exampleFormControlSelect1">
                                        Select Farmer<span class="text-danger">*</span>
                                    </label>
                                    <input id="farmer_id" class="form-control" type="text" placeholder="Search.." />
                                </div>
                            </div>
                        </div>


                        <Input type="hidden" id="farmer_common_id" name="farmer_common_id">
                        <div id="createFarmerBox" class="row align-items-center px-2" style="width: 100%">
                            <div class="form-group col-md-3 px-1">
                                <label>Farmer Mobile<span class="text-danger">*</span></label>
                                <Input type="number" class="form-control newFarmerInput" id="farmer_phone"
                                    maxlength="10" name="phone">
                                <span id="phone_error" style="color:red;"></span>
                            </div>
                            <div class="form-group col-md-5 px-1">
                                <label>Farmer Name <span class="text-danger">*</span></label>
                                <Input type="text" class="form-control newFarmerInput" id="farmer_name"
                                    name="farmer_name">
                                <span id="farmer_req" style="color:red"></span>
                            </div>

                            <div class="form-group col-md-3 px-1">
                                <label>Farm Locations<span class="text-danger">*</span></label>
                                <div class="counter">
                                    <div class="value-button" id="decrease" onclick="decreaseValue()"
                                        value="Decrease Value">-</div>
                                    <input type="number" id="number" value="1" min='1' />
                                    <div class="value-button" id="increase" onclick="increaseValue()"
                                        value="Increase Value">+</div>
                                </div>
                            </div>

                            <!-- <div class="form-group col-md-12 createButton"> -->
                            <button type="button" id="createFarmerButton" class="btn btn-primary cButton" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-check">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </button>
                            <!-- </div> -->
                        </div>

                        <div id='farmerInfo' class="farmerInfo animate__animated animate__fadeIn">
                            <img src="{{asset('assets/farmer-icon.png')}}" />
                            <div id="farmerDes" class="farmerDes">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-row animate__animated animate__fadeInUp" id="billToInfo" style="display: none">
                    <h6 class="col-12">Bill To Information</h6>

                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">
                            Client<span class="text-danger">*</span>
                        </label>
                        <select class="form-control my-select2" name="" id="select_reg">
                            <option value="">--select--</option>
                            @foreach($regionalclient as $regional)
                            <option value="{{$regional->id}}">{{$regional->name}}</option>
                            @endforeach
                        </select>
                        <Input type="hidden" class="form-control" id="regional_id" name="regclient_id" value="">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">
                            Bill To<span class="text-danger">*</span>
                        </label>
                        <select class="form-control my-select2" name="bill_to" id="bill_to">

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">
                            Payment Term<span class="text-danger">*</span>
                        </label>
                        <select class="form-control my-select2" name="payment_type" id="paymentType_"
                            onchange="togglePaymentAction()">

                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column innerBoxes" style="flex:1;">
                <div id="cropSection" style="column-gap: 1.2rem; align-content: flex-start">
                    <div id="cropSelection" class="form-row cropSelection animate__animated animate__fadeIn"
                        style="column-gap: 1.2rem; align-content: flex-start">
                        <h6 class="col-12">Spray Details</h6>

                        <p class="col-12" style="font-weight: 700; font-size: 14px; color: #838383;">Choose Crop</p>

                        @foreach($Crops as $crop)
                        <div class="form-group">
                            <Input type="radio" class="form-control price_click" id="{{$crop->crop_name}}" name="crop"
                                value="{{$crop->id}}" data-crop-price="{{$crop->crop_price}}"
                                data-crop-name="{{$crop->crop_name}}" checked />
                            <label for="{{$crop->crop_name}}">{{$crop->crop_name}}
                                <img src="{{$crop->crop_image}}" alt="crop" />
                            </label>
                        </div>
                        @endforeach

                        <div class="d-flex flex-wrap col-12 mt-5 align-items-center">
                            <div class="form-group col-md-6" style="max-width: 320px">
                                <label for="exampleFormControlSelect1">
                                    Farm Location<span class="text-danger">*</span>
                                </label>
                                <select class="form-control my-select2" name="" onchange="displayCropsSection()"
                                    id="farmLocation">
                                    <option value="" readonly>-select location-</option>
                                </select>
                                <label id="farmLocationError" style="display:none" class="error"
                                    for="farmLocation">Please
                                    Select Farm</label>
                            </div>


                            <div class="form-group" style="flex: 1; max-width: 150px">
                                <label>Acreage<span class="text-danger">*</span></label>
                                <div class="counter">
                                    <div class="value-button" id="decrease" onclick="decreaseDecimalValue()"
                                        value="Decrease Value">-
                                    </div>
                                    <input type="number" id="acreage" name="acreage" value="1" min='1' />
                                    <div class="value-button" id="increase" onclick="increaseDecimalValue()"
                                        value="Increase Value">+
                                    </div>
                                </div>
                            </div>


                            <div style="flex: 1; display: flex; justify-content: center;">
                                <button type="button" class="btn btn-primary" onclick="onAddCrop()" id="addCropButton"
                                    style="width: 120px; height: 43px; margin-inline: auto; border-radius: 18px">Add</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-row" style="box-shadow: none">
                    <table id="sprayTable" class="animate__animated animate__fadeIn" style="display: none">
                        <thead>
                            <tr>
                                <th>Crop Name</th>
                                <th>Farm Location</th>
                                <th>Acreage</th>
                                <th>Estd. Cost</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>
            </div>

            <input type="hidden" class="form-seteing date-picker" id="consignDate" name="consignment_date"
                placeholder="" value="<?php echo date('d-m-Y'); ?>" />

        </div>

        {{--vehicle info--}}
        <!-- <div class="form-check form-check-inline justify-content-end col-12">
            <input class="form-check-input" type="checkbox" name="noc" id="inlineCheckbox1" value="1">
            <label class="form-check-label" for="inlineCheckbox1">if any damage to crop on behalf of the
                farmer</label>
        </div> -->

        <div class="actionButtonRow animate__animated animate__fadeInUp">
            <a class="mt-2 myBtn" href="{{url($prefix.'/order-book-ptl') }}" style="font-weight: 500"> Reset</a>
            <button type="submit" id="submitButton" class="submitBtn mt-2 btn btn-primary disableme myBtn"
                disabled>Submit</button>
        </div>

    </form>
</div>
<!-- widget-content-area -->

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" />

<script>
const isMobileScreen = window.matchMedia("(max-width: 600px)");

$('.form-row input').on("focus", function() {
    $('.form-row').removeClass('activeFormRow');
    $(this).closest('.form-row').addClass('activeFormRow');
});

$('.form-row').on("mousedown", function() {
    $('.form-row').removeClass('activeFormRow');
    $(this).addClass('activeFormRow');
});

$('.newFarmerInput').keyup(function() {
    if ($('#farmer_name').val() && $('#farmer_phone').val().length == 10) $('#createFarmerButton').attr(
        'disabled', false);
    else $('#createFarmerButton').attr('disabled', true);
});


function displayBillToInfoSection() {
    $('.form-row').removeClass('activeFormRow');
    $('#billToInfo').addClass('activeFormRow');
    $('#bill_term').click();

    $('#billToInfo').show();
    $("#billToInfo")[0].scrollIntoView({
        behavior: "smooth",
        block: "end"
    });
    $('#farmerInfo').css('display', 'flex');
}


let farmerList = [];

$(document).ready(function() {
    // $('#themeLoader').css('display', 'flex');

    var branch_id = 'list';

    $.ajax({
        url: "get-farmer-list",
        type: "get",
        cache: false,
        data: {
            branch_id: branch_id
        },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr("content"),
        },
        beforeSend: function() {
            $("#select_regclient").empty();
        },
        success: function(res) {
            // $('#themeLoader').css('display', 'none');
            farmerList = res.farmer_list
        },
    });
});


function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 1 : value;
    value++;
    document.getElementById('number').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 1 : value;
    value < 2 ? value = 2 : '';
    value--;
    document.getElementById('number').value = value;
}

function increaseDecimalValue() {
    var value = parseInt(document.getElementById('acreage').value, 10);
    value = isNaN(value) ? 1 : value;
    value++;
    document.getElementById('acreage').value = value;
}

function decreaseDecimalValue() {
    var value = parseInt(document.getElementById('acreage').value, 10);
    value = isNaN(value) ? 1 : value;
    value < 2 ? value = 2 : '';
    value--;
    document.getElementById('acreage').value = value;
}


const onFarmerTypeChange = () => {
    if ($('#io').is(':checked')) {
        $('#selectFarmerId').show();
        $('#createFarmerBox').hide();
        $('#farmer_id').val('');
        $('#farmer_id').removeAttr('data-val');
        $("#farmLocation").empty();
        $('#farmerInfo').css('display', 'none');
        $('#billToInfo').hide();

    } else {
        $('#createFarmerBox').show();
        $('#selectFarmerId').hide();
        $('#farmer_id').val('');
        $('#farmer_id').removeAttr('data-val');
        $("#farmLocation").empty();
        $('#farmerInfo').css('display', 'none');
        $('#billToInfo').hide();
    }
}



let cropList = [];

let cropIndex = 1;

const onAddCrop = () => {
    let listItem = ``;
    let cropName = $('input[name="crop"]:checked').val();
    let cropNameText = $('input[name="crop"]:checked').attr('data-crop-name');
    let farmLocation = $('#farmLocation').find(":selected").val();
    let farmLocationText = $('#farmLocation').find(":selected").text();
    let acreage = $('#acreage').val();
    let cropPrice = $('input[name="crop"]:checked').attr('data-crop-price');
    let totalPrice = cropPrice * acreage;

    if (farmLocation != '') {
        $('#sprayTable').show();
        listItem += `<tr>
                <td>${cropNameText}<input type="hidden" value="` + cropName + `" name="data[` + cropIndex + `][crop_name]"/></td>
                <td>${farmLocationText}<input type="hidden" value="` + farmLocation + `" name="data[` + cropIndex + `][farm_location]"/></td>
                <td>${acreage}<input type="hidden" value="` + acreage + `" name="data[` + cropIndex + `][acerage]"/></td>
                <td class="lastCol">
                    ${totalPrice}<input type="hidden" value="` + totalPrice + `" name="data[` + cropIndex + `][crop_price]"/>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash dltItemRow"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                </td>

            </tr>`;
        $('#sprayTable').append(listItem);

        $('#farmLocation').val('').change();
        $('#acreage').val('1');
        $('#farmLocationError').hide();
        cropIndex++;
        $('#addCropButton').attr('disabled', true);
        if ($('#sprayTable tr').length < 2) $('#submitButton').attr('disabled', true);
        else $('#submitButton').attr('disabled', false);
    } else $('#farmLocationError').show();
}

$("#sprayTable").on('click', '.dltItemRow', function() {
    $(this).closest('tr').remove();
    $('#addCropButton').removeAttr('disabled');

    if ($('#sprayTable tr').length < 2) {
        $('#sprayTable').hide();
        $('#submitButton').attr('disabled', true);
    }
})



function displayCropsSection() {
    $('#cropSection').addClass('enabled');
    $('.form-row').removeClass('activeFormRow');
    $('#cropSelection').addClass('activeFormRow');
};


$(document).ready(function() {

    jQuery(function() {
        $('.my-select2').each(function() {
            $(this).select2({
                theme: "bootstrap-5",
                dropdownParent: $(this).parent(), // fix select2 search input focus bug
            })
        })

        // fix select2 bootstrap modal scroll bug
        $(document).on('select2:close', '.my-select2', function(e) {
            var evt = "scroll.select2"
            $(e.target).parents().off(evt)
            $(window).off(evt)
        })
    })

});

function toggleVehicleInfBlock() {
    if ($('#ftlChecked').is(':checked'))
        $('#vehicleInformationBlock').show();
    else
        $('#vehicleInformationBlock').hide();

}

jQuery(function() {
    $('.my-select2').each(function() {
        $(this).select2({
            theme: "bootstrap-5",
            dropdownParent: $(this).parent(), // fix select2 search input focus bug
        })
    })

    // fix select2 bootstrap modal scroll bug
    $(document).on('select2:close', '.my-select2', function(e) {
        var evt = "scroll.select2"
        $(e.target).parents().off(evt)
        $(window).off(evt)
    })
})

// add consignment date
$('#consignDate, #date').val(new Date().toJSON().slice(0, 10));

function showResult(str) {
    if (str.length == 0) {
        $(".search-suggestions").empty();
        $(".search-suggestions").css('border', '0px');
    } else if (str.length > 0) {
        $(".search-suggestions").css('border', 'solid 1px #f6f6f6');
        var options = '';
        options = "<option value='Seeds'>";
        options += "<option value='Chemicals'>";
        options += "<option value='PGR'>";
        options += "<option value='Fertilizer'>";
        options += "<option value='Pesticides'>";
        $('#json-datalist').html(options);
    }
}

$('#chek').click(function() {
    $('#veh').toggle();
});

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(51.508742, -0.120850),
        zoom: 5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

// invoice no duplicate validate
$('.invc_no').blur(function() {
    var invc_no = $(this).val();
    var row_id = jQuery(this).attr('id');
    $.ajax({
        url: "/invoice-check",
        method: "get",
        data: {
            invc_no: invc_no
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.success == true) {
                swal('error', response.errors, 'error');
                $("#" + row_id).val('');
            }
        }
    })
});

// select item onchange
function getItem(item) {
    var item_val = item.value;
    $.ajax({
        url: '/get-items',
        method: "get",
        data: {
            item_val: item_val
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        success: function(res) {
            console.log(res);
            if (res.success == true) {
                ($(item).closest('tr').find('td').eq(1).find('input').prop('disabled', false));
                ($(item).closest('tr').find('td').eq(1).find('input').val(''));

                ($(item).closest('tr').find('td').eq(2).find('input').val(res.item.net_weight));
                ($(item).closest('tr').find('td').eq(3).find('input').val(res.item.gross_weight));
                ($(item).closest('tr').find('td').eq(4).find('input').val(res.item.chargable_weight));
            }
        }
    });
}
////
$("#branch_id").change(function(e) {

    var branch_id = $(this).val();
    $("#select_regclient").empty();
    $.ajax({
        url: "/get-bill-client",
        type: "get",
        cache: false,
        data: {
            branch_id: branch_id
        },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr("content"),
        },
        beforeSend: function() {
            $("#select_regclient").empty();
        },
        success: function(res) {
            $("#select_regclient").append(
                '<option value="">select..</option>'
            );

            $.each(res.data, function(index, value) {
                $("#select_regclient").append(
                    '<option value="' +
                    value.id +
                    '">' +
                    value.name +
                    "</option>"
                );
            });
        },
    });
});

function togglePaymentAction() {
    if ($('#paymentType_').val() != null) {
        displayCropsSection();
        if (isMobileScreen.matches == false) {
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: "smooth",
            });
        } else {
            $("#cropSection")[0].scrollIntoView({
                behavior: "smooth",
                block: "end"
            });
        }
    } else {
        $('#cropSelection').removeClass('enabled');
    }
}

const appendFarmerDes = (des) => {
    let node = ``;
    node += `<p class="title">${des.nick_name}</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-phone">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg> +91-${des.phone}</p>
                                <p>Farm Locations - <span>${des.farm?.length}</span></p>`;

    $('#farmerDes').html(node);
    displayBillToInfoSection();
}

$('#createFarmerButton').click(function() {
    $('#phone_error').empty();
    $('#farmer_req').empty();
    var farmer_name = $('#farmer_name').val();
    var farmer_phone = $('#farmer_phone').val();
    var number = $('#number').val();
    $('#themeLoader').css('display', 'flex');

    if (!farmer_name) {
        $('#farmer_req').html('Please enter farmer name');
        return false;
    }
    if (!farmer_phone) {
        $('#phone_error').html('Please enter phone number');
        return false;
    }

    var data = {
        farmer_name: farmer_name,
        farmer_phone: farmer_phone,
        number: number

    };

    jQuery.ajax({
        url: "create-new-farmer",
        type: "get",
        cache: false,
        data: data,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr(
                "content"
            ),
        },
        processData: true,

        success: function(response) {
            $('#themeLoader').css('display', 'none');

            if (response.success == true) {
                $('#farmer_common_id').val(response.farmer_details.id)
                appendFarmerDes(response.farmer_details);
                $("#farmer_name").prop('disabled', true);
                $("#farmer_phone").prop('disabled', true);
                $("#createFarmerButton").prop('disabled', true);
                $("#io").prop('disabled', true);


                $.each(response.farmer_details.farm, function(index, value) {
                    $("#farmLocation").append(
                        '<option value="' +
                        value.id +
                        '">' +
                        value.field_area +
                        "</option>"
                    );
                });
                $('#sprayTable tbody').html('');
            } else {
                $('#phone_error').html(response.error_message);
            }

        },
    });

});



$('#farmer_id').autocomplete({
    minLength: 1,
    source: function(request, response) {
        response($.map(farmerList, function(obj, key) {
            var name = obj.nick_name.toUpperCase();
            var phone = obj.phone.toUpperCase();
            if (name.indexOf(request.term.toUpperCase()) != -1 || phone.indexOf(request.term
                    .toUpperCase()) != -1) {
                return {
                    label: obj.nick_name + " (" + obj.phone + ")", // Label for Display
                    value: obj.id // Value
                }
            } else {
                return null;
            }
        }));
    },
    focus: function(event, ui) {
        event.preventDefault();
    },
    // Once a value in the drop down list is selected, do the following:
    select: function(event, ui) {
        event.preventDefault();
        // place the person.given_name value into the textfield called 'select_origin'...
        $('#farmer_id').val(ui.item.label);
        $('#farmer_id').attr('data-val', ui.item.value);
        // ... any other tasks (like setting Hidden Fields) go here...
        $("#farmLocation").empty();
        $('#themeLoader').css('display', 'flex');

        jQuery.ajax({
            type: "get",
            url: 'get-farmer-details',
            data: {
                farmer_id: ui.item.value
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function(response) {
                $('#themeLoader').css('display', 'none');

                console.log(response.get_farmer_details);
                $('#farmer_common_id').val(response.get_farmer_details.id)
                appendFarmerDes(response.get_farmer_details)

                $("#farmLocation").append(
                    `<option value="">--select--
                        </option>`
                );
                $.each(response.get_farmer_details.farm, function(index, value) {
                    $("#farmLocation").append(
                        '<option value="' +
                        value.id +
                        '">' +
                        value.field_area +
                        "</option>"
                    );
                });

                $('#sprayTable tbody').html('');

            },
        });
        return false;
    }
});

$("#farmer_phone").blur(function() {
    var number = $(this).val();
    if (!number) {
        return false;
    }
    $.ajax({
        url: "check-farmer-phone",
        type: "get",
        cache: false,
        data: {
            number: number
        },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr(
                "content"
            ),
        },
        success: function(data) {
            if (data.success == true) {
                $("#phone_error").html(data.error_message);
            } else {
                $("#phone_error").html('');
            }

        },
    });
});

/////
$("#bill_term").change(function(e) {

    var bill_to = $(this).val();
    var regional_id = $('#regclient_id').val();
    $("#paymentType_").empty();
    $('#cropSelection').removeClass('enabled');
    $('#themeLoader').css('display', 'flex');
    $.ajax({
        url: "get-payment-term",
        type: "get",
        cache: false,
        data: {
            bill_to: bill_to,
            regional_id: regional_id
        },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr("content"),
        },
        beforeSend: function() {
            $("#paymentType_").empty();
        },
        success: function(res) {
            $("#paymentType_").append(
                '<option value="">select..</option>'
            );

            $.each(res.getterms, function(index, value) {
                $("#paymentType_").append(
                    '<option value="' +
                    value.payment_term +
                    '">' +
                    value.payment_term +
                    "</option>"
                );
            });
            $('#themeLoader').css('display', 'none');

        },
    });
});

$("#select_reg").change(function(e) {
    $("#bill_to").empty();
    var regclient_id = $(this).val();

    $.ajax({
        url: "/get-consigner-regional",
        type: "get",
        cache: false,
        data: {
            regclient_id: regclient_id
        },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr("content"),
        },
        beforeSend: function() {
            $("#bill_to").empty();
        },
        success: function(res) {
            var all_term = res.data_regclient.payment_term;

            $('#regional_id').val(regclient_id);
            var termarr = [];
            $.each(all_term, function(index, terms) {
                termarr.push(terms.bill_to);

            });
            var filteredArray = termarr.filter(function(item, pos) {
                return termarr.indexOf(item) == pos;
            });

            $("#bill_to").append(
                `<option selected disabled>select..
                    </option>`
            );
            $.each(filteredArray, function(index, term) {
                $("#bill_to").append(
                    '<option value="' +
                    term +
                    '">' +
                    term +
                    "</option>"
                );
            });

        },
    });
});

$("#bill_to").change(function(e) {

    var bill_to = $(this).val();
    var regional_id = $('#regional_id').val();

    $("#paymentType_").empty();
    $.ajax({
        url: "get-payment-term",
        type: "get",
        cache: false,
        data: {
            bill_to: bill_to,
            regional_id: regional_id
        },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr("content"),
        },
        beforeSend: function() {
            $("#paymentType_").empty();
        },
        success: function(res) {
            console.log(res.getterms);
            $("#paymentType_").append(
                '<option value="">select..</option>'
            );

            $.each(res.getterms, function(index, value) {
                $("#paymentType_").append(
                    '<option value="' +
                    value.payment_term +
                    '">' +
                    value.payment_term +
                    "</option>"
                );
            });
        },
    });
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ6x_bU2BIZPPsjS8Y8Zs-yM2g2Bs2mnM&callback=myMap">
</script>
@endsection