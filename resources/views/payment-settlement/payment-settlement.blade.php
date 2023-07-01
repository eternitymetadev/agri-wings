@extends('layouts.main')
@section('content')
<style>
.dt--top-section {
    margin: none;
}

div.relative {
    position: absolute;
    left: 110px;
    top: 24px;
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

.select2-results__options {
    list-style: none;
    margin: 0;
    padding: 0;
    height: 160px;
    /* scroll-margin: 38px; */
    overflow: auto;
}

.move {
    cursor: move;
}

.has-details {
    position: relative;
}

.details {
    position: absolute;
    top: 0;
    transform: translateY(70%) scale(0);
    transition: transform 0.1s ease-in;
    transform-origin: left;
    display: inline;
    background: white;
    z-index: 20;
    min-width: 100%;
    padding: 1rem;
    border: 1px solid black;
}

.has-details:hover span {
    transform: translateY(70%) scale(1);
}

.vehicleField .sumo_vehicle {
    width: 100% !important;
}

.vehicleField .text-right.close-c {
    display: none;
}
</style>
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
<!-- END PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Payment</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Payment
                                Settlement</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">

                <div class="form-row mb-0">
                    <div class="form-group col-md-4">
                        <?php
                        $authuser = Auth::user();
                        ?>
                        @if($authuser->role_id == 5)
                        <button type="button" class="btn btn-warning mt-4 ml-4 verify_action" style="font-size: 12px;"
                            disabled>Verifie</button>
                        @else
                        <button type="button" class="btn btn-warning mt-4 ml-4 settlement_action"
                            style="font-size: 12px;" disabled>Settlement</button>
                        @endif
                    </div>

                    <div class="form-group col-md-4">

                    </div>
                </div>

                @csrf
                <div class="main-table table-responsive">
                    @include('payment-settlement.payment-settlement-ajax')
                </div>
            </div>
        </div>
    </div>
</div>

<!--  -->
<!-- ----------------------------------------------------------------------  -->
<div class="modal fade bd-example-modal-xl" id="settlement_pymt_model" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Settlement Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" px stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="settlement_form">
                    <input type="hidden" id="order_no" name="order_no" value="" />
                    <p><b>Total Amount :</b><span id="total_amount"></span></p>

                    <div class="form-row mb-0">
                        <div class="form-group form-group-sm col-md-4">
                            <label for="location_name">Date Of Deposite</label>
                            <input type="date" class="form-control" id="date_of_deposite" name="date_of_deposite"
                                value="">
                        </div>
                        <div class="form-group form-group-sm col-md-4">
                            <label for="exampleFormControlInput2">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" value="">
                        </div>
                        <div class="form-group form-group-sm col-md-4">
                            <label for="location_name">Branch Location</label>
                            <input type="text" class="form-control" id="branch_location" name="branch_location"
                                value="">
                        </div>
                    </div>
                    <div class="form-row mb-0">
                        <div class="form-group form-group-sm col-md-4">
                            <label for="location_name">Amount Deposited</label>
                            <input type="number" class="form-control" id="amount_deposite" name="amount_deposite"
                                value="">
                        </div>

                    </div>

                    <div class="py-3 d-flex justify-content-end align-items-center" style="gap: 1rem">
                        <button class="btn btn-outline-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard & Close
                        </button>
                        <button type="submit" class="btn btn-primary disableme">
                            <span class="indicator-label">Settled</span>
                            <span class="indicator-progress" style="display: none;">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<div class="modal fade bd-example-modal-xl" id="verify_pymt_model" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Settlement Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" px stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="verify_form">
                    <input type="text" id="verify_order_no" name="verify_order_no" value="" />
                    <p><b>Total Amount :</b><span id="total_amount_verify"></span></p>
                    <div class="form-row mb-0">
                        <div class="form-group form-group-sm col-md-4">
                            <label for="location_name">Verify Date</label>
                            <input type="date" class="form-control" id="verify_date" name="verify_date"
                                value="">
                        </div>
                    </div>

                    <div class="py-3 d-flex justify-content-end align-items-center" style="gap: 1rem">
                        <button class="btn btn-outline-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard & Close
                        </button>
                        <button type="submit" class="btn btn-primary disableme">
                            <span class="indicator-label">Verified</span>
                            <span class="indicator-progress" style="display: none;">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
jQuery(function() {
    $('.my-select2').each(function() {
        $(this).select2({
            theme: "bootstrap-5",
            dropdownParent: $(this).parent(), // fix select2 search input focus bug
        })
    })

    $(document).ready(function() {
        $('.my-select3').select2();
    });

    // fix select2 bootstrap modal scroll bug
    $(document).on('select2:close', '.my-select2', function(e) {
        var evt = "scroll.select2"
        $(e.target).parents().off(evt)
        $(window).off(evt)
    })
})
///// check box checked unverified lr page
jQuery(document).on('click', '#ckbCheckAll', function() {
    if (this.checked) {
        jQuery('.settlement_action').prop('disabled', false);
        jQuery('.chkBoxClass').each(function() {
            this.checked = true;
        });
    } else {
        jQuery('.chkBoxClass').each(function() {
            this.checked = false;
        });
        jQuery('.settlement_action').prop('disabled', true);
    }
});

jQuery(document).on('click', '.chkBoxClass', function() {
    if ($('.chkBoxClass:checked').length == $('.chkBoxClass').length) {
        $('#ckbCheckAll').prop('checked', true);
        jQuery('.settlement_action').prop('disabled', false);
    } else {
        var checklength = $('.chkBoxClass:checked').length;
        if (checklength < 1) {
            jQuery('.settlement_action').prop('disabled', true);
        } else {
            jQuery('.settlement_action').prop('disabled', false);
        }

        $('#ckbCheckAll').prop('checked', false);
    }
});
$(document).on('click', '.settlement_action', function() {

    $('#settlement_pymt_model').modal('show');
    var order_no = [];
    var tdval = [];
    $(':checkbox[name="checked_drs[]"]:checked').each(function() {
        order_no.push(this.value);
        var cc = $(this).attr('data-price');
        tdval.push(cc);
    });
    $('#order_no').val(order_no);
    var toNumbers = tdval.map(Number);
    var sum = toNumbers.reduce((x, y) => x + y);
    $('#total_amount').html(sum);

});

$("#settlement_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    var base_url = window.location.origin;
    $.ajax({
        url: "settlement-request",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function() {
            $(".indicator-progress").show();
            $(".indicator-label").hide();
            $('.disableme').prop('disabled', true);
        },
        success: (data) => {
            $('.disableme').prop('disabled', true);
            $(".indicator-progress").hide();
            $(".indicator-label").show();
            if (data.success == true) {
                swal("success", data.message, "success");
                window.location.reload();
            } else {
                swal("error", data.message, "error");
            }
        },
    });
});
// ===============
jQuery(document).on('click', '#ckbCheckAll', function() {
    if (this.checked) {
        jQuery('.verify_action').prop('disabled', false);
        jQuery('.chkBoxClass').each(function() {
            this.checked = true;
        });
    } else {
        jQuery('.chkBoxClass').each(function() {
            this.checked = false;
        });
        jQuery('.verify_action').prop('disabled', true);
    }
});

jQuery(document).on('click', '.chkBoxClass', function() {
    if ($('.chkBoxClass:checked').length == $('.chkBoxClass').length) {
        $('#ckbCheckAll').prop('checked', true);
        jQuery('.verify_action').prop('disabled', false);
    } else {
        var checklength = $('.chkBoxClass:checked').length;
        if (checklength < 1) {
            jQuery('.verify_action').prop('disabled', true);
        } else {
            jQuery('.verify_action').prop('disabled', false);
        }

        $('#ckbCheckAll').prop('checked', false);
    }
});
$(document).on('click', '.verify_action', function() {

    $('#verify_pymt_model').modal('show');
    var order_no = [];
    var tdval = [];
    $(':checkbox[name="checked_drs[]"]:checked').each(function() {
        order_no.push(this.value);
        var cc = $(this).attr('data-price');
        tdval.push(cc);
    });
    $('#verify_order_no').val(order_no);
    var toNumbers = tdval.map(Number);
    var sum = toNumbers.reduce((x, y) => x + y);
    $('#total_amount_verify').html(sum);

});

$("#verify_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "verified-payment",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function() {
            $(".indicator-progress").show();
            $(".indicator-label").hide();
            $('.disableme').prop('disabled', true);
        },
        success: (data) => {
            $('.disableme').prop('disabled', true);
            $(".indicator-progress").hide();
            $(".indicator-label").show();
            if (data.success == true) {
                swal("success", data.message, "success");
                window.location.reload();
            } else {
                swal("error", data.message, "error");
            }
        },
    });
});
</script>
@endsection