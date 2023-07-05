@extends('layouts.main')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Drones</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Update Drone</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <!-- <div class="breadcrumb-title pe-3"><h5>Update Vehicle</h5></div> -->
                </div>
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <form class="general_form" method="POST" action="{{url($prefix.'/vehicles/update-vehicle')}}" id="updatevehicle">
                            @csrf
                            <input type="hidden" name="vehicle_id" value="{{$getvehicle->id}}">

                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">UIN<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="regn_no" name="regn_no" value="{{old('regn_no',isset($getvehicle->regn_no)?$getvehicle->regn_no:'')}}" placeholder="" maxlength="12">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Manufacturing year<span  class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mfg" value="{{old('mfg',isset($getvehicle->mfg)?$getvehicle->mfg:'')}}" placeholder="Mahindra, Tata, etc.">
                                </div>
                            </div>
                            <div class="form-row mb-0">                          
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Drone Model<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="make" value="{{old('make',isset($getvehicle->make)?$getvehicle->make:'')}}" placeholder="407, Supro Maxi, Truck, Pickup, Ace, etc.">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Drone Capacity(Ltrs)</label>
                                    <input type="text" class="form-control" id="gross_vehicle_weight" name="gross_vehicle_weight" value="{{old('gross_vehicle_weight',isset($getvehicle->gross_vehicle_weight)?$getvehicle->gross_vehicle_weight:'')}}" placeholder="">
                                </div>
                            </div>
                            <div class="form-row mb-0">     
                               
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
@include('models.delete-vehicle-rcimagepop')
@endsection
@section('js')
<script>
    $(document).on("click",".remove_rcfield", function(e){ //user click on remove text
    var getUrl = window.location;
    var baseurl =  getUrl.origin + '/' +getUrl.pathname.split('/')[0];
    var imgurl = baseurl+'assets/img/upload-img.png';
      
      $(this).parent().children(".image_upload").children().attr('src', imgurl);
      $(this).parent().children("input").val('');;
      // $(this).parent().children('div').children('h4').text('Add Image');
      // $(this).parent().children('div').children('h4').css("display", "block");
      $(this).css("display", "none");
   });

    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.rcshow').attr('src', e.target.result);
                $(".remove_rcfield").css("display", "block");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("change",'.rcfile', function(e){
        var fileName = this.files[0].name;
        // $(this).parent().parent().find('.file_graph').text(fileName);

        readURL1(this);
    });

</script>
@endsection