<?php

namespace App\Exports;

use App\Models\Consignee;
use App\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromQuery;
use DB;
use Session;
use Helper;
use Auth;

class ConsigneeExport implements FromCollection, WithHeadings,ShouldQueue
{
    /**
    * @return \Illuminate\Support\Collection
    */   
    public function collection()
    {
        ini_set('memory_limit', '2048M');
        set_time_limit ( 6000 );
        $arr = array();

        $authuser = Auth::user();
        $role_id = Role::where('id','=',$authuser->role_id)->first();
        $regclient = explode(',',$authuser->regionalclient_id);
        $cc = explode(',',$authuser->branch_id);
        
        $query = Consignee::with('Consigner','Zone');
        // $query = DB::table('consignees')->select('consignees.*', 'consigners.nick_name as consigner_id', 'zones.postal_code as postal_code')
        // ->join('consigners', 'consigners.id', '=', 'consignees.consigner_id')
        // ->join('zones', 'zones.postal_code', '=', 'consignees.postal_code');

        // if($authuser->role_id == 1){
        //     $query = $query;
        // }
        // else if($authuser->role_id == 2 || $authuser->role_id == 3){
        //     $query = $query->whereHas('Consigner', function($query) use($cc){
        //         $query->whereIn('branch_id', $cc);
        //     });
        // }
        // else{
        //     $query = $query->whereHas('Consigner', function($query) use($regclient){
        //         $query->whereIn('regionalclient_id', $regclient);
        //     });
        // }

        $consignee = $query->orderby('created_at','DESC')->get();

        if($consignee->count() > 0){
            foreach ($consignee as $key => $value){  

                if(!empty($value->Zone->name)){
                    $zone = $value->Zone->name;
                }else{
                    $zone = '';
                }

                if(!empty($value->Consigner->nick_name)){
                    $consigner = $value->Consigner->nick_name;
                }else{
                    $consigner = '';
                }

                if(!empty($value->dealer_type == '1')){
                    $dealer_type = 'Registered';
                }else{
                    $dealer_type = 'Unregistered';
                }

                $arr[] = [
                    'farmer_name'     => $value->nick_name,
                    'contact_no'  => $value->phone,
                    'address_line1' => $value->address_line1,
                    'city' => $value->city,
                    'district' => $value->district,
                    'postal_code' => $value->postal_code,
                    'state' => $value->state_id,

                ];
            }
        }                 
        return collect($arr);
    }
    public function headings(): array
    {
        return [
            'Farmer Name',
            'Farmer Contact',
            'Address',
            'city',
            'District Name  ',
            'Postal Coder',
            'State id',
        ];
    }
}