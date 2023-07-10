@extends('layouts.main')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Farmer</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);"> Update
                                Farmer</a></li>
                    </ol>
                </nav>
            </div>
            <div class="widget-content widget-content-area br-6">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <!-- <div class="breadcrumb-title pe-3"><h5>Update Consignee</h5></div> -->

                </div>
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <form class="general_form" method="POST"
                            action="{{url($prefix.'/consignees/update-consignee')}}" id="updateconsignee">
                            @csrf
                            <input type="hidden" name="consignee_id" value="{{$getconsignee->id}}">

                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Farmer Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="farmer_name"
                                        value="{{old('nick_name',isset($getconsignee->nick_name)?$getconsignee->nick_name:'')}}"
                                        placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Mobile No.<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control mbCheckNm" name="phone"
                                        value="{{old('phone',isset($getconsignee->phone)?$getconsignee->phone:'')}}"
                                        placeholder="Phone" maxlength="10">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Pincode</label>
                                    <input type="text" class="form-control reuiredInput" id="postal_code" name="postal_code"
                                        value="{{old('postal_code',isset($getconsignee->postal_code)?$getconsignee->postal_code:'')}}"
                                        placeholder="Pincode" maxlength="6">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">Village/City</label>
                                    <input type="text" class="form-control reuiredInput" id="city" name="city"
                                        value="{{old('city',isset($getconsignee->city)?$getconsignee->city:'')}}"
                                        placeholder="City">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput2">District</label>
                                    <input type="text" class="form-control reuiredInput" id="district" name="district"
                                        value="{{old('district',isset($getconsignee->district)?$getconsignee->district:'')}}"
                                        placeholder="District">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Select State</label>
                                    <input type="text" class="form-control reuiredInput" id="state" name="state_id"
                                        value="{{old('state_id',isset($getconsignee->state_id)?$getconsignee->state_id:'')}}"
                                        placeholder="" readonly>

                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-8">
                                    <label for="exampleFormControlInput2">Address</label>
                                    <textarea type="text" class="form-control reuiredInput" name="address_line1"
                                        placeholder="">{{old('address_line1',isset($getconsignee->address_line1)?$getconsignee->address_line1:'')}}</textarea>
                                </div>
                            </div>
                            <h4>Add Farm Address</h3>
                                <table id="myTable">
                                    <tbody>
                                        <tr>
                                            <th><label for="exampleFormControlInput2">Farm<span
                                                        class="text-danger">*</span></label></th>
                                            <th><label for="exampleFormControlInput2">Pin Code<span
                                                        class="text-danger">*</span></label></th>
                                            <th><label for="exampleFormControlInput2">City<span
                                                        class="text-danger">*</span></label></th>
                                            <th><label for="exampleFormControlInput2">Address<span
                                                        class="text-danger">*</span></label></th>
                                        </tr>
                                        <?php 
                                    $i=0;
                                    foreach($getconsignee->Farm as $key=>$farm){ 
                                        ?>
                                        <tr class="rowcls">
                                            <input type="hidden" name="data[{{$i}}][hidden_id]"
                                                value="{!! $farm->id !!}">
                                            <td>
                                                <input type="text" class="form-control name reuiredInput"
                                                    name="data[{{$i}}][field_area]" placeholder=""
                                                    value="{{old('field_area',isset($farm->field_area)?$farm->field_area:'')}}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control name reuiredInput"
                                                    name="data[{{$i}}][pin_code]" placeholder=""
                                                    value="{{old('pin_code',isset($farm->pin_code)?$farm->pin_code:'')}}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control name reuiredInput" name="data[{{$i}}][city]"
                                                    placeholder=""
                                                    value="{{old('city',isset($farm->city)?$farm->city:'')}}">
                                            </td>
                                            <td>
                                                <textarea type="text" class="form-control name reuiredInput"
                                                    name="data[{{$i}}][address]"
                                                    placeholder="">{{$farm->address}}</textarea>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-primary" id="addRow"
                                                    onclick="addrow()"><i class="fa fa-plus-circle"></i></button>

                                                @if($i>0)
                                                <!-- <button type="button" class="btn btn-danger removeRow delete_client"><i class="fa fa-minus-circle"></i></button> -->

                                                <button type="button" class="btn btn-danger delete_client" data-id=""
                                                    data-action="<?php echo URL::to($prefix.'/clients/delete-client'); ?>"><i
                                                        class="fa fa-minus-circle"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>

                                <input type="submit" class="mt-4 mb-4 btn btn-primary" value="Update">
                                <a class="btn btn-warning" href="{{url($prefix.'/consignees') }}"> Back</a>
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
jQuery(document).ready(function() {
    setErrorState();
});

$('.reuiredInput').change(function() {
    setErrorState()
});


function setErrorState() {
    $('.reuiredInput').each(function() {
        if ($(this).val() == '') {
            $(this).css('border', '1px solid red');
        } else {
            $(this).css('border', '1px solid #bfc9d4');
        }
    })
}
function addrow() {
    var i = $('.rowcls').length;
    i = i + 1;
    var rows = '';
    rows += '<tr class="rowcls">';
    rows += '<td>';
    rows += '<input type="text" class="form-control name" name="data[' + i + '][field_area]" placeholder="">';
    rows += '</td>';
    rows += '<td>';
    rows += '<input type="text" class="form-control name" name="data[' + i +
        '][pin_code]" placeholder="">';
    rows += '</td>';
    rows += '<td>';
    rows += '<input type="text" class="form-control name" name="data[' + i +
        '][city]" placeholder="">';
    rows += '</td>';
    rows += '<td>';
    rows += '<textarea type="text" class="form-control name" name="data[' + i +
        '][address]" placeholder=""></textarea>';
    rows += '</td>';
    rows += '<td>';
    rows += '<button type="button" class="btn btn-danger removeRow"><i class="fa fa-minus-circle"></i></button>';
    rows += '</td>';
    rows += '</tr>';
    $('#myTable tbody').append(rows);
}
</script>
@endsection