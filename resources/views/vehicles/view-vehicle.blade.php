@extends('layouts.main')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Drone</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">View Drone</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <!-- <div class="breadcrumb-title pe-3"><h5>Vehicle Details</h5></div> -->
                    <div class="col-md-9 text-right">
                        <!-- <a href="{{url($prefix.'/vehicles/'.Crypt::encrypt($getvehicle->id).'/edit')}}" class="btn my-3" href="" style="background:#fff;" title="Edit Consignee"><i class="fa fa-edit m-0"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">UIN</th>
                                    <td>{{isset($getvehicle->regn_no)?ucfirst($getvehicle->regn_no):'-'}} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Manufacturing Year</th>
                                    <td>{{isset($getvehicle->mfg)?ucfirst($getvehicle->mfg):'-'}} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Drone Model</th>
                                    <td>
                                        {{isset($getvehicle->make) ? ucfirst($getvehicle->make) : "-" }}
                                    </td>
                                </tr>
                                    
                            </tbody>
                        </table>  
                        <a href="{{url($prefix.'/vehicles/'.Crypt::encrypt($getvehicle->id).'/edit')}}" class="btn btn-primary my-3" style="background:#fff;" title="Edit Consignee"><i class="fa fa-edit m-0"> Edit</i></a>
                        <a class="btn btn-primary" href="{{url($prefix.'/vehicles') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection