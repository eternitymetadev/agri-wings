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

.myButtonExtra {
    border-radius: 8px !important;
    width: 120px;
    font-size: 13px !important;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
}

.iconButton {
    min-height: 2rem;
    min-width: 2rem;
    text-align: center;
    border-radius: 50vh;
    padding: 6px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 8px inset;
    color: var(--btnClr);
}
.iconButton svg{
    height: 16px;
    width: 16px;
}
</style>
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
<!-- END PAGE LEVEL CUSTOM STYLES -->

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Order Bookings</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Order
                                List</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="mb-4 mt-4">
                    @csrf
                    <table id="usertable" class="table table-hover get-datatable" style="width:100%">
                        <div class="btn-group relative" style="width: auto">
                            <!-- <a href="{{'order-book-ptl'}}" class="btn btn-primary myButtonExtra"
                                style="font-size: 13px; padding: 6px 0px;">Create Order</a> -->
                            <!-- <button type="button" class="btn btn-primary myButtonExtra ml-2" data-toggle="modal"
                                data-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-upload-cloud mr-1">
                                    <polyline points="16 16 12 12 8 16"></polyline>
                                    <line x1="12" y1="12" x2="12" y2="21"></line>
                                    <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                                    <polyline points="16 16 12 12 8 16"></polyline>
                                </svg>
                                upload
                            </button> -->
                        </div>
                        <thead>
                            <tr>
                                <!-- <th> </th> -->
                                <th>Order Number</th>
                                <th>Order Date</th>
                                <th>Booking Partner</th>
                                <th>Billing Client</th>
                                <th>Service receiver</th>
                                <th>District</th>
                                <th>State</th>
                                <th>Pincode</th>
                                <th>acers</th>
                                <th>Estimated Amount</th>
                                <th>Status of Order</th>
                                <th style="text-align: center">NOC</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($consignments as $key => $consignment) {
                                 $authuser = Auth::user();
                                ?>
                            <tr>
                                <td>{{ $consignment->id ?? "-" }}</td>
                                <td>{{ $consignment->consignment_date ?? "NA" }}</td>
                                <td>{{ $consignment->RegClient->name ?? "-" }}</td>
                                <td>{{ $consignment->BillingClient->name ?? "-" }}</td>
                                <td>{{ $consignment->ConsigneeDetail->nick_name ?? "-"}}</td>
                                <td>{{ $consignment->ConsigneeDetail->district ?? "-"}} </td>
                                <td>{{ $consignment->ConsigneeDetail->state_id ?? "-"}}</td>
                                <td>{{ $consignment->ConsigneeDetail->postal_code ?? "-"}}</td>
                                <td>{{ $consignment->total_acerage ?? "-" }}</td>
                                <td>{{ $consignment->total_amount ?? "-" }}</td>

                                @if($authuser->role_id == 7)
                                <td>
                                    <a class="btn btn-primary" href="#">
                                        <span>Pending for Verification</span>
                                    </a>
                                </td>
                                @else
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{url($prefix.'/orders/'.Crypt::encrypt($consignment->id).'/edit')}}">
                                        <span>Pending for Verification</span>
                                    </a>
                                </td>
                                @endif 

                                <td>
                                    @if(empty($consignment->noc_upload))
                                    <a href="{{url($prefix.'/noc-print/'.$consignment->id)}}" class="iconButton swan-tooltip" data-tooltip="Print NOC">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-printer">
                                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                            <path
                                                d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                            </path>
                                            <rect x="6" y="14" width="12" height="8"></rect>
                                        </svg>
                                    </a>
                                    <a href="#" class="iconButton swan-tooltip upload_noc" data-tooltip="Upload NOC" data-orderId="{{$consignment->id}}" style="--btnClr: #208120">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-upload-cloud">
                                            <polyline points="16 16 12 12 8 16"></polyline>
                                            <line x1="12" y1="12" x2="12" y2="21"></line>
                                            <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                                            <polyline points="16 16 12 12 8 16"></polyline>
                                        </svg>
                                    </a>
                                    @else
                                    <a href="" class="iconButton swan-tooltip" data-tooltip="View NOC" style="--btnClr: #6b6b6b; gap: 4px; min-width: 4.5rem">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        View</a>
                                    @endif
                                </td>

                                @if($consignment->bill_to == 'Self')

                                <td>Pre-Paid</td>
                                @else
                                <td>Post-Paid</td>
                                @endif
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="receve_material" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="noc_form">
                <!-- <button type="button" class="close" data-dismiss="modal"><img src="{{asset('assets/img/close-bottle.png')}}" class="img-fluid"></button> -->
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h4 class="modal-title">Upload Noc</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <input type="text" class="form-control" name="order_id" id="order_id" />

                    <input type="file" class="form-control" name="noc_upload" placeholder="Remarks" Required />
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="btn-section w-100 P-0">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a type="" class="btn btn-modal" data-dismiss="modal">No</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('models.delete-user')
@include('models.common-confirm')
@endsection
@section('js')
<script>
// Order list status change onchange
jQuery(document).on('click', '.orderstatus', function(event) {
    event.stopPropagation();

    let order_id = jQuery(this).attr('data-id');
    var dataaction = jQuery(this).attr('data-action');
    var updatestatus = 'updatestatus';
    var status = 0;


    jQuery('#commonconfirm').modal('show');
    jQuery(".commonconfirmclick").one("click", function() {

        var reason_to_cancel = jQuery('#reason_to_cancel').val();
        var data = {
            id: order_id,
            updatestatus: updatestatus,
            status: status,
            reason_to_cancel: reason_to_cancel
        };

        jQuery.ajax({
            url: dataaction,
            type: 'get',
            cache: false,
            data: data,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="_token"]').attr('content')
            },
            processData: true,
            beforeSend: function() {
                // jQuery("input[type=submit]").attr("disabled", "disabled");
            },
            complete: function() {
                //jQuery("#loader-section").css('display','none');
            },

            success: function(response) {
                if (response.success) {
                    jQuery('#commonconfirm').modal('hide');
                    if (response.page == 'order-statusupdate') {
                        setTimeout(() => {
                            window.location.href = response.redirect_url
                        }, 10);
                    }
                }
            }
        });
    });
});

$('#upload_order').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "import-ordre-booking",
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
                swal("success!", data.success_message, "success");
            } else {
                swal('error', data.error_message, 'error');
            }

        }
    });
});
///
$(document).on('click', '.upload_noc', function() {
    var order_no = $(this).attr('data-orderId');
    $('#receve_material').modal('show');
    $('#order_id').val(order_no);
});
//
$('#noc_form').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    return false;

    $.ajax({
        url: "upload-noc",
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
                swal("success!", data.success_message, "success");
                window.location.reload();
            } else {
                swal('error', data.error_message, 'error');
            }

        }
    });
});
</script>
@endsection