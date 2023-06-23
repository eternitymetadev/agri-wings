<?php  $authuser = Auth::user(); ?>
<div class="custom-table">
    <table class="table mb-3" style="width:100%">
        <thead>
            <tr>
                <th> </th>
                <th>Order Details</th>
                <!-- <th>Route(Serving Branch/Farmer)</th> -->
                <th>Booking Details</th>
                <th>Service Receiver Details</th>
                <th>Dates</th>
                <!-- <?php if($authuser->role_id !=6){ ?>
                <th>Print Order</th>
                <?php }else {?>
                <th></th>
                <?php }?> -->
                <th>Spray Status</th>
                <th>Order Status</th>
                <th>Payment Status</th>
                <th>Invoice Status</th>
                <?php if($authuser->role_id == 3){
                    ?>
                     <th>Action</th>
                <?php } ?>
               
            </tr>
        </thead>
        <tbody id="accordion" class="accordion">
            @if(count($consignments)>0)
            @foreach($consignments as $consignment)
            <tr>
                <td class="card-header collapsed" id="{{$consignment->id}}" data-toggle="collapse"
                    href="#collapse-{{$consignment->id}}" data-jobid="{{$consignment->job_id}}"
                    data-action="<?php echo URL::to($prefix.'/get-jobs'); ?>"
                    onClick="row_click(this.id,this.getAttribute('data-jobid'),this.getAttribute('data-action'))">

                </td>
                <td>
                    <div class="">
                        <div class=""><span style="color:#4361ee;">Order No: </span>{{$consignment->id}}<span
                                class="badge bg-cust">{{ $consignment->VehicleDetail->regn_no ?? " " }}</span>
                        </div>


                        <div class="css-16pld73 ellipse2"><span style="color:#4361ee;">Acreage:
                            </span>{{ $consignment->total_acerage ?? "-" }}</div>
                        <div class="css-16pld73 ellipse2"><span style="color:#4361ee;">Total Amount:
                            </span>{{ $consignment->total_amount ?? "-" }}</div>

                    </div>
                </td>
                <td>

                    <!-- relocate cnr cnee check for sale to return case -->
                    <!-- <?php 
                if($consignment->is_salereturn == 1){
                    $cnr_nickname = @$consignment->ConsigneeDetail->nick_name;
                    $cne_nickname = @$consignment->ConsignerDetail->nick_name;
                }else{
                    $cnr_nickname = @$consignment->ConsignerDetail->nick_name;
                    $cne_nickname = @$consignment->ConsigneeDetail->nick_name;
                } ?>
                    <ul class="ant-timeline">
                        <li class="ant-timeline-item  css-b03s4t">
                            <div class="ant-timeline-item-tail"></div>
                            <div class="ant-timeline-item-head ant-timeline-item-head-green"></div>
                            <div class="ant-timeline-item-content">
                                <div class="css-16pld72 ellipse">
                                    {{ $consignment->Branch->name ?? "-" }}
                                </div>
                            </div>
                        </li>
                        <li class="ant-timeline-item ant-timeline-item-last css-phvyqn">
                            <div class="ant-timeline-item-tail"></div>
                            <div class="ant-timeline-item-head ant-timeline-item-head-red"></div>
                            <div class="ant-timeline-item-content">
                                <div class="css-16pld72 ellipse">
                                    {{ @$cne_nickname ?? "-" }}
                                </div>
                                <div class="css-16pld72 ellipse" style="font-size: 12px; color: rgb(102, 102, 102);">
                                <?php if($consignment->is_salereturn == '1'){ ?>
                                    <span>{{ @$consignment->ConsignerDetail->postal_code ?? "" }},
                                        {{ @$consignment->ConsignerDetail->city ?? "" }},
                                        {{ @$consignment->ConsignerDetail->district ?? "" }} </span>
                                        <?php }else{ ?>
                                            <span>{{ @$consignment->ConsigneeDetail->postal_code ?? "" }},
                                            {{ @$consignment->ConsigneeDetail->city ?? "" }},
                                            {{ @$consignment->ConsigneeDetail->district ?? "" }} </span>
                                            <?php } ?>
                                </div>
                            </div>
                        </li>
                    </ul> -->
                    <div class="">
                        <div class=""><span style="color:#4361ee;">BOOKING PARTNER:
                            </span>{{ $consignment->RegClient->name ?? "-" }}
                        </div>
                        <div class="css-16pld73 ellipse2"><span style="color:#4361ee;">BILLING CLIENT:
                            </span>{{ $consignment->BillingClient->name ?? "-" }}</div>

                    </div>
                </td>
                <td>
                    <div class="">
                        <div class=""><span style="color:#4361ee;">Service Receiver:
                            </span>{{$consignment->ConsigneeDetail->nick_name ?? "-"}}
                        </div>
                        <div class="css-16pld73 ellipse2"><span style="color:#4361ee;">District:
                            </span>{{ $consignment->ConsigneeDetail->district ?? "-"}}</div>
                        <div class="css-16pld73 ellipse2"><span style="color:#4361ee;">State:
                            </span>{{ $consignment->ConsigneeDetail->state_id ?? "-"}}</div>
                        <div class="css-16pld73 ellipse2"><span style="color:#4361ee;">Pin Code:
                            </span>{{ $consignment->ConsigneeDetail->postal_code ?? "-"}}</div>

                    </div>
                </td>
                <td>
                    <div class="">
                        <div class=""><span style="color:#4361ee;">ORD:
                            </span>{{ Helper::ShowDayMonthYear($consignment->consignment_date) ?? '-' }}</div>
                        <div class=""><span style="color:#4361ee;">SD:
                            </span>{{ Helper::ShowDayMonthYear($consignment->edd) ?? '-' }}</div>
                        <div class=""><span style="color:#4361ee;">ADD:
                            </span>{{ Helper::ShowDayMonthYear($consignment->delivery_date) ?? '-' }}</div>
                    </div>
                </td>
                <!-- <td><a
                        href="{{url($prefix.'/consignments/'.$consignment->id.'/print-view/2')}}" target="_blank"
                        class="badge alert bg-cust shadow-sm">Print Order Sheet </a> 
                </td> -->

                <?php if($authuser->role_id == 7 || $authuser->role_id == 6 ) { 
                    $disable = 'disable_n'; 
                } elseif($authuser->role_id != 7 || $authuser->role_id != 6){
                    if($consignment->status == 0){ 
                        $disable = 'disable_n';
                    }else{
                        $disable = '';
                    }
                } ?>
                <td>
                    <?php if ($consignment->delivery_status == "Unassigned") { ?>
                    <span class="badge alert bg-primary shadow-sm {{$disable}}"
                        lr-no="{{$consignment->id}}">{{ $consignment->delivery_status ?? ''}}</span>
                    <?php } elseif ($consignment->delivery_status == "Assigned") { ?>
                    <span class="badge alert bg-secondary shadow-sm {{$disable}}"
                        lr-no="{{$consignment->id}}">{{ $consignment->delivery_status ?? '' }}</span>
                    <?php } elseif ($consignment->delivery_status == "Started") { ?>
                    <span class="badge alert bg-warning shadow-sm {{$disable}}"
                        lr-no="{{$consignment->id}}">{{ $consignment->delivery_status ?? '' }}</span>
                    <?php } elseif ($consignment->delivery_status == "Successful") { ?>
                    <span class="badge alert bg-success shadow-sm"
                        lr-no="{{$consignment->id}}">{{ $consignment->delivery_status ?? '' }}</span>
                    <?php } elseif ($consignment->delivery_status == "Acknowledge") { ?>
                    <span class="badge alert bg-info shadow-sm" lr-no="{{$consignment->id}}">Acknowledge</span>
                    <?php }elseif ($consignment->delivery_status == "Cancel") { ?>
                    <span class="badge alert bg-info shadow-sm" lr-no="{{$consignment->id}}">Cancel</span>
                    <?php } else{ ?>
                    <span class="badge alert bg-success shadow-sm" lr-no="{{$consignment->id}}">need to update</span>
                    <?php } ?>

                </td>

                <?php if($authuser->role_id == 7 || $authuser->role_id == 6) { 
                    $disable = 'disable_n'; 
                } else{
                    $disable = '';
                } ?>
                <td>
                    <?php if ($consignment->status == 0) { ?>
                    <span class="alert badge alert bg-secondary shadow-sm">Cancel</span>
                    <?php } elseif($consignment->status == 1 || $consignment->status == 6){
                            if($consignment->delivery_status == 'Successful'){ ?>
                    <a class="alert activestatus btn btn-success disable_n" data-id="{{$consignment->id}}"
                        data-text="consignment" data-status="0"><span><i class="fa fa-check-circle-o"></i>
                            Done</span></a>
                    <?php }else{ ?>
                    <a class="alert activestatus btn btn-success {{$disable}}" data-id="{{$consignment->id}}"
                        data-text="consignment" data-status="0"><span><i class="fa fa-check-circle-o"></i>
                            Active</span></a>
                    <?php }
                        } elseif($consignment->status == 2){ ?>
                    <span class="badge alert bg-success activestatus {{$disable}}"
                        data-id="{{$consignment->id}}">Verified</span>
                    <?php } elseif($consignment->status == 3){ ?>
                    <span class="badge alert bg-gradient-bloody text-white shadow-sm">Unknown</span>
                    <?php } ?>
                </td>
                @if($consignment->bill_to == 'Self')
                <td>Pre-Paid</td>
                @else 
                <td>Post-Paid</td>
                @endif
                @if($consignment->delivery_status == 'Successful')
                <td><a href="{{url($prefix.'/display-invoice-pdf/'.$consignment->id)}}">Download Invoice</a></td>
                @else
                <td>-</td>
                @endif
                @if($authuser->role_id == 3)
                @if($consignment->delivery_status != 'Successful')
                <td><button type="button" class="btn btn-warning edit_crop" value="{{$consignment->id}}"
                        field-acerage="{{$consignment->total_acerage}}">edit</button></td>
                        @else
                        <td>-</td>
                        @endif
                @endif


            </tr>
            <tr id="collapse-{{$consignment->id}}" class="card-body collapse" data-parent="#accordion">
                <td colspan="7">
                    <?php if(!empty($consignment->job_id)){
                        $jobid = $consignment->job_id;
                    }else{
                        $jobid = "Manual";
                    } ?>
                    <div id="tabsIcons" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area icon-tab" style="padding: 0px;">

                                <ul class="nav nav-tabs  mb-3 mt-3" id="iconTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="icon-txndetail-tab" data-toggle="tab"
                                            href="#icon-txndetail-{{$consignment->id}}" role="tab"
                                            aria-controls="icon-txndetail" aria-selected="true"> TXN Details</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="icon-timeline-tab" data-toggle="tab"
                                            href="#icon-timeline-{{$consignment->id}}" role="tab"
                                            aria-controls="icon-timeline" aria-selected="false"> Timeline</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="icon-otherdetail-tab" data-toggle="tab"
                                            href="#icon-otherdetail-{{$consignment->id}}" role="tab"
                                            aria-controls="icon-otherdetail" aria-selected="false"> Other Details</a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="iconTabContent-1">
                                    <div class="tab-pane fade show active" id="icon-txndetail-{{$consignment->id}}"
                                        role="tabpanel" aria-labelledby="icon-txndetail-tab">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <table id="" class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>Delivery Status</td>
                                                            <td><span
                                                                    class="badge bg-info">{{$consignment->delivery_status}}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Drone No</td>
                                                            <td>{{@$consignment->VehicleDetail->regn_no ?? ''}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Pilot Name</td>
                                                            <td>{{ucfirst(@$consignment->DriverDetail->name) ?? ''}}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Pilot Phone</td>
                                                            <td>{{@$consignment->DriverDetail->phone ?? ''}}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-8" id="mapdiv-{{$consignment->id}}">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade append-modal" id="icon-timeline-{{$consignment->id}}"
                                        role="tabpanel" aria-labelledby="icon-timeline-tab">
                                        <!-- modal code here -->

                                    </div>
                                    <div class="tab-pane fade" id="icon-otherdetail-{{$consignment->id}}"
                                        role="tabpanel" aria-labelledby="icon-otherdetail-tab">
                                        <table class="table table-striped">
                                            <tbody>

                                                <tr>
                                                    @if(!empty($consignment->OrderactivityDetails))
                                                    <td>Estimated Amount</td>
                                                    <td><span
                                                            class="badge bg-info mt-2">{{ $consignment->OrderactivityDetails->last_spray_amount ?? "-" }}</span>
                                                    </td>
                                                    @else
                                                    <td>Estimated Amount</td>
                                                    <td><span
                                                            class="badge bg-info mt-2">{{ $consignment->total_amount ?? "-" }}</span>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Excced Amount</td>
                                                    <td><span
                                                            class="badge bg-info mt-2">{{ $consignment->OrderactivityDetails->exceed_amount ?? "-" }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total Amount</td>
                                                    <td><span
                                                            class="badge bg-info mt-2">{{$consignment->total_amount ?? "-"}}</span>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">No Record Found </td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-8 col-xl-9">
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <div class="form-group mt-3 brown-select">
                    <div class="row">
                        <div class="col-md-6 pr-0">
                            <label class=" mb-0">items per page</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control perpage" data-action="<?php echo url()->current(); ?>">
                                <option value="10" {{$peritem == '10' ? 'selected' : ''}}>10</option>
                                <option value="50" {{$peritem == '50' ? 'selected' : ''}}>50</option>
                                <option value="100" {{$peritem == '100'? 'selected' : ''}}>100</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ml-auto mr-auto">
        <nav class="navigation2 text-center" aria-label="Page navigation">
            {{$consignments->appends(request()->query())->links()}}
        </nav>
    </div>
</div>