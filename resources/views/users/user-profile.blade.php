@extends('layouts.main')
@section('page-heading')My Account @endsection

@section('content')

<style>
.accountCard {
    position: relative;
    background: #20812024;
    border-radius: 20px;
    padding: 1rem 1rem 2.5rem;
    max-width: 768px;
    display: flex;
    gap: 1rem;
    width: 70%;
}

.farmerIcon {
    height: 150px;
    width: 150px;
    background: aliceblue;
    padding: 8px;
    border-radius: 10px;
}

.farmerIcon img {
    max-width: 100%;
    border-radius: 5px;
}

p.name {
    font-size: 28px;
}

.contactInfo {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    align-items: center;
}
.contactInfo svg {
    height: 16px;
    height: 16px;
}

.addressInfo {
    text-indent: 1rem;
    font-size: 16px;
    font-weight: 600;
}

.passwordToggle {
    position: absolute;
    bottom: 8px;
    right: 27px;
    font-weight: 700;
    color: var(--primaryColor);
    cursor: pointer;
}

.changePasswordBlock {
    width: 30%;
    max-width: 450px
}

.form-group {
    min-height: 54px
}

.form-row {
    padding: 1rem;
    border-radius: 12px;
    box-shadow: 0 0 3px #83838360;
    margin-bottom: 1rem;
}

.form-row h6 {
    margin-bottom: 1rem;
    font-weight: 700;
}

@media(max-width:600px) {
    .accountCard {
        width: 100%;
        max-width: 6000px
    }

    .changePasswordBlock {
        width: 100%;
        max-width: 6000px
    }
}
</style>

<div class="layout-px-spacing">
    <div class="page-header layout-spacing">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">My Account</a>
                </li>
            </ol>
        </nav>
    </div>


    <div class="row layout-top-spacing align-items-start"
        style="margin: 2rem auto 2rem 0; justify-content: space-evenly; flex-wrap: wrap">
        <div class="accountCard">
            <div class="farmerIcon">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                    alt="farmer Image" class="" />
            </div>

            <div class="farmerInfo">
                <p class="name"><strong>Sahil Thakur</strong></p>
                <div class="contactInfo">
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-phone">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg><strong>+91-9876543210</strong></p>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-mail">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg><strong>email@your.com</strong></p>
                </div>

                <p class="legalInfo">Company Name : <strong>Company Name</strong></p>
                <p class="legalInfo">GST Number : <strong>06ECKPKL5705G01ZL</strong></p>
                <p class="legalInfo">PAN Number : <strong>ECKPK5705G</strong></p>

                <span><strong>Address</strong></span>
                <p class="addressInfo">#203, Industrial Area, Phase 5, Mohali - 160062</p>


                <p class="passwordToggle" onclick="toggleForm()">Change Password ? </p>

            </div>
        </div>

        <div class="changePasswordBlock">
            <form class="general_form" method="POST" action="{{url($prefix.'/store-service-booking')}}"
                id="changePasswordForm" style="margin: auto; display: none;">
                <div style="flex:1; align-content: flex-start; justify-content: center">
                    <div class="form-row justify-content-center" style="min-height: 340px; align-content: flex-start">
                        <h6 class="col-12">Change Password </h6>
                        <div class="form-group col-12 px-1">
                            <Input type="password" class="form-control" id="current_password" name="current_password"
                                placeholder="Old Password" />
                        </div>
                        <div class="form-group col-12 px-1">
                            <Input type="password" class="form-control" id="new_password" name="new_password"
                                placeholder="New Password" />
                        </div>
                        <div class="form-group col-12 px-1">
                            <Input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="Confirm New Password" />
                        </div>

                        <div class="col-12 d-flex justify-content-end align-items-center" style="gap: 1rem;">
                            <a class="mt-2 btn" href="{{url($prefix.'/consignments') }}"> Reset</a>
                            <button type="submit" class="mt-2 btn btn-primary disableme">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
const toggleForm = () => {
    $('#changePasswordForm').toggle();
    $('#changePasswordForm')[0].reset();
}
</script>

< @endsection