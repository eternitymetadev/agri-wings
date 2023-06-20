<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Response;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function orderAnalystic()
    {
        
        $authuser = Auth::user();
        
        $total_order = DB::table('consignment_notes')->select('id')->where('user_id',$authuser->id)->count();
        $Under_process = DB::table('consignment_notes')->select('id')->where('status',2)->where('user_id',$authuser->id)->count();

        $pending = DB::table('consignment_notes')->select('id')->where('status',5)->where('user_id',$authuser->id)->count();
        
        $response['total_order'] = $total_order;
        $response['Under_process'] = $Under_process;
        $response['pending'] = $pending;
        $response['success'] = true;
        $response['messages'] = 'load_data';

        return Response::json($response);
    }

    
}
