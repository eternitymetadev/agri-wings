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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Verification Pending</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Unverified
                                Client</a></li>
                    </ol>
                </nav>
            </div>

            <div class="widget-content widget-content-area br-6">
                <div class=" mb-4 mt-4">
                    @csrf
                    <table id="unverified-table" class="table table-hover" style="width:100%">
                        <div class="btn-group relative">

                            <!-- <button type="button" class="btn btn-warning" id="launch_model" data-toggle="modal" data-target="#exampleModal" disabled="disabled" style="font-size: 11px;">

                            Create DSR
                            </button> -->
                        </div>
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Pin</th>
                                <th>District</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Hub</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($regional_clients as $client)
                            <?php
                            $authuser = Auth::user();
                            ?>
                            <tr>
                                <td>{{$client->name}}</td>
                                <td>{{$client->regional_client_nick_name}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->pin}}</td>
                                <td>{{$client->district}}</td>
                                <td>{{$client->city}}</td>
                                <td>{{$client->state}}</td>
                                <td>{{$client->Location->name}}</td>
                                <?php if($client->verified_by == 0){?>
                                <td><a href="{{ url($prefix.'/view-regional-details/'.$client->id) }}"
                                        class="edit btn btn-sm btn-primary ml-2">view</a>||<button type="button"
                                        class="btn btn-sm btn-primary verify" value="{{$client->id}}">verify</button>
                                </td>
                                <?php } else {
                                            if($authuser->role_id == 3) {?>
                                <td><button type="button" class="btn btn-sm btn-warning" value="{{$client->id}}">Sent to
                                        Account</button></td>
                                <?php   }else{ ?>
                                <td><button type="button" class="btn btn-sm btn-warning approve_acc"
                                        value="{{$client->id}}">Approve Verification</button></td>
                                <?php }} ?>
                                <!-- <td><a class="btn btn-primary"
                                        href="{{url($prefix.'/unverified-client-list/'.Crypt::encrypt($client->id).'/edit')}}"><span><i
                                                class="fa fa-edit" aria-hidden="true"></i> Edit<span></a></td> -->

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!---------- send to acc Modal -------------------------->
<div class="modal fade bd-example-modal-xl" id="verify_model" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verify Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                <form id="sent_for_verification">
                    <input type="hidden" class="form-control" id="bill_client_id" name="bill_client_id">
                    <input type="hidden" class="form-control" id="gst_chk" name="gst_chk">
                    <input type="hidden" class="form-control" id="pan_chk" name="pan_chk">
                    <input type="hidden" class="form-control" id="draft_mode" name="draft_mode">
                    <div class="statbox widget box box-shadow">

                        <div class="formRow">
                            <div class="form-group formElement" style="margin-bottom: 16px">
                                <label for="gst" class="form-label  formLabelTheme">Customer Type</label>
                                <select class="form-control" name="customer_type" id="customer_type">
                                    <option value="" readonly>-select-</option>
                                    <option value="Commercial Shop Owners">Commercial Shop Owners (CSO)</option>
                                    <option value="Common Service Centres">Common Service Centres (CSC)</option>
                                    <option value="Mandi Operators">Mandi Operators</option>
                                    <option value="Direct D2F Clients">Direct D2F Clients</option>
                                    <option value="Other B2B Channel">Other B2B Channels</option>
                                </select>
                            </div>
                            <div class="form-group formElement" style="margin-bottom: 16px">
                                <label for="pan" class="form-label  formLabelTheme">Projected Business Plan(In
                                    Lakhs)</label>
                                <input type="number" class="form-control" id="business_plan" name="business_plan">
                            </div>
                        </div>
                        <div class="formRow">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlInput2">Select Payment Terms<span
                                        class="text-danger">*</span></label>
                                <div class="check-box d-flex" style="margin: 6px 0 0 6px">
                                    <div class="checkbox radio">
                                        <label class="check-label d-flex align-items-center" style="gap: 6px">
                                            <span class="checkmark"></span>
                                            <input type="checkbox" value='Bill To Client' name="payment_term[]"
                                                checked />
                                            Bill To Client
                                        </label>
                                    </div>
                                    <div class="checkbox radio">
                                        <label class="check-label d-flex align-items-center" style="gap: 6px">
                                            <span class="checkmark"></span>
                                            <input type="checkbox" class="check_doc" name="payment_term[]"
                                                value='15 days Credit Period' id="15Days_draft" />
                                            15 days Credit Period
                                        </label>
                                    </div>
                                    <div class="checkbox radio">
                                        <label class="check-label d-flex align-items-center" style="gap: 6px">
                                            <span class="checkmark"></span>
                                            <input type="checkbox" class="check_doc" name="payment_term[]"
                                                value='30 days Credit Period' id="30Days_draft" />
                                            30 days Credit Period
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group formElement" style="margin-bottom: 16px">
                                <label for="pan" class="form-label  formLabelTheme">Verified by</label>
                                <select class="form-control" name="verification_done_by" id="verification_done_by">
                                    <option value="" readonly>-select-</option>
                                    <option value="Verified by Calling">verified by Calling</option>
                                    <option value="Verify by Visit">Verify by Visit</option>
                                </select>
                            </div>
                        </div>
                        <label for="pan" class="form-label  formLabelTheme">Bill To Farmer</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bill_to_farmer" id="farmer_enable"
                                value="1">
                            <label class="form-check-label" for="inlineRadio1">Enable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bill_to_farmer" id="farmer_disable"
                                value="0" checked>
                            <label class="form-check-label" for="inlineRadio2">Disable</label>
                        </div>
                        <div class="formRow">
                            <div class="form-group formElement" style="margin-bottom: 16px">
                                <label for="pan" class="form-label  formLabelTheme">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="button" class="btn btn-primary save_as_draft">Save as Draft</button>
                        <button type="button" class="btn btn-primary sent_acc">Send To Account</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!---------- approve to acc Modal -------------------------->
<div class="modal fade bd-example-modal-xl" id="acc_verify_model" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verify Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                <form id="sent_for_verification">
                    <input type="hidden" class="form-control" id="acc_client_id" name="client_id">
                    <input type="hidden" class="form-control" id="acc_gst_chk" name="gst_chk">
                    <input type="hidden" class="form-control" id="acc_pan_chk" name="pan_chk">

                    <div class="statbox widget box box-shadow">
                        <div class="formRow">
                            <div class="form-group formElement" style="margin-bottom: 16px">
                                <label for="gst" class="form-label  formLabelTheme">Base Client</label>
                                <select class="form-control my-select2" name="base_client_id" id="base_client_id">
                                    <option value="" readonly>-select-</option>
                                    @foreach($base_clients as $base_client)
                                    <option value="{{$base_client->id}}">{{$base_client->client_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="formRow">
                            <div class="form-group formElement" style="margin-bottom: 16px">
                                <label for="gst" class="form-label  formLabelTheme">Customer Type</label>
                                <select class="form-control" name="customer_type" id="acc_customer_type">
                                    <option value="" readonly>-select-</option>
                                    <option value="Commercial Shop Owners">Commercial Shop Owners (CSO)</option>
                                    <option value="Common Service Centres">Common Service Centres (CSC)</option>
                                    <option value="Mandi Operators">Mandi Operators</option>
                                    <option value="Direct D2F Clients">Direct D2F Clients</option>
                                    <option value="Other B2B Channel">Other B2B Channels</option>
                                </select>
                            </div>
                            <div class="form-group formElement" style="margin-bottom: 16px">
                                <label for="pan" class="form-label  formLabelTheme">Projected Business Plan(In
                                    Lakhs)</label>
                                <input type="number" class="form-control" id="acc_business_plan" name="business_plan">
                            </div>
                        </div>
                        <div class="formRow">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlInput2">Select Payment Terms<span
                                        class="text-danger">*</span></label>
                                <div class="check-box d-flex" style="margin: 6px 0 0 6px">
                                    <div class="checkbox radio">
                                        <label class="check-label d-flex align-items-center" style="gap: 6px">
                                            <span class="checkmark"></span>
                                            <input type="checkbox" value='Bill To Client' name="payment_terms[]"
                                                id="billToClient" />
                                            Bill To Client
                                        </label>
                                    </div>
                                    <div class="checkbox radio">
                                        <label class="check-label d-flex align-items-center" style="gap: 6px">
                                            <span class="checkmark"></span>
                                            <input type="checkbox" class="acc_chk_doc" name="payment_terms[]"
                                                id="15Days" value='15 days Credit Period' />
                                            15 days Credit Period
                                        </label>
                                    </div>
                                    <div class="checkbox radio">
                                        <label class="check-label d-flex align-items-center" style="gap: 6px">
                                            <span class="checkmark"></span>
                                            <input type="checkbox" class="acc_chk_doc" name="payment_terms[]"
                                                id="30Days" value='30 days Credit Period' />
                                            30 days Credit Period
                                        </label>
                                    </div>
                                    <div class="checkbox radio">
                                        <label class="check-label d-flex align-items-center" style="gap: 6px">
                                            <span class="checkmark"></span>
                                            <input type="checkbox" name="payment_terms[]" id="billToFarmer"
                                                value='Bill To Farmer' />
                                            Bill to Farmer
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group formElement" style="margin-bottom: 16px">
                                <label for="pan" class="form-label  formLabelTheme">Verified by</label>
                                <select class="form-control" name="verification_done_by" id="acc_verification_done_by">
                                    <option value="" readonly>-select-</option>
                                    <option value="Verified by Calling">verified by Calling</option>
                                    <option value="Verify by Visit">Verify by Visit</option>
                                </select>
                            </div>
                        </div>
                        <label for="pan" class="form-label  formLabelTheme">Bill To Farmer</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bill_to_farmers" id="acc_farmer_enable"
                                value="1">
                            <label class="form-check-label" for="inlineRadio1">Enable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bill_to_farmers" id="acc_farmer_disable"
                                value="0" checked>
                            <label class="form-check-label" for="inlineRadio2">Disable</label>
                        </div>
                        <div class="formRow">
                            <div class="form-group formElement" style="margin-bottom: 16px">
                                <label for="pan" class="form-label  formLabelTheme">Remarks</label>
                                <input type="text" class="form-control" id="acc_remarks" name="remarks" readonly>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="button" class="btn btn-primary account_approver">Approve</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
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
$(document).ready(function() {

    ///// check box checked unverified lr page
    jQuery(document).on('click', '#ckbCheckAll', function() {
        if (this.checked) {
            jQuery('#create_edd').prop('disabled', false);
            jQuery('.chkBoxClass').each(function() {
                this.checked = true;
            });
        } else {
            jQuery('.chkBoxClass').each(function() {
                this.checked = false;
            });
            jQuery('#create_edd').prop('disabled', true);
        }
    });

    jQuery(document).on('click', '.chkBoxClass', function() {
        if ($('.chkBoxClass:checked').length == $('.chkBoxClass').length) {
            $('#ckbCheckAll').prop('checked', true);
            jQuery('#launch_model').prop('disabled', false);
        } else {
            var checklength = $('.chkBoxClass:checked').length;
            if (checklength < 1) {
                jQuery('#create_edd').prop('disabled', true);
            } else {
                jQuery('#create_edd').prop('disabled', false);
            }

            $('#ckbCheckAll').prop('checked', false);
        }
    });

});
/////////////////////////////////////////////////////////////////
$('#unverified-table').DataTable({

    "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    buttons: {
        buttons: [
            // { extend: 'copy', className: 'btn btn-sm' },
            // { extend: 'csv', className: 'btn btn-sm' },
            {
                extend: 'excel',
                className: 'btn btn-sm'
            },
            // { extend: 'print', className: 'btn btn-sm' }
        ]
    },
    "oLanguage": {
        "oPaginate": {
            "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
            "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
        },
        "sInfo": "Showing page PAGE of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Results :  _MENU_",
    },

    "ordering": true,
    "paging": false,
    // "pageLength": 100,

});

$(document).on('click', '.verify', function() {

    var client_id = $(this).val();
    $('#verify_model').modal('show');
    $('#bill_client_id').val(client_id);
    $.ajax({
        type: "GET",
        url: "rm-check-client",
        data: {
            client_id: client_id
        },
        beforeSend: //reinitialize Datatables
            function() {
                $('#customer_type').val('');
                $('#business_plan').val('');
                $('#verification_done_by').val('');
                $('#draft_mode').val('');
                $('#15Days_draft').prop('checked', false);
                $('#30Days_draft').prop('checked', false);
                $('#billToFarmer_draft').prop('checked', false);
                $('#billToClient_draft').prop('checked', false);
                $('#remarks').val('');
                $('#gst_chk').val('');
                $('#pan_chk').val('');
            },
        success: function(data) {
            // console.log(data.getclient);
            $('#gst_chk').val(data.getclient.upload_gst);
            $('#pan_chk').val(data.getclient.upload_pan);

            if (data.getclient.verification != null) {
                console.log(data.getclient.verification.bill_to_farmer);

                $("#customer_type").val(data.getclient.verification.customer_type).change();
                $("#business_plan").val(data.getclient.verification.business_plan).val();
                $("#verification_done_by").val(data.getclient.verification.verification_done_by)
                    .val();
                $("#draft_mode").val(data.getclient.verification.draft_mode).val();
                $("#remarks").val(data.getclient.verification.remarks).val();

                if (data.getclient.verification.bill_to_farmer == 1) $('#farmer_enable').prop(
                    'checked',
                    true);
                else $('#farmer_disable').prop('checked', true);


            }
            var myArray = data.getclient.payment_term;

            if (myArray.some(e => e.payment_term === '15 days Credit Period')) $('#15Days_draft')
                .prop('checked', true);
            // $('#15Days_draft').attr('id', '9');
            if (myArray.some(e => e.payment_term === '30 days Credit Period')) $('#30Days_draft')
                .prop('checked', true);
            // if (myArray.some(e => e.payment_term === 'Bill To Client')) $('#15Days_draft').prop('checked', true);

        }

    });

});

$(document).on('click', '.check_doc', function() {

    var check_gst = $('#gst_chk').val();
    var check_pan = $('#pan_chk').val();

    if (check_gst == '' || check_pan == '') {
        swal('error', 'Please upload document', 'error');
        $('#15Days_draft').prop('checked', false);
        $('#30Days_draft').prop('checked', false);
        return false;
    }

});


$('.sent_acc').click(function() {

    var payment_term = [];
    $(':checkbox[name="payment_term[]"]:checked').each(function() {
        payment_term.push(this.value);

    });
    var bill_to_farmer = $('input[name="bill_to_farmer"]:checked').val();

    var customer_type = $('#customer_type').val();
    var business_plan = $('#business_plan').val();
    var verification_done_by = $('#verification_done_by').val();
    var client_id = $('#bill_client_id').val();
    var remarks = $('#remarks').val();
    var draft_mode = $('#draft_mode').val();


    $.ajax({
        url: "sent-for-verification",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: {
            client_id: client_id,
            customer_type: customer_type,
            business_plan: business_plan,
            payment_term: payment_term,
            verification_done_by: verification_done_by,
            remarks: remarks,
            draft_mode: draft_mode,
            bill_to_farmer: bill_to_farmer
        },

        beforeSend: function() {

        },
        success: function(data) {
            if (data.success == true) {
                swal('success', data.success_message, 'success')
            } else {
                swal('error', data.error_message, 'error')
            }


        },
    });
});
// ================= SAVE AS DRAFT ================= //
$('.save_as_draft').click(function() {

    var payment_term = [];
    $(':checkbox[name="payment_term[]"]:checked').each(function() {
        payment_term.push(this.value);
        // var id = $(this).attr('id');
        // payment_term.push(id);
    });
    var bill_to_farmer = $('input[name="bill_to_farmer"]:checked').val();

    var customer_type = $('#customer_type').val();
    var business_plan = $('#business_plan').val();
    var verification_done_by = $('#verification_done_by').val();
    var client_id = $('#bill_client_id').val();
    var draft_mode = $('#draft_mode').val();
    var remarks = $('#remarks').val();


    $.ajax({
        url: "save-as-draft",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: {
            client_id: client_id,
            customer_type: customer_type,
            business_plan: business_plan,
            payment_term: payment_term,
            verification_done_by: verification_done_by,
            draft_mode: draft_mode,
            remarks: remarks,
            bill_to_farmer: bill_to_farmer
        },

        beforeSend: function() {

        },
        success: function(data) {
            if (data.success == true) {
                swal('success', data.success_message, 'success')
                location.reload();
            } else {
                swal('error', data.error_message, 'error')
            }


        },
    });
});
// ------------ account ------- process //
let sahil = []

$(document).on('click', '.approve_acc', function() {

    var client_id = $(this).val();
    $('#acc_verify_model').modal('show');
    $('#acc_client_id').val(client_id);
    $.ajax({
        type: "GET",
        url: "account-check-verification",
        data: {
            client_id: client_id
        },
        beforeSend: //reinitialize Datatables
            function() {
                $('#acc_customer_type').val('');
                $('#acc_business_plan').val('');
                $('#acc_verification_done_by').val('');
                $('#acc_draft_mode').val('');
                $('#15Days').prop('checked', false);
                $('#30Days').prop('checked', false);
                $('#billToFarmer').prop('checked', false);
                $('#billToClient').prop('checked', false);
                $('#acc_remarks').val('');
                $('#acc_gst_chk').val('');
                $('#acc_pan_chk').val('');

            },
        success: function(data) {
            console.log(data.getclient.pending_term);
            var myArray = data.getclient.pending_term;


            const fifteenDaysArray = myArray.filter((e) => e.payment_term ==
                '15 days Credit Period');
            const thirtyDaysArray = myArray.filter((e) => e.payment_term ==
                '30 days Credit Period');
            const billToClient = myArray.filter((e) => e.payment_term == 'Bill To Client');
            const billTOFarmer = myArray.filter((e) => e.payment_term == 'Bill To Farmer');

            if (fifteenDaysArray.length > 0) {
                $('#15Days').prop('checked', true);
                console.log('fifteenDaysArray', fifteenDaysArray);
                sahil = [...sahil, {
                    id: fifteenDaysArray[0].id,
                    name: fifteenDaysArray[0].payment_term
                }];
            }
            if (thirtyDaysArray.length > 0) {
                $('#30Days').prop('checked', true);
                console.log('thirtyDaysArray', thirtyDaysArray);
                sahil = [...sahil, {
                    id: thirtyDaysArray[0].id,
                    name: thirtyDaysArray[0].payment_term
                }];
            }
            if (billToClient.length > 0) {
                $('#billToClient').prop('checked', true);
                console.log('billToClient', billToClient);

                sahil = [...sahil, {
                    id: billToClient[0].id,
                    name: billToClient[0].payment_term
                }];
            }

            $("#acc_customer_type").val(data.getclient.customer_type).change();
            $("#acc_business_plan").val(data.getclient.business_plan).val();
            $("#acc_verification_done_by").val(data.getclient.verification_done_by).val();
            $("#acc_remarks").val(data.getclient.remarks).val();
            $("#acc_gst_chk").val(data.getclient.regional_details.upload_gst).val();
            $("#acc_pan_chk").val(data.getclient.regional_details.upload_pan).val();

            if (data.getclient.bill_to_farmer == 1) $('#acc_farmer_enable').prop('checked',
                true);
            else $('#acc_farmer_disable').prop('checked', true);



        }

    });

});
$(document).on('click', '.acc_chk_doc', function() {

    var check_gst = $('#acc_gst_chk').val();
    var check_pan = $('#acc_pan_chk').val();

    if (check_gst == '' || check_pan == '') {
        swal('error', 'Please upload document', 'error');
        $('#15Days').prop('checked', false);
        $('#30Days').prop('checked', false);
        return false;
    }

});

///

$('.account_approver').click(function() {

    var payment_term = [];
    $(':checkbox[name="payment_terms[]"]:checked').each(function() {
        payment_term.push(this.value);
    });
    // for (let w = 0; w <= payment_term.length; w++) {
    //     sahil.filter((e) => e.name != payment_term[w])
    //     console.log('sahil', sahil);
    // }
    // // console.log('sahil', sahil.filter((e) => e.name != payment_term[0]));
    // console.log('payment_term', payment_term);
    // return false;
    var bill_to_farmer = $('input[name="bill_to_farmers"]:checked').val();

    var customer_type = $('#acc_customer_type').val();
    var business_plan = $('#acc_business_plan').val();
    var verification_done_by = $('#acc_verification_done_by').val();
    var client_id = $('#acc_client_id').val();
    var remarks = $('#acc_remarks').val();
    var base_client_id = $('#base_client_id').val();


    $.ajax({
        url: "account-approver",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: {
            client_id: client_id,
            customer_type: customer_type,
            business_plan: business_plan,
            payment_term: payment_term,
            verification_done_by: verification_done_by,
            remarks: remarks,
            base_client_id: base_client_id,
            bill_to_farmer: bill_to_farmer
        },

        beforeSend: function() {

        },
        success: function(data) {
            if (data.success == true) {
                swal('success', data.success_message, 'success')
                location.reload();
            } else {
                swal('error', data.error_message, 'error')
            }
        },
    });
});
</script>
@endsection