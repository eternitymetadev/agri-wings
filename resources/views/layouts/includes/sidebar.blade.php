<ul class="list-unstyled menu-categories" id="accordionExample">
    <div class="logoBox">
        <img id="openSidebarLogo" class="toggleLogo" alt="logo" src="{{asset('assets/img/agri.png')}}">
        <img id="closeSidebarLogo" alt="logo" src="{{asset('assets/img/agri.png')}}">
    </div>


    <?php $authuser = Auth::user();
    $currentURL = url()->current();
    ?>

    <?php
    $url = URL::to('/');
    $string = request()->route()->getPrefix();
    $getprefix = str_replace('/', '', $string);
    $segment = Request::segment(2);
    $prefixurl = $url . '/' . $getprefix . '/';
    $authuser = Auth::user();
    $permissions = App\Models\UserPermission::where('user_id', $authuser->id)->pluck('permisssion_id')->ToArray();
    $submenusegment = Request::segment(3);
    // dd($permissions);
    ?>
    <div class="shadow-bottom"></div>
    <li class="menu">
        <a href="{{$prefixurl.'dashboard'}}" data-active="<?php if($segment == 'dashboard'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'dashboard')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span>Dashboard</span>
            </div>
        </a>
    </li>
    <?php
    if(!empty($permissions)){
    if(in_array('1', $permissions))
    {
    ?>
    <!-- <li class="menu">
        <a href="{{$prefixurl.'users'}}" data-active="<?php if($segment == 'users'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'users')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Users</span>
            </div>
        </a>
    </li> -->
    <?php }
    }
    ?>
    <?php
    if(!empty($permissions)){
    if(in_array('2', $permissions))
    {
    ?>
    <!-- <li class="menu">
        <a href="{{$prefixurl.'locations'}}" data-active="<?php if($segment == 'locations'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'locations')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-map-pin">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span>Branch Locations</span>
            </div>
        </a>
    </li> -->
    <?php }
    }
    ?>
    <?php
    if(!empty($permissions)){
    if(in_array('3', $permissions))
    {
    ?>
    <p class="menuHead menuHeadHidden mb-0">Masters</p>
    <!-- <li class="menu">
        <a href="{{$prefixurl.'consigners'}}" data-active="<?php if($segment == 'consigners'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'consigners')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Pilot HQ</span>
            </div>
        </a>
    </li> -->
    <?php }
    } ?>
    <?php
    if(!empty($permissions)){
    if(in_array('4', $permissions))
    {
    ?>
    <li class="menu">
        <a href="{{$prefixurl.'consignees'}}" data-active="<?php if($segment == 'consignees'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'consignees')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Farmers</span>
            </div>
        </a>
    </li>
    <?php }
    }
    ?>
    <!-- <li class="menu">
                        <a href="{{$prefixurl.'brokers'}}" data-active="<?php if($segment == 'brokers'){?>true<?php }?>" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>Brokers</span>
                            </div>
                        </a>
                    </li> -->
    <?php
    if(!empty($permissions)){
    if(in_array('5', $permissions))
    {
    ?>
    <li class="menu">
        <a href="{{$prefixurl.'drivers'}}" data-active="<?php if($segment == 'drivers'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'drivers')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Pilots</span>
            </div>
        </a>
    </li>
    <?php }
    } ?>
    <?php
    if(!empty($permissions)){
    if(in_array('6', $permissions))
    {
    ?>
    <li class="menu">
        <a href="{{$prefixurl.'vehicles'}}" data-active="<?php if($segment == 'vehicles'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'vehicles')) active @endif">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#208120;}
</style>
<path class="st0" d="M248.8,460.8c-7.7-2.4-15.8-3.9-23-7.4c-36.3-17.4-47.9-65.8-23.9-97.9c2.8-3.7,6.2-4.7,9.2-2.5
	c2.9,2.1,3.3,5.3,0.9,9.2c-0.5,0.8-1,1.6-1.5,2.4c-6.6,9.9-9.4,20.7-9,32.5c0.9,30,28.9,54.5,58.8,51.3c30.7-3.3,52-28.7,49.1-59.5
	c-1.7-17.5-10.6-30.9-25.8-40.8c-0.2,1.3-0.4,2.3-0.4,3.2c0,9.7,0.2,19.5-0.1,29.2c-0.3,12.2-7.9,22.3-19.2,25.8
	c-11.4,3.6-23.3-0.2-30.6-9.9c-4-5.3-5.5-11.4-5.4-18c0-16.1,0-32.3,0-48.4c0-26.8-18.7-45.4-45.5-45.6c-3.1,0-4.7,0.8-6.2,3.6
	c-7.8,14.8-19.7,24.9-35.3,30.8c-33,12.6-70.8-3.8-84.2-36.5c-17.6-43,12.7-90.6,59.2-91.6c26.2-0.6,46.4,11.1,59.7,33.9
	c2,3.5,4,4.8,8,4.6c27.4-0.7,47.1-22.7,44.2-49.6c-0.1-1.3-1.8-2.7-3.1-3.4c-14.6-7.8-24.8-19.5-30.9-34.8
	c-12.5-31.4,1.7-68.5,32.3-83c7.1-3.4,15.1-4.9,22.7-7.2c4.5,0,9.1,0,13.6,0c7.6,2.4,15.6,3.8,22.7,7.2c36.7,17.5,48.2,65.4,24,98
	c-6.1,8.2-13.3,14.9-22.4,19.5c-2.6,1.3-3.6,2.7-3.6,5.8c0.1,7.5,0.9,14.8,3.9,21.8c1.8,4.2,0.4,7.7-3.2,8.9
	c-3.3,1.2-6.3-0.5-8.1-4.5c-3.4-7.7-4.8-15.7-4.7-24.1c0.1-16.4,0.1-32.8,0-49.2c-0.1-10.8-8-17.8-18.1-16.3
	c-7.6,1.2-12.8,7.7-12.9,16.3c-0.1,17.2,0.1,34.4-0.1,51.6c-0.3,23.8-15,44.3-37.5,51.9c-6.4,2.1-13.6,2.9-20.4,3.1
	c-15.7,0.4-31.5,0.1-47.2,0.2c-2.6,0-5.4,0.2-7.8,1.1c-6.8,2.3-11.1,9.5-10.1,16.4c1,7.2,6.9,13.1,14.3,13.2
	c16.9,0.3,33.9,0.2,50.8,0.2c11.4,0,22.3,2.3,31.9,8.7c16.3,10.7,25.4,25.7,25.9,45.2c0.5,17.6,0.1,35.2,0.2,52.8
	c0.1,10.8,7.9,17.8,18,16.4c7.6-1.1,12.9-7.6,13-16.3c0.1-17.1-0.1-34.1,0.1-51.2c0.2-24.2,14.9-44.9,37.8-52.4
	c6.3-2.1,13.3-2.9,20-3.1c15.9-0.4,31.7-0.1,47.6-0.2c3,0,6.2-0.4,8.9-1.6c6.4-2.7,9.9-9.8,8.6-16.4c-1.3-7-7.3-12.5-14.5-12.6
	c-16.7-0.3-33.3,0.2-50-0.3c-7.4-0.2-14.7-2.1-22-3.5c-2.4-0.5-4.7-1.8-7-3c-3.4-1.8-4.6-4.9-3.2-8c1.4-3.3,4.7-4.6,8.4-2.8
	c7.4,3.5,15,5.2,23.2,5.3c3.4,0,5.2-1,6.8-4c10.3-19,26.5-30.3,47.7-33.9c32.1-5.5,64.3,14.7,73.8,45.9c12.8,42-17.8,85-61.7,85.7
	c-26.2,0.4-46.4-11.2-59.5-34.1c-2-3.4-4-4.5-7.8-4.4c-27.2,0.4-46,19.9-45.3,47.1c0.1,2.7,1.5,3.4,3.3,4.3
	c18.9,10.3,30.2,26.1,34.4,47c7.2,35.3-18.7,71.8-54.6,77c-1.3,0.2-2.6,0.6-3.8,0.9C257.9,460.8,253.3,460.8,248.8,460.8z
	 M228,163.9c0-6.5-0.1-12.5,0-18.4c0.1-5.5-0.2-11,0.5-16.4c1.9-13.1,12.4-22.2,26.2-23.2c11.8-0.8,23.6,7.5,27.1,19.5
	c1,3.4,1.3,7.1,1.4,10.6c0.2,9.1,0.1,18.2,0.1,27.6c19-9.6,30.2-35.3,25.4-57.5c-5.3-24.4-26.4-41.9-51.7-42.8
	c-24-0.9-46.3,15.4-53.2,38.8C196.8,125.5,206.6,151.1,228,163.9z M347.8,284.5c11.4,21.1,38.2,31.3,62,24.2
	c24.3-7.2,40.2-31,38.1-57.1c-1.9-24.2-22.4-45.2-46.4-48.5c-25.1-3.4-47.2,11.8-53.3,26c1.7,0,3.3,0,4.9,0
	c9.5,0.1,18.9-0.1,28.4,0.5c11.7,0.7,21.8,9.8,24.4,21.4c2.6,11.6-2.9,23.8-13.1,29.7c-5.2,3-10.7,3.7-16.5,3.8
	C366.9,284.5,357.6,284.5,347.8,284.5z M164,229.2c-9.6-18.3-35.2-31.4-59.8-24.7C78.5,211.5,62,235,64,262
	c1.9,25.2,22.6,45.8,48.8,48.7c23.3,2.6,45.3-12.6,50.9-26.2c-1.7,0-3.3,0-4.9,0c-9.9-0.1-19.7,0.2-29.6-0.5
	c-18.8-1.3-30.4-22.9-21.4-39.5c5.8-10.7,15.1-15.3,27-15.3C144.3,229.1,153.9,229.2,164,229.2z"/>
<path class="st0" d="M280,255.8c0.1,13.1-10.8,24.1-23.8,24c-13-0.1-23.5-10.8-23.5-23.8c0-13,10.6-23.7,23.6-23.8
	C269.1,232.1,279.9,242.9,280,255.8z M256.4,267.6c6.3-0.1,11.4-5.2,11.5-11.5c0.1-6.4-5.3-11.7-11.7-11.7
	c-6.5,0.1-11.6,5.4-11.5,11.9C244.9,262.6,250.1,267.6,256.4,267.6z"/>
</svg>
                <span>Drones</span>
            </div>
        </a>
    </li>
    <?php }
    } ?>
    <?php
    if(!empty($permissions)){
    if(in_array('7', $permissions))
    {
    ?>
    <?php }
    } ?>
    <?php if(!empty($permissions)){
    if(in_array('5', $permissions))
    {
    ?>
    <li class="menu">
        <a href="{{$prefixurl.'crop-list'}}" data-active="<?php if($segment == 'crop-list'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'postal-code')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Crops</span>
            </div>
        </a>
    </li>
    <?php }
    } ?>
    <!-- li class="menu">
        <a href="#consignment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'consignments') || str_contains($currentURL, 'bulklr-view')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-server">
                    <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                    <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                    <line x1="6" y1="6" x2="6.01" y2="6"></line>
                    <line x1="6" y1="18" x2="6.01" y2="18"></line>
                </svg>
                <span>Consignment</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="consignment" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'consignments/create'}}">Create Consignment
                </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'consignments'}}"> Consignment List </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'bulklr-view'}}"> Bulk Lr Download </a>
            </li>

        </ul>
    </li -->
    <p class="menuHead menuHeadHidden mb-0">Spray Scheduler</p>
    <?php if($authuser->role_id == 7){ ?>
    <li class="menu">
        <a href="{{$prefixurl.'service-booking'}}" data-active="<?php if($segment == 'order-book-ptl'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'postal-code')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span> Book Order</span>
            </div>
        </a>
    </li>
    <?php } else { ?>
        <li class="menu">
        <a href="{{$prefixurl.'order-book-ptl'}}" data-active="<?php if($segment == 'order-book-ptl'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'postal-code')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span> Book Order</span>
            </div>
        </a>
    </li>
        <?php } ?>
    <li class="menu">
        <a href="{{$prefixurl.'orders'}}" data-active="<?php if($segment == 'orders'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'postal-code')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>UnVerified Orders</span>
            </div>
        </a>
    </li>
    <li class="menu">
        <a href="{{$prefixurl.'order-list-details'}}"
            data-active="<?php if($segment == 'order-list-details'){?>true<?php }?>" class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'postal-code')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Order List</span>
            </div>
        </a>
    </li>
    <!-- <li class="menu">
        <a href="{{$prefixurl.'unverified-client-list'}}" data-active="<?php if($segment == 'unverified-client-list'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'postal-code')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Unverified Client</span>
            </div>
        </a>
        </li> -->
    <!-- <li class="menu">
        <a href="#ftl" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'order-book-ftl') || str_contains($currentURL, 'create-ftl')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-layers">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
                <span>FTL Consignment</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="ftl" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'order-book-ftl'}}"> Block LR No </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'reserve-lr'}}"> Complete Blocked LR </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'create-ftl'}}"> Create FTL LR</a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'consignments'}}"> Consignment List </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'bulklr-view'}}"> Bulk Lr Download </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'pod-view'}}"> Pod View </a>
            </li>
          
        </ul>
    </li> -->

    <!-- <li class="menu">
        <a href="#Ptl" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'order-book-ptl') || str_contains($currentURL, 'orders') || str_contains($currentURL, 'create-ptl')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-trello">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <rect x="7" y="7" width="3" height="9"></rect>
                    <rect x="14" y="7" width="3" height="5"></rect>
                </svg>
                <span>PTL Consignment</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="Ptl" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'orders'}}"> Order Booking </a>
            </li> -->
    <!-- <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'order-book-ptl'}}"> Create PTL lR</a>
            </li> -->
    <!-- <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'create-ptl'}}"> Create LR Ptl</a>
            </li> -->
    <!-- <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'consignments'}}"> Verified Orders  </a>
            </li> -->
    <!-- <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'bulklr-view'}}"> Bulk Lr Download </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'pod-view'}}"> Pod View </a>
            </li> -->

    <!-- <li class="submenuListStyle">
                <a href="#drs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    DRS 🔻
                </a>
                <ul class="collapse submenu sub-submenu list-unstyled" id="drs" data-parent="#Ptl">
                    <li>🔹 <a href="{{$prefixurl.'unverified-list'}}"> Create Drs </a></li>
                    <li>🔹 <a href="{{$prefixurl.'transaction-sheet'}}"> Drs List </a></li>
                </ul>
            </li>

            <li class="submenuListStyle">
                <a href="#hrs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    HRS 🔻
                </a>
                <ul class="collapse submenu sub-submenu list-unstyled" id="hrs" data-parent="#Ptl">
                    <li>🔹 <a href="{{$prefixurl.'hrs-list'}}"> Create Hrs </a></li>
                    <li>🔹 <a href="{{$prefixurl.'hrs-sheet'}}"> Hrs List </a></li>
                    <li>🔹 <a href="{{$prefixurl.'incoming-hrs'}}"> Incoming Hrs </a></li>
                    <li>🔹 <a href="{{$prefixurl.'outgoing-hrs'}}"> Outgoing Hrs </a></li>
                </ul>
            </li> -->
    <!-- </ul>
    </li> -->

    <?php if($authuser->role_id != 7){ ?>
    <li class="menu">
        <a href="#drs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'unverified-list') || str_contains($currentURL, 'transaction-sheet')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-trello">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <rect x="7" y="7" width="3" height="9"></rect>
                    <rect x="14" y="7" width="3" height="5"></rect>
                </svg>
                <span>Spray Service Scheduler</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="drs" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'unverified-list'}}"> Create SRS</a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'transaction-sheet'}}">SRS List</a>
            </li>
        </ul>
    </li>
    <?php } ?>

    <!-- <li class="menu">
        <a href="#hrs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'hrs-list') || str_contains($currentURL, 'hrs-sheet') || str_contains($currentURL, 'incoming-hrs')  || str_contains($currentURL, 'outgoing-hrs')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-trello">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <rect x="7" y="7" width="3" height="9"></rect>
                    <rect x="14" y="7" width="3" height="5"></rect>
                </svg>
                <span>HRS</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="hrs" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'hrs-list'}}"> Create Hrs</a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'hrs-sheet'}}">Hrs List</a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'incoming-hrs'}}"> Incoming Hrs</a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'outgoing-hrs'}}">Outgoing Hrs</a>
            </li>
        </ul>
    </li> -->

    <?php if($authuser->role_id == 1 || $authuser->role_id ==2 || $authuser->role_id ==3 || $authuser->role_id ==4){ ?>
    <!-- <li class="menu">
        <a href="#prs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'prs') || str_contains($currentURL, 'driver-tasks') || str_contains($currentURL, 'vehicle-receivegate')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-archive">
                    <polyline points="21 8 21 21 3 21 3 8"></polyline>
                    <rect x="1" y="3" width="22" height="5"></rect>
                    <line x1="10" y1="12" x2="14" y2="12"></line>
                </svg>
                <span>PRS</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="prs" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'prs'}}"> Create Prs </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'driver-tasks'}}"> Driver Task </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'vehicle-receivegate'}}"> Hub Receiving </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'pickup-loads'}}">Pickup Load List </a>
            </li>

        </ul>
    </li> -->
    <?php }
   if($authuser->role_id == 2 || $authuser->role_id ==3 || $authuser->role_id ==5){ ?>
    <!-- <p class="menuHead menuHeadHidden mb-0">Payments</p>
    <li class="menu">
        <a href="{{$prefixurl.'vendor-list'}}" data-active="<?php if($segment == 'vendor-list'){?>true<?php }?>"
            class="dropdown-toggle">
            <div class="@if(str_contains($currentURL, 'drivers')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Vendors</span>
            </div>
        </a>
    </li> -->

    <!-- <li class="menu">
        <a href="#drsPayments" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'drs-paymentlist') || str_contains($currentURL, 'request-list') || str_contains($currentURL, 'payment-report-view') || str_contains($currentURL, 'drswise-report')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-dollar-sign">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg>
                <span>DRS Payments</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a> 
        <ul class="collapse submenu list-unstyled" id="drsPayments" data-parent="#accordionExample"> -->
    <!-- <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'vendor-list'}}"> Vendor List </a>
            </li> -->
    <!-- <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'drs-paymentlist'}}"> Create Payments </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'request-list'}}"> Transaction Status </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'payment-report-view'}}">Report -Transaction Id </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'drswise-report'}}">Payment Report-DRS Id</a>
            </li>

        </ul>
    </li> -->

    <!-- <li class="menu">
        <a href="#hrsPayments" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'hrs-payment-list')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-dollar-sign">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg>
                <span>HRS Payments</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="hrsPayments" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'hrs-payment-list'}}"> Create Payment </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'hrs-request-list'}}"> Request List </a>
            </li>
        </ul>
    </li> -->
    <!-- <li class="menu">
        <a href="#prsPayments" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'prs-paymentlist')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-dollar-sign">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg>
                <span>PRS Payments</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="prsPayments" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'prs-paymentlist'}}"> Create Payment </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'prs-request-list'}}"> Request List </a>
            </li>

        </ul>
    </li> -->
    <?php } ?>

    <!-- <p class="menuHead menuHeadHidden mb-0">Reports</p>

    <li class="menu">
        <a href="#misReports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'consignment-misreport') || str_contains($currentURL, 'consignment-report2')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-clipboard">
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                </svg>
                <span>MIS Reports</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="misReports" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'consignment-misreport'}}"> Mis Report 1 </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'consignment-report2'}}"> Mis Report 2 </a>
            </li>
        </ul>
    </li> -->


    <!-- <li class="menu">
        <a href="#accountReports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'pod-view')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-clipboard">
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                </svg>
                <span>Account Reports</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="accountReports" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'pod-view'}}"> Pod View </a>
            </li>
        </ul>
    </li> -->

    <!-- <li class="menu">
        <a href="#vendors" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'vendor-list') || str_contains($currentURL, 'drs-paymentlist') || str_contains($currentURL, 'request-list') || str_contains($currentURL, 'payment-report-view') || str_contains($currentURL, 'drswise-report')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-dollar-sign">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg>
                <span>Payments</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="vendors" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'vendor-list'}}"> Vendors </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'drs-paymentlist'}}"> Create Payments </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'request-list'}}"> Transaction Status </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'payment-report-view'}}">Payment Report
                    -Transaction Id wise </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'drswise-report'}}">Payment Report - DRS id
                    wise </a>
            </li>

        </ul>
    </li> -->

    <!-- <li class="menu">
        <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'consignment-misreport') || str_contains($currentURL, 'consignment-report2')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-clipboard">
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                </svg>
                <span>Reports</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="reports" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'postal-code'}}"> Pin Code </a>
            </li>
        </ul>
    </li> -->
    <?php if($authuser->role_id == 1){ ?>
    <!-- <li class="menu">
        <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'users') || str_contains($currentURL, 'roles') || str_contains($currentURL, 'permissions')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>System Settings</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right submenuArrow">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'users'}}"> All Users </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'roles'}}"> All Roles </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'permissions'}}"> All Permissions </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'clients'}}"> Clients </a>
            </li>
        </ul>
    </li> -->
    <?php } if($authuser->role_id == 1 || $authuser->role_id == 3){ ?>
    <li class="menu">
        <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'bulk-import') || str_contains($currentURL, 'branch-address')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-clipboard">
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                </svg>
                <span>System Settings</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu " id="forms" data-parent="#accordionExample">
            <!-- <li>
                <div class="submenuListStyle"></div><a href="{{url($prefix.'/bulk-import')}}"> Import Data </a>
            </li> -->
            <?php if($authuser->role_id == 1){ ?>
            <li>
                <div class="submenuListStyle"></div><a href="{{url($prefix.'/settings/branch-address')}}">Company Setup
                </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{url($prefix.'/users')}}">All Users</a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{url($prefix.'/locations')}}">Service Hub </a>
            </li>
            <?php } if($authuser->role_id == 1 || $authuser->role_id == 3){ ?>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'clients'}}"> Base Clients </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'reginal-clients'}}"> Regional Client </a>
            </li>
            <?php } ?>

        </ul>
    </li>
    <?php } if($authuser->role_id == 1 || $authuser->role_id == 3 || $authuser->role_id == 5){ ?>
    <li class="menu">
        <a href="#billing_client" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div
                class="@if(str_contains($currentURL, 'bulk-import')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-clipboard">
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                </svg>
                <span>Billing Client Module</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
        <ul class="collapse submenu " id="billing_client" data-parent="#accordionExample">
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'clients'}}"> Base Clients </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'reginal-clients'}}"> Billing Client </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'unverified-client-list'}}">Unverified Client
                </a>
            </li>
            <li>
                <div class="submenuListStyle"></div><a href="{{$prefixurl.'verified-client-list'}}">Verified Client </a>
            </li>

        </ul>
    </li>
    <?php } ?>

</ul>