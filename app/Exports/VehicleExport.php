<?php

namespace App\Exports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromQuery;
use Session;
use Helper;

class VehicleExport implements FromCollection, WithHeadings,ShouldQueue
{
    /**
    * @return \Illuminate\Support\Collection
    */   
    public function collection()
    {
        ini_set('memory_limit', '2048M');
        set_time_limit ( 6000 );
        $arr = array();
        $query = Vehicle::query();

        $vehicle = $query->with('State')->orderby('created_at','DESC')->get();

        if($vehicle->count() > 0){
            foreach ($vehicle as $key => $value){  
                if(!empty($value->State)){
                    if(!empty($value->State->name)){
                      $state = $value->State->name;
                    }else{
                      $state = '';
                    }
                }else{
                    $state = '';
                }
                $arr[] = [
                    
                    'regn_no' => $value->regn_no,
                    'mfg' => $value->mfg,
                    'make' => $value->make,
                    'gross_vehicle_weight' => $value->gross_vehicle_weight,
                ];
            }
        }                 
        return collect($arr);
    }
    public function headings(): array
    {
        return [
            'UIN',
            'Manufacturing year',
            'Drone Model',
            'Drone Capicity'
        ];
    }
}
