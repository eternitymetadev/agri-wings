<?php $authuser = Auth::user();?>
<div class="custom-table">
    <table class="table mb-3" style="width:100%">
        <thead>
            <tr>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Booking Partner</th>
                <th>Billing Client</th>
                <th>Service receiver</th>
                <th>District</th>
                <th>State</th>
                <th>Pincode</th>
                <th>acers</th>
                <th>Estimated Amount</th>
                <th>Pilot Name</th>
                <th>Pilot No</th>
                <th>Date of Spray</th>
                <th>Status of Order</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody class="accordion">
            @if(count($consignments)>0)
            @foreach($consignments as $consignment)
            <tr>
                <td>{{ $consignment->id ?? "-" }}</td>
                <td>{{ $consignment->consignment_date ?? "NA" }}</td>
                <td>{{ $consignment->RegClient->name ?? "-" }}</td>
                <td>{{ $consignment->BillingClient->name ?? "-" }}</td>
                <td>{{ $consignment->ConsigneeDetail->nick_name ?? "-"}}</td>
                <td>{{ $consignment->ConsigneeDetail->district ?? "-"}} </td>
                <td>{{ $consignment->ConsigneeDetail->state_id ?? "-"}}</td>
                <td>{{ $consignment->ConsigneeDetail->postal_code ?? "-"}}</td>
                <td>{{ $consignment->total_acerage ?? "-" }}</td>
                <td>{{ $consignment->total_amount ?? "-" }}</td>
                <td>{{ $consignment->DriverDetail->name ?? "-" }}</td>
                <td>{{ $consignment->DriverDetail->phone ?? "-" }}</td>
                <td>{{ $consignment->edd ?? "-" }}</td>
                <td>
                    <a class="approve">
                        <p class=" drsStatus pointer" style="background:#be930f; margin-bottom: 0">
                            <span>{{$consignment->delivery_status}}</span>
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </p>
                    </a>
                </td>
                @if($consignment->bill_to == 'Self')
 
                <td>Pre-Paid</td>
                @else
                <td>Post-Paid</td>
                @endif

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