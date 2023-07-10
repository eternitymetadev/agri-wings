<?php

namespace App\Exports;

use App\Models\ConsignmentNote;
use Auth;
use Helper;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderListDetails implements FromCollection, WithHeadings, ShouldQueue
{

    public function collection()
    {
        ini_set('memory_limit', '2048M');
        set_time_limit(6000);
        $arr = array();

        $query = ConsignmentNote::query();

        $authuser = Auth::user();

        $query = $query
        ->with(
            'ConsigneeDetail',
            'VehicleDetail:id,regn_no',
            'DriverDetail:id,name,fleet_id,phone',
            'DrsDetail:consignment_no,drs_no,created_at',
            'RegClient'
        )->where('status','!=','7'); 
        if($authuser->role_id == 7){
            $order_details = $query->where('user_id', $authuser->id)->orderBy('id','ASC')->get();
        }else{
            $order_details = $query->orderBy('id','ASC')->get();
        }

        if ($order_details->count() > 0) {
            foreach ($order_details as $key => $order_detail) {

                if ($order_detail->bill_to == 'Self') {
                    $billing_client = @$order_detail->RegClient->name;
                } else {
                    $billing_client = @$order_detail->ConsigneeDetail->nick_name;
                }

                $arr[] = [
                    'order_id' => @$order_detail->id,
                    'order_date' => Helper::ShowDayMonthYearslash($order_detail->consignment_date),
                    'total_acerage' => @$order_detail->total_acerage,
                    'total_amount' => @$order_detail->total_amount,
                    'discount_price' => @$order_detail->Orderactivity->discount,
                    'booking_partner' =>@$order_detail->RegClient->name,
                    'billing_client' => @$billing_client,
                    'service_receiver' => @$order_detail->ConsigneeDetail->nick_name,
                    'district' => @$order_detail->ConsigneeDetail->district,
                    'state' => @$order_detail->ConsigneeDetail->state_id,
                    'pincode' => @$order_detail->ConsigneeDetail->postal_code,
                    'drone' => @$order_detail->VehicleDetail->regn_no,
                    'pilot_name' => @$order_detail->DriverDetail->name,
                    'pilot_number' => @$order_detail->DriverDetail->phone,
                    'crop' => @$order_detail->Orderactivity->CropName->crop_name,
                    'spray_date' => @$order_detail->edd,
                    'delivery_status' => @$order_detail->delivery_status,
                    'delivery_date' => @$order_detail->delivery_date,

                ];
            }
        }
        return collect($arr);
    }

    public function headings(): array
    {
        return [
            'Order No',
            'Order Date',
            'Total Acerage',
            'Total Amount',
            'Discount Price',
            'Booking Partner',
            'Billing Client',
            'Service Receiver',
            'District',
            'State',
            'Pincode',
            'Drone',
            'Pilot Name',
            'Pilot Number',
            'Crop Name',
            'Spray Date',
            'Delivery Status',
            'Delivery Date',

        ];
    }
}
