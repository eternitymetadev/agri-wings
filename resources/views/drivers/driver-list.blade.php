@extends('layouts.main')
@section('content')
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
<!-- END PAGE LEVEL CUSTOM STYLES -->
<style>
        .dt--top-section {
    margin:none;
}
div.relative {
    position: absolute;
    left: 269px;
    top: 24px;
    z-index: 1;
    width: 83px;
    height: 35px;
}
/* .table > tbody > tr > td {
    color: #4361ee;
} */
.dt-buttons .dt-button {
    width: 83px;
    height: 38px;
    font-size: 13px;
}
.btn-group > .btn, .btn-group .btn {
    padding: 0px 0px;
    padding: 10px;
}
div.relat {
    position: absolute;
    left: 181px;
    top: 23px;
    z-index: 1;
    width: 83px;
    height: 35px;
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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Riders</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Rider List</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    @csrf
                    <table id="drivertable" class="table table-hover" style="width:100%">
                        <div class="btn-group relative">
                            <a class="btn-primary btn-cstm btn w-100" id="add_role" href="{{'drivers/create'}}" style="font-size: 12px; padding: 8px 0px;"><span><i class="fa fa-plus" ></i> Add New</span></a>
                        </div>
                        <?php $authuser = Auth::user();
                        if($authuser->role_id ==1 ){ ?>
                        <div class="btn-group relat">
                            <a style="font-size: 12px; padding: 8px 0px;" href="<?php echo URL::to($prefix.'/'.$segment.'/export/excel'); ?>" class="downloadEx btn btn-primary pull-right" data-action="<?php echo URL::to($prefix.'/'.$segment.'/export/excel'); ?>" download>
                            <span><i class="fa fa-download"></i> Export</span></a>
                        </div>
                        <?php } ?>
                        <thead>
                            <tr>
                                <th>Rider Name</th>
                                <th>Rider Phone</th>
                                <th>Rider License Number</th>
                                <th>Image</th>
                                <th>Action</th>
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

@include('models.delete-driver')
@endsection
@section('js')
<script>
var table = $('#drivertable').DataTable({
    processing: true,
    serverSide: true,
    
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Results :  _MENU_",
        },

        "stripeClasses": [],
        "pageLength": 30,
        drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered'); },

    columns: [
        {data: 'name', name: 'name'},
        {data: 'phone', name: 'phone'},
        {data: 'license_number', name: 'license_number'},
        {data: 'licence', name: 'licence'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
        
    ]
});
</script>
@endsection