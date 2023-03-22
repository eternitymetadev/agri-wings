@extends('layouts.main')
@section('content')
<style>
     .row.layout-top-spacing {
    width: 80%;
    margin: auto;
}
    </style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Drones</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Create Drone</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <!-- <div class="breadcrumb-title pe-3"><h5>Create Vehicle</h5></div> -->
                </div>
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <form class="general_form" method="POST" action="{{url($prefix.'/vehicles')}}" id="createvehicle">
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Drone Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="regn_no" name="regn_no" placeholder="" maxlength="12">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Manufacturer<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mfg" placeholder="Mahindra, Tata, etc.">
                                </div>
                            </div>
                            <div class="form-row mb-0">                          
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Make<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="make" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Engine No.<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="engine_no" placeholder="">
                                </div>
                            </div>
                            <div class="form-row mb-0">     
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Drone Capacity</label>
                                    <input type="text" class="form-control" id="gross_vehicle_weight" name="gross_vehicle_weight" placeholder="">
                                </div>
                            </div>
                            
                            <button type="submit" class="mt-4 mb-4 btn btn-primary">Submit</button>
                            <a class="btn btn-primary" href="{{url($prefix.'/vehicles')}}"> Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.rcshow').attr('src', e.target.result);
                // $(".remove_licensefield").css("display", "block");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("change",'.rc_image', function(e){
        var fileName = this.files[0].name;
        readURL1(this);
    });


</script>
@endsection