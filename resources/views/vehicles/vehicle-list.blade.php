@extends('layouts.main')
@section('content')
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
<!-- END PAGE LEVEL CUSTOM STYLES -->    
<style>
div.relative {
    position: absolute;
    left: 276px;
    top: 24px;
    z-index: 1;
    width: 95px;
    height: 34px;
}
div.relat {
    position: absolute;
    left: 173px;
    top: 24px;
    z-index: 1;
    width: 95px;
    height: 34px;
}

</style>
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Drones</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Drone List</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="mb-4 mt-4">
                    @csrf
                    <table id="vehicletable" class="table table-hover vehicle-datatable table-responsive" style="width:100%">
                        <div class="btn-group relative">
                            <a href="{{'vehicles/create'}}" class="btn btn-primary pull-right" style="font-size: 12px; padding: 8px 0px;"><span><i class="fa fa-plus" ></i> Add New</span></a>
                        </div>
                        <?php $authuser = Auth::user();
                        if($authuser->role_id ==1 || $authuser->role_id ==3){ ?>
                        <div class="btn-group relat">
                            <a style="font-size: 12px; padding: 8px 0px;" href="<?php echo URL::to($prefix.'/'.$segment.'/export/excel'); ?>" class="downloadEx btn btn-primary pull-right" data-action="<?php echo URL::to($prefix.'vehicles/export/excel'); ?>" download>
                            <span><i class="fa fa-download"></i> Export</span></a>
                        </div>
                        <?php } ?>
                        <thead>
                            <tr>
                                <th>AgriWings Code</th>
                                <th>Dron Model</th>
                                <th>UIN</th>
                                <th>Manufacturing Year</th>
                                <th>Drone Capacity(Ltrs)</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('models.delete-vehicle')
@endsection
@section('js')
<script>
    $(document).ready(function(){
        var table = $('#vehicletable').DataTable({
            processing: true,
            serverSide: true,
            "pageLength": 100,
            ajax: "{{ url('vehicles/list') }}",

            columns: [
                {data: 'drone_code', name: 'drone_code'},
                {data: 'make', name: 'make'},
                {data: 'regn_no', name: 'regn_no'},
                {data: 'mfg', name: 'mfg'},
                {data: 'gross_vehicle_weight', name: 'gross_vehicle_weight'},
                // {data: 'rc_image', name: 'rc_image'},
                // {data: 'action', name: 'action', orderable: false, searchable: false}
                
            ]
        });
    });
</script>

@endsection