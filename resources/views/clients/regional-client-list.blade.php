@extends('layouts.main')
@section('content')
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
<!-- END PAGE LEVEL CUSTOM STYLES -->
<style>
.dt--top-section {
    margin: none;
}

div.relative {
    position: absolute;
    left: 110px;
    top: 24px;
    z-index: 1;
    width: 83px;
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
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{'clients'}}">Clients</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Billing
                                Client List</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div style="margin-left:9px;" class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="ms-auto">
                    </div>
                </div>
                <div class="table-responsive mb-4 mt-4">
                    @csrf
                    <table id="clienttable" class="table table-hover get-datatable" style="width:100%">
                        <div class="btn-group relat">
                            <a href="{{'create-regional-client'}}" class="btn btn-primary pull-right"
                                style="margin-left:7px;">Create Billing Client</a>
                        </div>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Location Id</th>
                                <th>Gst</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(count($regclients)>0) {
                                    foreach ($regclients as $key => $value) {  

                                        if($value->verified_by == 0){
                                            $status = 'Unverified';
                                        }else{
                                            $status = 'Verified';
                                        }
                                ?>
                            <tr>
                                <td>{{ $value->id ?? "-" }}</td>
                                <td>
                                    <a
                                        href="{{url($prefix.'/'.$segment.'/add-regclient-detail/'.Crypt::encrypt($value->id))}}">{{ ucwords($value->name ?? "-")}}</a>
                                </td>
                                <td>{{$value->Location->name ?? "-"}}</td>
                                <td>{{$value->gst_no ?? "-"}}</td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{url($prefix.'/regclient-detail/'.Crypt::encrypt($value->id).'/edit')}}"><span><i
                                                class="fa fa-edit" aria-hidden="true"></i> Edit<span></a>
                                                <button type="button" class="btn btn-sm btn-primary view"
                                        value="{{$value->id}}">View</button>
                                </td>

                                <td>{{$status}}</td>
                            </tr>
                            <?php 
                                    }
                                } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<!---------- View Vendor Modal -------------------------->
<div class="modal fade bd-example-modal-xl" id="view_client" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                <div class="statbox widget box box-shadow">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Client Name</th>
                                <td id="name">
                                </td>
                                <th scope="row">Regional Client Name</th>
                                <td id="regional_client_name">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Regional Client Nick Name*</th>
                                <td id="regional_client_nick">

                                </td>
                                <th scope="row">Email</th>
                                <td id="email">

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td id="phone">
                                </td>
                                <th scope="row">Pin Code</th>
                                <td id="pin_code">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td id="city">
                                </td>
                                <th scope="row">District</th>
                                <td id="district">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">State</th>
                                <td id="bank_name">
                                </td>
                                <th scope="row">Address</th>
                                <td id="branch_name">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">GST Number</th>
                                <td id="pan">
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">PAN</th>
                                <td id="vendor_type">
                                </td>
                                <th scope="row">Declaration Available</th>
                                <td id="decl_avl">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    
            </div>

            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
$(document).on('click', '.view', function() {

    var vendor_id = $(this).val();
    $('#view_client').modal('show');
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
            if(data.view_details.driver_detail == '' || data.view_details.driver_detail == null){
            $('#driver_nm').html('-')
            }else{
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