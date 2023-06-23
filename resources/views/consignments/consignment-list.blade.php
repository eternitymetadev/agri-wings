@extends('layouts.main')
@section('content')
<style>
.accordion {
    overflow-anchor: none;
    font-weight: bold;
}

.accepted {
    color: #ffffff !important;
    background: #007bff;
    padding: 3px 5px;
    border-radius: 5px;
}

.started {
    color: #ffffff !important;
    background: #e2a03f;
    padding: 3px 5px;
    border-radius: 5px;
}

.successful {
    color: #ffffff !important;
    background: #009688;
    padding: 3px 5px;
    border-radius: 5px;
}

.cbp_tmtimeline {
    margin: 0;
    padding: 0;
    list-style: none;
    position: relative
}

.cbp_tmtimeline:before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 3px;
    background: #eee;
    left: 20%;
    margin-left: -6px
}

.cbp_tmtimeline>li {
    position: relative
}

.cbp_tmtimeline>li:first-child .cbp_tmtime span.large {
    color: #444;
    font-size: 17px !important;
    font-weight: 700
}

.cbp_tmtimeline>li:first-child .cbp_tmicon {
    background: #fff;
    color: #666
}

.cbp_tmtimeline>li:nth-child(odd) .cbp_tmtime span:last-child {
    color: #444;
    font-size: 13px
}

.cbp_tmtimeline>li:nth-child(odd) .cbp_tmlabel {
    background: #f0f1f3
}

.cbp_tmtimeline>li:nth-child(odd) .cbp_tmlabel:after {
    border-right-color: #f0f1f3
}

.cbp_tmtimeline>li .empty span {
    color: #777
}

.cbp_tmtimeline>li .cbp_tmtime {
    display: block;
    width: 23%;
    padding-right: 70px;
    position: absolute
}

.cbp_tmtimeline>li .cbp_tmtime span {
    display: block;
    text-align: right
}

.cbp_tmtimeline>li .cbp_tmtime span:first-child {
    font-size: 15px;
    color: #3d4c5a;
    font-weight: 700
}

.cbp_tmtimeline>li .cbp_tmtime span:last-child {
    font-size: 14px;
    color: #444;
    margin-top: 10px;
}

.cbp_tmtimeline>li .cbp_tmlabel {
    margin: 0 0 15px 25%;
    background: #f0f1f3;
    padding: 1.2em;
    position: relative;
    border-radius: 5px
}

.cbp_tmtimeline>li .cbp_tmlabel:after {
    right: 100%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-right-color: #f0f1f3;
    border-width: 10px;
    top: 10px
}

.cbp_tmtimeline>li .cbp_tmlabel blockquote {
    font-size: 16px
}

.cbp_tmtimeline>li .cbp_tmlabel .map-checkin {
    border: 5px solid rgba(235, 235, 235, 0.2);
    -moz-box-shadow: 0px 0px 0px 1px #ebebeb;
    -webkit-box-shadow: 0px 0px 0px 1px #ebebeb;
    box-shadow: 0px 0px 0px 1px #ebebeb;
    background: #fff !important
}

.cbp_tmtimeline>li .cbp_tmlabel h2 {
    margin: 0px;
    padding: 0 0 10px 0;
    line-height: 26px;
    font-size: 16px;
    font-weight: normal
}

.cbp_tmtimeline>li .cbp_tmlabel h2 a {
    font-size: 15px
}

.cbp_tmtimeline>li .cbp_tmlabel h2 a:hover {
    text-decoration: none
}

.cbp_tmtimeline>li .cbp_tmlabel h2 span {
    font-size: 15px
}

.cbp_tmtimeline>li .cbp_tmlabel p {
    color: #444
}

.cbp_tmtimeline>li .cbp_tmicon {
    width: 15px;
    height: 15px;
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    font-size: 1.4em;
    line-height: 40px;
    -webkit-font-smoothing: antialiased;
    position: absolute;
    color: #fff;
    background: #1a545a;
    border-radius: 50%;
    box-shadow: 0 0 0 5px #f4f4f4;
    text-align: center;
    left: 21%;
    top: 12px;
    margin: 0 0 0 -21px;
}

@media screen and (max-width: 992px) and (min-width: 768px) {
    .cbp_tmtimeline>li .cbp_tmtime {
        padding-right: 60px
    }
}

@media screen and (max-width: 65.375em) {
    .cbp_tmtimeline>li .cbp_tmtime span:last-child {
        font-size: 12px
    }
}

@media screen and (max-width: 47.2em) {
    .cbp_tmtimeline:before {
        display: none
    }

    .cbp_tmtimeline>li .cbp_tmtime {
        width: 100%;
        position: relative;
        padding: 0 0 20px 0
    }

    .cbp_tmtimeline>li .cbp_tmtime span {
        text-align: left
    }

    .cbp_tmtimeline>li .cbp_tmlabel {
        margin: 0 0 30px 0;
        padding: 1em;
        font-weight: 400;
        font-size: 95%
    }

    .cbp_tmtimeline>li .cbp_tmlabel:after {
        right: auto;
        left: 20px;
        border-right-color: transparent;
        border-bottom-color: #f5f5f6;
        top: -20px
    }

    .cbp_tmtimeline>li .cbp_tmicon {
        position: relative;
        float: right;
        left: auto;
        margin: -64px 5px 0 0px
    }

    .cbp_tmtimeline>li:nth-child(odd) .cbp_tmlabel:after {
        border-right-color: transparent;
        border-bottom-color: #f5f5f6
    }
}

.bg-green {
    background-color: #50d38a !important;
    color: #fff;
}

.bg-blush {
    background-color: #ff758e !important;
    color: #fff;
}

.bg-orange {
    background-color: #ffc323 !important;
    color: #fff;
}

.bg-info {
    background-color: #2CA8FF !important;
}

.dt--top-section {
    margin: none;
}

div.relative {
    position: absolute;
    left: 9px;
    top: 14px;
    z-index: 1;
    width: 145px;
    height: 38px;
}

/* .table > tbody > tr > td {
    color: #4361ee;
} */
.dt-buttons .dt-button {
    width: 83px;
    height: 38px;
    font-size: 13px;
}

.btn-group>.btn,
.btn-group .btn {
    padding: 0px 0px;
    padding: 10px;
}

.btn {
    font-size: 10px;
}

tr.shown td.dt-control {
    background: url('/assets/img/details_close.png') no-repeat center center !important;
}

td.dt-control {
    background: url('/assets/img/details_open.png') no-repeat center center !important;
    cursor: pointer;
}

.theads {
    text-align: center;
    padding: 5px 0;
    color: #279dff;
}

.ant-timeline {
    box-sizing: border-box;
    font-size: 14px;
    font-variant: tabular-nums;
    line-height: 1.5;
    font-feature-settings: "tnum", "tnum";
    margin: 0;
    padding: 0;
    list-style: none;
}

.css-b03s4t {
    color: rgb(0, 0, 0);
    padding: 6px 0px 2px;
}

.css-16pld72 {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-transform: capitalize;
}

.css-16pld73 {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-transform: capitalize;
}

.ellipse {
    width: 320px;
}

.ellipse2 {
    width: 200px;
}

.ellipse:hover {
    overflow: visible;
    white-space: normal;
    width: 100%;
    /* just added this line */
}

.ellipse2:hover {
    overflow: visible;
    white-space: normal;
    width: 100%;
    /* just added this line */
}

.ant-timeline-item-tail {
    position: absolute;
    top: 10px;
    left: 4px;
    height: calc(100% - 10px);
    border-left: 2px solid #e8e8e8;
}

.ant-timeline-item-last>.ant-timeline-item-tail {
    display: none;
}

.ant-timeline-item-head-red {
    background-color: #f5222d;
    border-color: #f5222d;
}

.ant-timeline-item-head-green {
    background-color: #52c41a;
    border-color: #52c41a;
}

.ant-timeline-item-content {
    position: relative;
    top: -6px;
    margin: 0 0 0 18px;
    word-break: break-word;
}

.css-phvyqn {
    color: rgb(0, 0, 0);
    padding: 0px;
    height: 34px !important;
}

.ant-timeline-item {
    position: relative;
    margin: 0;
    padding: 0 0 5px;
    font-size: 14px;
    list-style: none;
}

.ant-timeline-item-head {
    position: absolute;
    width: 10px;
    height: 10px;
}

.bg-cust {
    background: #01010314;
    color: #e7515a;
}

.css-ccw3oz .ant-timeline-item-head {
    padding: 0px;
    border-radius: 0px !important;
}

.labels {
    color: #4361ee;
}

a.badge.alert.bg-secondary.shadow-sm {
    color: #fff;
}

#map {
    height: 400px;
    width: 600px;
}

.timelineImagesBlock {
    flex: 1;
    display: flex;
    align-content: flex-start;
    flex-wrap: wrap;
}

.timelineImagesBlock p {
    width: 100%;
}

.timelineImagesBlock img {
    margin: 4px;
    width: 100%;
    height: 100%;
    max-width: 98px;
    max-height: 50px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 0 2px #838383fa;
}
</style>
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Order
                                List</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="mb-4 mt-4">

                    <div class="container-fluid">
                        <div class="row winery_row_n spaceing_2n mb-3">
                            <!-- <div class="col-xl-5 col-lg-3 col-md-4">
                                <h4 class="win-h4">List</h4>
                            </div> -->
                            <div class="col d-flex pr-0">
                                <div class="search-inp w-100">
                                    <form class="navbar-form" role="search">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" id="search"
                                                data-action="<?php echo url()->current(); ?>">
                                            <!-- <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                            </div> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg lead_bladebtop1_n pl-0">
                                <div class="winery_btn_n btn-section px-0 text-right">
                                    <!-- <a class="btn-primary btn-cstm btn ml-2"
                                        style="font-size: 15px; padding: 9px; width: 130px"
                                        href="{{'consignments/create'}}"><span><i class="fa fa-plus"></i> Add
                                            New</span></a> -->
                                    <a href="javascript:void(0)" class="btn btn-primary btn-cstm reset_filter ml-2"
                                        style="font-size: 15px; padding: 9px;"
                                        data-action="<?php echo url()->current(); ?>"><span><i
                                                class="fa fa-refresh"></i> Reset Filters</span></a>
                                    <?php 
                                   $authuser = Auth::user();
                                   ?>
                                 
                                   
                                    <a href=" <?php echo URL::to($prefix.'/order-list-export'); ?>"
                                        class="btn btn-primary btn-cstm ml-2"
                                        style="font-size: 15px; padding: 9px;"
                                        ><span>Export</span></a>
                                </div>
                            </div>
                        </div> 
                    </div>

                    @csrf
                    <div class="main-table table-responsive">
                        @include('consignments.consignment-list-ajax')
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="#" id="toggledImageView" style="max-height: 90vh; max-width: 90vw" />
                </div>
            </div>
        </div>
    </div>
</div>

<!--  -->
<!-- edit crop model  -->
<div class="modal fade" id="crop_edit_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Acerage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form id="edit_order_acerage">
                    <input type="hidden" class="form-control" name="order_id" id="order_id">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Acerage</label>
                            <input type="number" step="any" class="form-control" name="acerage" id="acerage">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Remarks</label>
                            <input type="text" class="form-control" name="remarks" id="remarks" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="crt_pytm"><span class="indicator-label">Update</span>
                    <span class="indicator-progress" style="display: none;">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span></button>
            </div>
            </form>
        </div>
    </div>
</div>


@include('models.delete-user')
@include('models.common-confirm')
@include('models.manual-updatrLR')
@endsection

@section('js')
<script>
// jQuery(document).on("click", ".card-header", function () {
function row_click(row_id, job_id, url) {
    $('.append-modal').empty();
    $('.cbp_tmtimeline').empty();

    var modal_container = '';
    var modal_html = '';
    var modal_html1 = '';

    var job_id = job_id;
    var lr_id = row_id;
    var url = url;
    jQuery.ajax({
        url: url,
        type: "get",
        cache: false,
        data: {
            job_id: job_id,
            lr_id: lr_id
        },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr(
                "content"
            ),
        },
        success: function(response) {

            var trail_array = jQuery.parseJSON(response.app_trail.response_data);
            var trail_reverse = trail_array.reverse();
            //================Manual L TRAIL =================== //
            var cc = '<ul class="cbp_tmtimeline">';

            $.each(trail_reverse, function(index, task) {
                if (task.status == 'Successful') {
                    cc += '<li><time class="cbp_tmtime" datetime=' + task
                        .create_at + '><span class="hidden">' + task.create_at +
                        '</span></time><div class="cbp_tmicon"><i class="zmdi zmdi-account"></i></div><div class="cbp_tmlabel empty"><span><span class="successful" style="--statusColor: #158f2a">' +
                        task.status +
                        ' </span></span><div class="append-modal-images d-flex flex-wrap" style="gap: 16px; margin-bottom: 1rem; flex: 1;"></div></div></li>';
                } else {
                    cc +=
                        '<li><time class="cbp_tmtime" datetime=' + task.create_at +
                        '><span class="hidden">' + task.create_at +
                        '</span></time><div class="cbp_tmicon"><i class="zmdi zmdi-account"></i></div><div class="cbp_tmlabel empty"> <span><span class="successful" style="--statusColor: #41ca5d">' +
                        task.status + ' </span></span></div></li>';
                }
            });

            cc += '</ul>';
            var modal_html1 = cc;
            $('.append-modal').html(modal_html1);

            var sssss = ``;

            $.each(response.app_media, function(index, media) {

                if (media.type == 'pod') {
                    sssss += `<div class="timelineImagesBlock" style="flex: 3">
                            <p>POD</p>
                            <img src="` + media.pod_img + `"
                                class="viewImageInNewTab" data-toggle="modal"
                                data-target="#exampleModal" style="width: 100%;"/>
                          </div>`;
                } else if (media.type == 'sign') {
                    sssss += `<div class="timelineImagesBlock" style="flex: 1">
                            <p>Sign</p>
                            <img src="` + media.pod_img + `"
                                class="viewImageInNewTab" data-toggle="modal"
                                data-target="#exampleModal" style="width: 100%;"/>

                        </div>`;
                } else if (media.type == 'product_images') {
                    sssss += `<div class="timelineImagesBlock" style="flex: 2">
                            <p>Material</p>
                            <img src="` + media.pod_img + `"
                                class="viewImageInNewTab" data-toggle="modal"
                                data-target="#exampleModal" style="width: 100%;"/>
                        </div>`;
                }
            });
            $('.append-modal-images').html(sssss);
        }

    });

}


var map;

function initMap(response, row_id) {
    var map = new google.maps.Map(document.getElementById('map-' + row_id), {
        zoom: 8,
        center: 'Changigarh',
    });
    var directionsDisplay = new google.maps.DirectionsRenderer({
        'draggable': false
    });
    var directionsService = new google.maps.DirectionsService();
    var travel_mode = 'DRIVING';
    var origin = response.cnr_pincode;
    var destination = response.cne_pincode;
    directionsService.route({
        "origin": origin,
        "destination": destination,
        "travelMode": travel_mode,
        "avoidTolls": true,
    }, function(response, status) {
        if (status === 'OK') {
            directionsDisplay.setMap(map);
            directionsDisplay.setDirections(response);
            console.log(response);
        } else {
            directionsDisplay.setMap(null);
            directionsDisplay.setDirections(null);
            // alert('Unknown route found with error code 0, contact your manager');
        }
    });
}

jQuery(document).on('click', '.viewImageInNewTab', function() {

    let toggledImage = $(this).attr('src');
    $('#toggledImageView').attr('src', toggledImage);
});

$(document).on('click', '.edit_crop', function() {

var order_id = $(this).val();
var acerage = $(this).attr('field-acerage');
$('#crop_edit_model').modal('show');

$('#order_id').val(order_id);
$('#acerage').val(acerage);
});

$('#edit_order_acerage').submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    $.ajax({
        url: "order-edit-acerage",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function() {
            $(".indicator-progress").show();
            $(".indicator-label").hide();
        },
        success: (data) => {
            $(".indicator-progress").hide();
            $(".indicator-label").show();
            if (data.success == true) {
                swal('success', data.success_message, 'success');
                window.location.reload();
            } else {
                swal('error', data.error_message, 'error');
            }

        }
    });
});
</script>

@endsection