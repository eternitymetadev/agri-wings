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
                            <tr>
                                <td>{{$client->name}}</td>
                                <td>{{$client->regional_client_nick_name}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->pin}}</td>
                                <td>{{$client->district}}</td>
                                <td>{{$client->city}}</td>
                                <td>{{$client->state}}</td>
                                <td>{{$client->Location->name}}</td>
                                <td><button type="button" class="btn btn-sm btn-primary verify"
                                        value="{{$client->id}}">verify</button></td>
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

<!---------- View Vendor Modal -------------------------->
<div class="modal fade bd-example-modal-xl" id="verify_model" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verify Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                <div class="statbox widget box box-shadow">

                    <div class="formRow">
                        <div class="form-group formElement" style="margin-bottom: 16px">
                            <label for="gst" class="form-label  formLabelTheme">Customer Type</label>
                            <select class="form-control my-select2" name="customer_type" id="customer_type">
                                <option value="" readonly>-select-</option>
                                <option value="Commercial Shop Owners">Commercial Shop Owners (CSO)</option>
                                <option value="Common Service Centres">Common Service Centres (CSC)</option>
                                <option value="Mandi Operators">Mandi Operators</option>
                                <option value="Direct D2F Clients">Direct D2F Clients</option>
                                <option value="Other B2B Channel">Other B2B Channels</option>
                            </select>
                        </div>
                        <div class="form-group formElement" style="margin-bottom: 16px">
                            <label for="pan" class="form-label  formLabelTheme">Projected Business Plan</label>
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
                                        <input type="checkbox" value='Bill To Client' name="payment_term[]" checked />
                                        Bill To Client
                                    </label>
                                </div>
                                <div class="checkbox radio">
                                    <label class="check-label d-flex align-items-center" style="gap: 6px">
                                        <span class="checkmark"></span>
                                        <input type="checkbox" name="payment_term[]" value='15 days Credit Period' />
                                        15 days Credit Period
                                    </label>
                                </div>
                                <div class="checkbox radio">
                                    <label class="check-label d-flex align-items-center" style="gap: 6px">
                                        <span class="checkmark"></span>
                                        <input type="checkbox" name="payment_term[]" value='30 days Credit Period' />
                                        30 days Credit Period
                                    </label>
                                </div>
                                <div class="checkbox radio">
                                    <label class="check-label d-flex align-items-center" style="gap: 6px">
                                        <span class="checkmark"></span>
                                        <input type="checkbox" name="payment_term[]" value='Bill to Farmer' />
                                        Bill to Farmer
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group formElement" style="margin-bottom: 16px">
                            <label for="pan" class="form-label  formLabelTheme">verify </label>
                            <select class="form-control my-select2" name="verification_done_by" id="customer_type">
                                <option value="" readonly>-select-</option>
                                <option value="Verified by Calling">verified by Calling</option>
                                <option value="Verify by Visit">Verify by Visit</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button class="btn btn-primary">Verified</button>

                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
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

        var vendor_id = $(this).val();
        $('#verify_model').modal('show');
        return false;
        $.ajax({
            type: "GET",
            url: "view-vendor-details",
            data: {
                vendor_id: vendor_id
            },
            beforeSend: //reinitialize Datatables
                function() {
                    $('#name').empty()
                    $('#trans_name').empty()
                    $('#driver_nm').empty()
                    $('#cont_num').empty()
                    $('#cont_email').empty()
                    $('#acc_holder').empty()
                    $('#acc_no').empty()
                    $('#ifsc_code').empty()
                    $('#bank_name').empty()
                    $('#branch_name').empty()
                    $('#pan').empty()
                    $('#vendor_type').empty()
                    $('#decl_avl').empty()
                    $('#tds_rate').empty()
                    $('#branch_id').empty()
                    $('#gst').empty()
                    $('#gst_no').empty()
                },
            success: function(data) {

                var other_details = jQuery.parseJSON(data.view_details.other_details);
                var bank_details = jQuery.parseJSON(data.view_details.bank_details);

                $('#name').html(data.view_details.name)
                $('#trans_name').html(other_details.transporter_name)
                if (data.view_details.driver_detail == '' || data.view_details.driver_detail ==
                    null) {
                    $('#driver_nm').html('-')
                } else {
                    $('#driver_nm').html(data.view_details.driver_detail.name)
                }
                $('#cont_num').html(other_details.contact_person_number)
                $('#cont_email').html(data.view_details.email)
                $('#acc_holder').html(bank_details.acc_holder_name)
                $('#acc_no').html(bank_details.account_no)
                $('#ifsc_code').html(bank_details.ifsc_code)
                $('#bank_name').html(bank_details.bank_name)
                $('#branch_name').html(bank_details.branch_name)
                $('#pan').html(data.view_details.pan)
                $('#vendor_type').html(data.view_details.vendor_type)
                $('#decl_avl').html(data.view_details.declaration_available)
                $('#tds_rate').html(data.view_details.tds_rate)
                $('#branch_id').html(data.view_details.branch_id)
                $('#gst').html(data.view_details.gst_register)
                $('#gst_no').html(data.view_details.gst_no)
            }

        });

    });
    </script>
    @endsection