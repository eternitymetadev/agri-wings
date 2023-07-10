<div class="custom-table">
    <table id="" class="table table-hover" style="width:100%">
        <div class="btn-group relative">
            <!-- <a href="{{'consignments/create'}}" class="btn btn-primary pull-right" style="font-size: 13px; padding: 6px 0px;">Create Consignment</a> -->
        </div>
        <thead>
            <tr>
                <th>
                    <input type="checkbox" name="" id="ckbCheckAll" style="width: 30px; height:30px;">
                </th>
                <th>Order Id</th>
                <th>Order Type</th>
                <th>Received By </th>
                <th>Spray Status</th>
                <th>Invoice Amount</th>
                <th>Subvention Scheme</th>
                <th>Invoice Farmer</th>
                <th>Invoice Client</th>
                <?php 
                $authuser = Auth::user();
                if($authuser->role_id == 5){ ?>
                <th>Payment Received By</th>
                <th>Payment Receiver Name</th>
                <th>Amount Deposited</th>
                <?php } ?>
                <th>Settlement Status</th>
                <th>Settlement Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($paymentlist as $payment)
            <?php
            
            ?>
            <tr>
                <!----- checkbox check role ----->
                @if($authuser->role_id == 5)
                @if($payment->payment_settlement == 1)
                <td><input type="checkbox" name="checked_drs[]" class="chkBoxClass" value="{{$payment->id}}"
                        data-price="{{$payment->total_amount}}" style="width: 16px; height:16px;"></td>
                        @else
                        <td>-</td>
                        @endif
                @else
                @if($payment->payment_settlement == 0)
                <td><input type="checkbox" name="checked_drs[]" class="chkBoxClass" value="{{$payment->id}}"
                        data-price="{{$payment->total_amount}}" style="width: 16px; height:16px;"></td>
                        @else
                        <td>-</td>
                        @endif
                @endif
                <!-- end check -->
                <td>
                    <p class="mb-0">
                        <span style="color: #000">{{$payment->id}}</span><br />
                        Order Date: {{$payment->consignment_date}}
                    </p>
                </td>
                <td>
                    <p class="mb-0">
                        @if($payment->bill_to == 'Self')
                        <span style="color: #000">Pre-Paid</span>
                        @else
                        <span style="color: #000">Post-Paid</span>
                        @endif<br />
                        Payment Type: {{$payment->payment_type}}
                    </p>
                </td>
                <td>
                    <p class="mb-0">
                        <span style="color: #000">{{@$payment->DriverDetail->name}}</span><br />
                        Received Date: {{$payment->delivery_date ?? '-'}}
                    </p>
                </td>
                <td>
                    <p class="mb-0">
                        <span style="color: #000">{{$payment->delivery_status}}</span><br />
                        @if($payment->delivery_status == 'Successful')
                        Invoice Status : Generated
                        @endif
                    </p>
                </td>
                <td>
                    <p class="mb-0">
                        <span style="color: #000">{{$payment->total_amount}}</span>
                    </p>
                </td>
                <td>
                    <p class="mb-0">
                        <span style="color: #000"></span>
                    </p>
                </td>
                <td>
                    <p class="mb-0">
                        <span style="color: #000"></span>
                    </p>
                </td>
                <td>
                    <p class="mb-0">
                        <span style="color: #000"></span>
                    </p>
                </td>
                @if($authuser->role_id == 5)
                <td><p class="mb-0">
                        <span style="color: #000">{{$payment->PaymentSettle->GetUser->UserRole->name ?? '-'}}</span>
                    </p></td>
                <td>
                <p class="mb-0">
                        <span style="color: #000">{{$payment->PaymentSettle->GetUser->name ?? '-'}}</span>
                    </p>
                </td>
                <td>
                <p class="mb-0">
                        <span style="color: #000">{{$payment->total_amount ?? '-'}}/{{$payment->PaymentSettle->amount_deposite ?? '0'}}</span>
                    </p>
                </td>
                @endif
                <td>
                    @if($payment->payment_settlement == 1)
                    <p class="mb-0">
                        <span style="color: #000">Due/ Pending at HO Accounts</span>
                    </p>
                    @elseif($payment->payment_settlement == 2)
                    <p class="mb-0">
                        <span style="color: #000">Settled</span>
                    </p>
                    @else
                    <p class="mb-0">
                        <span style="color: #000">Pending</span>
                    </p>
                    @endif
                </td>
               
                @if(!empty($payment->PaymentSettle))
                <td>
                    <p class="mb-0">
                        <span style="color: #000">Date of Deposite : {{$payment->PaymentSettle->date_of_deposite}}
                        </span><br />
                        Bank name : {{$payment->PaymentSettle->bank_name}} <br />
                        Branch location : {{$payment->PaymentSettle->branch_location}}
                    </p>
                </td>
                @else
                <td>
                    <p class="mb-0">
                        <span style="color: #000">Date of Deposite : </span><br />
                        Bank name: <br />
                        Branch location:
                    </p>
                </td>
                @endif

            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="perpage container-fluid">
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
            {{$paymentlist->appends(request()->query())->links()}}
        </nav>
    </div>
</div>