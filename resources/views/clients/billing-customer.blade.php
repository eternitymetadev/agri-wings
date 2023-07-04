@extends('layouts.main')
@section('content')
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
<!-- END PAGE LEVEL CUSTOM STYLES -->
<style>
<style>.dt--top-section {
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

div.relat {
    position: absolute;
    left: 110px;
    top: 24px;
    z-index: 1;
    width: 240px;
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
</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Billing Client Module</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Billing Customer</a></li>
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
                        <!-- <div class="btn-group relat">
                            <a href="{{'clients/create'}}" class="btn btn-primary pull-right">Create Client</a>
                            <a href="{{'reginal-clients'}}" class="btn btn-primary pull-right"
                                style="margin-left:7px;">Regional Client List</a>
                        </div> -->
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>No of Client Linked</th>
                                <th>No of Orders</th>
                                <th>Pin Code</th>
                                <th>Distt</th>
                                <th>State</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($billing_customers as $billing_customer)
                           <tr>
                            <td>{{$billing_customer->GetFarmer->nick_name}}</td>
                            <?php
                                $client_count = App\Models\BillingCustomer::where('customer_id', $billing_customer->customer_id)->count();

                                $order_count = App\Models\ConsignmentNote::where('consignee_id', $billing_customer->customer_id)->count();
                            ?>
                            <td>{{$client_count}}</td>
                            <td>{{$order_count}}</td>
                            <td>{{$billing_customer->GetFarmer->postal_code}}</td>
                            <td>{{$billing_customer->GetFarmer->district}}</td>
                            <td>{{$billing_customer->GetFarmer->state_id}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection