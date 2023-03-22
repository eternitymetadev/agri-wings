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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Riders</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Create Rider</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <!-- <div class="breadcrumb-title pe-3"><h5>Create Driver</h5></div> -->
                </div>
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <form class="general_form" method="POST" action="{{url($prefix.'/drivers')}}" id="createdriver">    
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Rider Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Rider Phone<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mbCheckNm" name="phone" placeholder="Phone" maxlength="10">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Rider License Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="license_number" placeholder="">
                                </div>
                                
                            </div>
                            
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Rider License File(Optional)</label>
                                    <input type="file" class="form-control license_image" name="license_image" accept="image/*">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="image_upload"><img src="{{url("/assets/img/upload-img.png")}}" class="licenseshow image-fluid" id="img-tag" width="320" height="240"></div>
                                </div> 
                            </div>
                            <h5 class="form-row mb-2">Login Details</h5>
                            <div class="form-row mb-0">
                            <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Login Id</label> 
                                    <input type="text" class="form-control" name="login_id" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="">
                                </div> 
                            </div>
                            <button type="submit" class="mt-4 mb-4 btn btn-primary">Submit</button>
                            <a class="btn btn-primary" href="{{url($prefix.'/drivers') }}"> Back</a>
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
    $(document).on("click",".remove_licensefield", function(e){ //user click on remove text
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
                $('.licenseshow').attr('src', e.target.result);
                $(".remove_licensefield").css("display", "block");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("change",'.license_image', function(e){
        var fileName = this.files[0].name;
        // $(this).parent().parent().find('.file_graph').text(fileName);

        readURL1(this);
    });

</script>
@endsection