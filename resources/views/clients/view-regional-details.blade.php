@extends('layouts.main')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <div class="widget-content widget-content-area br-6">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Billing Client</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="javascript:void(0);">View Billing Client</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-9 text-right">
                    </div>
                </div>
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{isset($getregional->name)?ucfirst($getregional->name):'-'}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nick Name</th>
                                    <td>{{isset($getregional->regional_client_nick_name)?ucfirst($getregional->regional_client_nick_name):'-'}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>{{isset($getregional->phone)?ucfirst($getregional->phone):'-'}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email ID</th>
                                    <td>{{isset($getregional->email)?ucfirst($getregional->email):'-'}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Gst No.</th>
                                    <td>{{isset($getregional->gst_no)?ucfirst($getregional->gst_no):'-'}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pan</th>
                                    <td>
                                        {{isset($getregional->pan)?ucfirst($getregional->pan):'-'}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Pin Code</th>
                                    <td>
                                        {{isset($getregional->pin)?ucfirst($getregional->pin):'-'}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">city</th>
                                    <td>
                                        {{isset($getregional->city)?ucfirst($getregional->city):'-'}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">district</th>
                                    <td>
                                        {{isset($getregional->district)?ucfirst($getregional->district):'-'}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">State</th>
                                    <td>
                                        {{isset($getregional->state)?ucfirst($getregional->state):'-'}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>
                                        {{isset($getregional->address)?ucfirst($getregional->address):'-'}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Payment Term</th>
                                    <td>
                                        {{isset($getregional->payment_term)?ucfirst($getregional->payment_term):'-'}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Gst Upload</th>
                                    <td>
                                        {{isset($getregional->upload_gst)?ucfirst($getregional->upload_gst):'-'}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Pan Upload</th>
                                    <td>
                                        {{isset($getregional->upload_pan)?ucfirst($getregional->upload_pan):'-'}}
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="{{url($prefix.'/unverified-client-list')}}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection