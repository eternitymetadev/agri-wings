@extends('layouts.main')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Drivers</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Update Driver</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <!-- <div class="breadcrumb-title pe-3"><h5>Update Driver</h5></div> -->
                    
                </div>
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <form class="general_form" method="POST" action="{{url($prefix.'/drivers/update-driver')}}" id="updatedriver">
                            @csrf
                            <input type="hidden" name="driver_id" value="{{$getdriver->id}}">

                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Rider Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{old('name',isset($getdriver->name)?$getdriver->name:'')}}" placeholder="Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Rider Phone<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mbCheckNm" name="phone" value="{{old('phone',isset($getdriver->phone)?$getdriver->phone:'')}}" placeholder="Phone" maxlength="10">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Rider License Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="license_number" value="{{old('license_number',isset($getdriver->license_number)?$getdriver->license_number:'')}}" placeholder="">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6 license-load">
                                    <label for="exampleFormControlInput2">Rider License File(Optional)</label>
                                    
                                    <?php if(!empty($getdriver->license_image))
                                    { 
                                        ?> 
                                        <input type="file" class="form-control licensefile" name="license_image" value="" placeholder="">

                                        <div class="image_upload"><img src="{{url("storage/images/driverlicense_images/$getdriver->license_image")}}" class="licenseshow image-fluid" id="img-tag" width="320" height="240"></div>  
                                    <?php }
                                    else{
                                        ?>  
                                        <input type="file" class="form-control licensefile" name="license_image" value="" placeholder="">

                                        <div class="image_upload"><img src="{{url("/assets/img/upload-img.png")}}" class="licenseshow image-fluid" id="img-tag" width="320" height="240"></div>
                                    <?php
                                    }
                                        ?>
                                    <?php if($getdriver->license_image!=null){ ?>
                                        <a class="deletelicenseimg d-block text-center" href="javascript:void(0)" data-action = "<?php echo URL::to($prefix.'/drivers/update-license'); ?>" data-licenseimg = "del-licenseimg" data-id="{{ $getdriver->id }}" data-name="{{$getdriver->license_image}}"><i class="red-text fa fa-trash"></i> </a>
                                    <?php } else { ?>
                                    <a href="javascript:void(0)" class="remove_licensefield" style="display: none;"><i class="red-text fa fa-trash"></i> </a>
                                    <?php } ?>
                                </div>
                            </div>
                          
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Login ID</label>
                                    <input type="text" class="form-control" name="login_id" value="{{old('login_id',isset($getdriver->login_id)?$getdriver->login_id:'')}}" placeholder="">
                                </div> 
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Password</label>
                                    <input type="text" class="form-control" name="password" value="{{old('driver_password',isset($getdriver->driver_password)?$getdriver->driver_password:'')}}" placeholder="">
                                </div> 
                            </div>

                            <input type="submit" class="mt-4 mb-4 btn btn-primary">
                            <a class="btn btn-primary" href="{{url($prefix.'/drivers') }}"> Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('models.deletedriverlicenseimagepop')
@endsection
@section('js')
<script>
    $(document).on("click",".remove_licensefield", function(e){ //user click on remove text
    var getUrl = window.location;
    var baseurl =  getUrl.origin + '/' +getUrl.pathname.split('/')[0];
    var imgurl = baseurl+'assets/img/upload-img.png';
      
      $(this).parent().children(".image_upload").children().attr('src', imgurl);
      $(this).parent().children("input").val('');
      // $(this).parent().children('div').children('h4').text('Add Image');
      // $(this).parent().children('div').children('h4').css("display", "block");
      $(this).css("display", "none");
   });

    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.licenseshow').attr('src', e.target.result);
                $(".remove_licensefield").css("display", "block");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("change",'.licensefile', function(e){
        var fileName = this.files[0].name;
        // $(this).parent().parent().find('.file_graph').text(fileName);

        readURL1(this);
    });

</script>
@endsection