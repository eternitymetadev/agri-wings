<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BaseClient;
use App\Models\Location;
use App\Models\Permission;
use App\Models\RegionalClient;
use App\Models\Role;
use App\Models\User;
use App\Models\UserOtp;
use App\Models\UserPermission;
use App\Models\Zone;
use App\Models\PaymentTerms;
use DB;
use Hash;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;
use URL;
use Validator;

class UserController extends Controller
{
    public $prefix;
    public $title;

    public function __construct()
    {
        $this->title = "Users";
        $this->segment = \Request::segment(2);
        $this->sms_link = \Config::get('sms_api.req_sms');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->prefix = request()->route()->getPrefix();
        $query = User::query();
        $data = $query->with('UserRole')->orderby('id', 'DESC')->get();
        return view('users.user-list', ['data' => $data, 'prefix' => $this->prefix, 'title' => $this->title])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->prefix = request()->route()->getPrefix();
        $this->pagetitle = "Create";
        $getpermissions = Permission::where('status', 1)->get();
        $getroles = Role::all();
        $branches = Helper::getLocations();
        $baseclients = BaseClient::all();
        $regionalclients = Helper::getRegionalClients();
        $get_rms = User::where('role_id', 3)->get();

        return view('users.create-user', ['getroles' => $getroles, 'getpermissions' => $getpermissions, 'branches' => $branches, 'regionalclients' => $regionalclients, 'baseclients' => $baseclients, 'get_rms' => $get_rms, 'prefix' => $this->prefix, 'title' => $this->title, 'pagetitle' => $this->pagetitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd($request->all());
        $this->prefix = request()->route()->getPrefix();
        $rules = array(
            'name' => 'required',
            'login_id' => 'required|unique:users,login_id',
            'email' => 'required',
            'password' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['success'] = false;
            $response['validation'] = false;
            $response['formErrors'] = true;
            $response['errors'] = $errors;
            return response()->json($response);
        }
        if (!empty($request->name)) {
            $usersave['name'] = $request->name;
        }
        if (!empty($request->login_id)) {
            $usersave['login_id'] = $request->login_id;
        }
        if (!empty($request->email)) {
            $usersave['email'] = $request->email;
        }
        if (!empty($request->password)) {
            $usersave['password'] = Hash::make($request->password);
        }

        if (!empty($request->role_id)) {
            $usersave['role_id'] = $request->role_id;
        }
        $usersave['user_password'] = $request->password;
        // $usersave['branch_id']     = $request->branch_id;
        $usersave['phone'] = $request->phone;
        if (!empty($request->branch_id)) {
            $branch = $request->branch_id;
            $usersave['branch_id'] = implode(',', $branch);
        }
        if (!empty($request->baseclient_id)) {
            $usersave['baseclient_id'] = $request->baseclient_id;
        }
        if (!empty($request->rm_id)) {
            $usersave['rm_assign'] = $request->rm_id;
        }
        if (!empty($request->regionalclient_id)) {
            $regclients = $request->regionalclient_id;
            $usersave['regionalclient_id'] = implode(',', $regclients);
        }
        $usersave['status'] = "1";

        $saveuser = User::create($usersave);
        if ($saveuser) {
            $userid = $saveuser->id;
            if (!empty($request->permisssion_id)) {
                foreach ($request->permisssion_id as $key => $permissionvalue) {
                    $savepermissions[] = [
                        'user_id' => $userid,
                        'permisssion_id' => $permissionvalue,
                    ];
                }
                UserPermission::insert($savepermissions);
            }
            $url = URL::to($this->prefix . '/users');
            $response['success'] = true;
            $response['success_message'] = "Users Added successfully";
            $response['error'] = false;
            // $response['resetform'] = true;
            $response['page'] = 'user-create';
            $response['redirect_url'] = $url;
        } else {
            $response['success'] = false;
            $response['error_message'] = "Can not created user please try again";
            $response['error'] = true;
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $this->prefix = request()->route()->getPrefix();
        $this->pagetitle = "View Details";
        $id = decrypt($user);
        $getuser = User::where('id', $id)->with('UserRole')->first();

        $branch = $getuser->branch_id;
        $branch_ids = explode(',', $branch);
        $branches = Location::whereIn('id', $branch_ids)->pluck('name');

        return view('users.view-user', ['prefix' => $this->prefix, 'title' => $this->title, 'getuser' => $getuser, 'branches' => $branches, 'pagetitle' => $this->pagetitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $this->prefix = request()->route()->getPrefix();
        $this->pagetitle = "Update";
        $id = decrypt($user);
        $getroles = Role::all();
        $getpermissions = Permission::where('status', 1)->get();

        $allpermissioncount = Permission::all()->count();
        $getuserpermissions = UserPermission::where('user_id', $id)->get();
        $branches = Helper::getLocations();
        $getclients = Helper::getRegionalClients();

        $u = array();
        if (count($getuserpermissions) > 0) {
            foreach ($getuserpermissions as $us) {
                $u[] = $us['permisssion_id'];
            }
        }
        $getuser = User::where('id', $id)->first();
        $get_rms = User::where('role_id', 3)->get();
        return view('users.update-user')->with(['prefix' => $this->prefix, 'title' => $this->title, 'pagetitle' => $this->pagetitle, 'getuser' => $getuser, 'getroles' => $getroles, 'getpermissions' => $getpermissions, 'getuserpermissions' => $u, 'allpermissioncount' => $allpermissioncount, 'branches' => $branches, 'getclients' => $getclients, 'get_rms' => $get_rms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateUser(Request $request)
    {
        try {
            $this->prefix = request()->route()->getPrefix();
            $rules = array(
                'name' => 'required',
                'login_id' => 'required',
                'email' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $errors = $validator->errors();
                $response['success'] = false;
                $response['formErrors'] = true;
                $response['errors'] = $errors;
                return response()->json($response);
            }

            $getpass = User::where('id', $request->user_id)->get();

            $usersave['name'] = $request->name;
            $usersave['email'] = $request->email;
            $usersave['login_id'] = $request->login_id;
            $usersave['role_id'] = $request->role_id;
            $usersave['phone'] = $request->phone;
            $usersave['rm_assign'] = $request->rm_id;
            // $usersave['branch_id']  = $request->branch_id;
            $branch = $request->branch_id;
            $usersave['branch_id'] = implode(',', $branch);

            if (!empty($request->password)) {
                $usersave['password'] = Hash::make($request->password);
                $usersave['user_password'] = $request->password;
            } else if (!empty($getpass->password)) {
                $usersave['password'] = $getpass->password;
            }

            User::where('id', $request->user_id)->update($usersave);

            $userid = $request->user_id;
            UserPermission::where('user_id', $userid)->delete();
            if (!empty($request->permisssion_id)) {
                foreach ($request->permisssion_id as $key => $permissionvalue) {
                    $savepermissions[] = [
                        'user_id' => $userid,
                        'permisssion_id' => $permissionvalue,
                    ];
                }
                UserPermission::insert($savepermissions);
            }

            $getsavedusers = User::where('id', $request->user_id)->first();
            $url = URL::to($this->prefix . '/users');

            $response['page'] = 'user-update';
            $response['success'] = true;
            $response['success_message'] = "User Updated Successfully";
            $response['error'] = false;
            $response['redirect_url'] = $url;
        } catch (Exception $e) {
            $response['error'] = false;
            $response['error_message'] = $e;
            $response['success'] = false;
            $response['redirect_url'] = $url;
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request)
    {
        UserPermission::where('user_id', $request->userid)->delete();
        User::where('id', $request->userid)->delete();

        $response['success'] = true;
        $response['success_message'] = 'User deleted successfully';
        $response['error'] = false;
        return response()->json($response);
    }

    // get regional clients on location change
    public function regClients(Request $request)
    {
        $getclients = RegionalClient::select('id', 'name', 'baseclient_id', 'location_id')->where(['location_id' => $request->branch_id, 'status' => '1'])->get();

        if ($getclients) {
            $response['success'] = true;
            $response['success_message'] = "Client list fetch successfully";
            $response['error'] = false;
            $response['data'] = $getclients;
        } else {
            $response['success'] = false;
            $response['error_message'] = "Can not fetch client list please try again";
            $response['error'] = true;
        }
        return response()->json($response);
    }

    public function clientRegister(Request $request)
    {
        return view('client-register');
    }
    public function addClientUser(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->prefix = request()->route()->getPrefix();
            $rules = array(
                'email' => 'required',
                'company_name' => 'required',
                'contact_name' => 'required',
                'pin' => 'required',
                'contact_number' => 'required|unique:users,phone',
                'contact_number' => 'required|unique:regional_clients,phone',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $errors = $validator->errors();
                $response['success'] = false;
                $response['validation'] = false;
                $response['formErrors'] = true;
                $response['errors'] = $errors;
                return response()->json($response);
            }

            $opt = $request->otp;
            $check_otp_no = UserOtp::where('phone', $request->contact_number)->first();
            if ($check_otp_no->status == 0) {
                if ($check_otp_no->otp == $opt) {
                    UserOtp::where('phone', $request->contact_number)->update(['status' => 1]);
                } else {

                    $response['success'] = false;
                    $response['error_message'] = "Otp Not Match";
                    $response['error'] = true;
                    $response['otp'] = false;
                    return response()->json($response);
                }
            } else {
                $response['success'] = false;
                $response['error_message'] = "Phone Already Register";
                $response['error'] = true;
                $response['otp'] = false;
                return response()->json($response);
            }

            if (!empty($request->contact_name)) {
                $usersave['name'] = $request->contact_name;
            }
            if (!empty($request->contact_number)) {
                $usersave['login_id'] = $request->contact_number;
            }
            if (!empty($request->email)) {
                $usersave['email'] = $request->email;
            }

            $randPassword = $request->contact_number . '@d2f';

            $usersave['password'] = Hash::make($randPassword);

            $usersave['role_id'] = 7;
            $usersave['user_password'] = $randPassword;
            $usersave['phone'] = $request->contact_number;
            $usersave['status'] = 0;

            $saveuser = User::create($usersave);
            if ($saveuser) {

                // ======= gst upload
                if (!empty($request->file('upload_gst'))) {
                    $gstupload = $request->file('upload_gst');
                    $path = Storage::disk('s3')->put('clients', $gstupload);
                    $gst_img_path_save = Storage::disk('s3')->url($path);
                    $saveclientdetails['upload_gst'] = $gst_img_path_save;
                }

                //  ======= pan upload
                if (!empty($request->file('upload_gst'))) {
                    $panupload = $request->file('upload_pan');
                    $pan_path = Storage::disk('s3')->put('clients', $panupload);
                    $pan_img_path_save = Storage::disk('s3')->url($pan_path);
                    $saveclientdetails['upload_pan'] = $pan_img_path_save;
                }

                $getpin_transfer = Zone::where('postal_code', $request->pin)->first();
                if (!empty($getpin_transfer->hub_transfer)) {
                    $get_branch = Location::where('name', $getpin_transfer->hub_transfer)->first();
                    $client_assign_branch = $get_branch->id;
                } else {
                    $get_branch = Location::where('nick_name', 'Karnal')->first();
                    if(!empty($get_branch->id)){
                        $client_assign_branch = $get_branch->id;
                    }else{
                        $client_assign_branch = '';
                    }
                   
                }

                $userid = $saveuser->id;
                $saveclientdetails['user_id'] = $userid;

                $saveclientdetails['name'] = $request->company_name . '-(Web)';
                $saveclientdetails['regional_client_nick_name'] = $request->contact_name;
                $saveclientdetails['email'] = $request->email;
                $saveclientdetails['phone'] = $request->contact_number;
                $saveclientdetails['gst_no'] = $request->gst_no;
                $saveclientdetails['pan'] = $request->pan;
                $saveclientdetails['pin'] = $request->pin;
                $saveclientdetails['city'] = $request->city;
                $saveclientdetails['district'] = $request->district;
                $saveclientdetails['state'] = $request->state;
                $saveclientdetails['address'] = $request->address;
                if (!empty($request->notification)) {
                    $saveclientdetails['notification'] = $request->notification;
                }

                $saveclientdetails['location_id'] = $client_assign_branch;
                $saveclientdetails['status'] = 1;
                $saveclientdetails['booking_client'] = 1;

                $saveRegional = RegionalClient::create($saveclientdetails);

                ////==== Payment terms =====
                $saveterm['client_id'] = $saveRegional->id;
                $saveterm['bill_to'] = 'Self';
                $saveterm['payment_term'] = 'Bill To Client Advance';
                $saveterm['status'] = 1;
                PaymentTerms::create($saveterm);

                // welcome mail sent  to customer=====================================
                $verified = User::with('UserClient')->where('id', $userid)->first();

                $html = '<!DOCTYPE html>
            <html>

            <head>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
                    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

                <style>
                p {
                    margin-bottom: 0px !important;
                    font-size: 0.9rem;
                    line-height: 1.4rem;
                }
                </style>
            </head>

            <body>
                <p>
                Dear Customer,<br /><br />
            We are delighted to welcome you to our AgriWings family. We appreciate your business and look forward to providing you with our exceptional services.<br />
            In order to ensure a smooth and hassle-free process for you, we would like to take this opportunity to explain our billing terms and order booking flow chart.<br />
            Billing Terms: Our billing terms will remain “Bill to Client Advance”. We accept various payment methods, including Cash, UPI, bank transfers.<br />
            Order Booking Flow:<br />
            <a href="https://app.agriwings.in/download-ppt">
            Download 
        </a>
            <br />
            We hope that this information helps you understand our billing terms and order booking flow chart. If you have any questions or concerns, please do not hesitate to contact us and report/rate us on Page of www.AgriWing.com. We value your feedback and are always looking for ways to improve our services.<br />
            Thank you for choosing AgriWings. We look forward to working with you and providing you with the best services possible.<br /><br />
            Sincerely,<br />
            Team AgriWings<br />
            D2F Services Private Limited

                </p>
            </body>

            </html>';
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($html);
            $pdf->setPaper('legal', 'portrait');

            $data = ['login_id' => $verified->login_id, 'password' => $verified->user_password, 'name' => $verified->name];
            $user['to'] = $verified->email;
            Mail::send('client-login-email', $data, function ($messges) use ($user, $pdf) {
                $messges->to($user['to']);
                $messges->subject('Your Login Credentials for Agriwings');
                $messges->attachData($pdf->output(), "welcome.pdf");

            });
            User::where('id', $userid)->update(['status' => 1]);

                $url = URL::to($this->prefix . '/login');
                $response['success'] = true;
                $response['success_message'] = "Users Added successfully, Please Check Your Mail To verify";
                $response['error'] = false;
                // $response['resetform'] = true;
                $response['page'] = 'client-register';
                $response['redirect_url'] = $url;
            } else {
                $response['success'] = false;
                $response['error_message'] = "Can not created user please try again";
                $response['error'] = true;
            }
            DB::commit();
        } catch (Exception $e) {
            $response['error'] = false;
            $response['error_message'] = $e;
            $response['success'] = false;
        }

        return response()->json($response);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function clientVerification($id)
    {
        $id = decrypt($id);
        $verified = User::with('UserClient')->where('id', $id)->first();
        // $user_branch = $verified->UserClient->location_id;

        // $regional_manager = User::whereRaw('FIND_IN_SET('.$user_branch.',branch_id)')->where('role_id', 3)->get();
        // foreach($regional_manager as $regional){
        //     $regional_email = $regional->email;
        //     echo'<pre>'; print_r($regional_email); die;
        // }

        if ($verified->status == 0) {

            $html = '<!DOCTYPE html>
            <html>

            <head>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
                    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

                <style>
                p {
                    margin-bottom: 0px !important;
                    font-size: 0.9rem;
                    line-height: 1.4rem;
                }
                </style>
            </head>

            <body>
                <p>
                Dear Customer,<br /><br />
            We are delighted to welcome you to our AgriWings family. We appreciate your business and look forward to providing you with our exceptional services.<br />
            In order to ensure a smooth and hassle-free process for you, we would like to take this opportunity to explain our billing terms and order booking flow chart.<br />
            Billing Terms: Our billing terms will remain “Bill to Client Advance”. We accept various payment methods, including Cash, UPI, bank transfers.<br />
            Order Booking Flow :<br />
            Consultation - We start by discussing your needs and providing you with a consultation to understand your requirements.<br />
            Quote - After the consultation, we will provide you with a detailed quote for the services you require.<br />
            Booking - If you agree to the quote, we will proceed with booking the order and scheduling the services.<br />
            Service Delivery - Our team will provide the services as per the schedule.<br />
            Invoicing - Once the services are delivered, we will issue an invoice for the services rendered.<br />
            Payment - Payment is due within 30 days from the invoice date.<br />
            We hope that this information helps you understand our billing terms and order booking flow chart. If you have any questions or concerns, please do not hesitate to contact us and report/rate us on Page of https://app.agriwings.in/ We value your feedback and are always looking for ways to improve our services.<br />
            Thank you for choosing AgriWings. We look forward to working with you and providing you with the best services possible.<br /><br />
            Sincerely,<br />
            Team AgriWings<br />
            D2F Services Private Limited

                </p>
            </body>

            </html>';
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($html);
            $pdf->setPaper('legal', 'portrait');

            $data = ['login_id' => $verified->login_id, 'password' => $verified->user_password, 'name' => $verified->name];
            $user['to'] = $verified->email;
            Mail::send('client-login-email', $data, function ($messges) use ($user, $pdf) {
                $messges->to($user['to']);
                $messges->subject('Your Login Credentials for Agriwings');
                $messges->attachData($pdf->output(), "welcome.pdf");

            });
            User::where('id', $id)->update(['status' => 1]);
            // === email sent to rm === //

            return '<h1>User verified successfully, Please Check Your Mail for your Login Credentials</h1>';
        } else {
            return '<h1>Already verified</h1>';
        }

    }

    public function userPhoneCheck(Request $request)
    {

        $usernumber = User::where('phone', $request->number)->first();
        $check_regional_phone = RegionalClient::where('phone', $request->number)->first();

        if ($usernumber || $check_regional_phone) {
            $response['success'] = true;
            $response['error_message'] = "Already Exist";
            $response['error'] = true;
        } else {
            $response['success'] = false;
            $response['error_message'] = "not found";
            $response['error'] = true;
        }
        return response()->json($response);

    }

    public function userProfile()
    {
        $this->prefix = request()->route()->getPrefix();

        // $getuser = User::where('id', $id)->first();

        return view('users.user-profile', ['prefix' => $this->prefix, 'title' => $this->title]);
    }

    public function sendOtp(Request $request)
    {
        $phone = $request->phone;
        $generate_otp = random_int(100000, 999999);
        $text = 'Dear User, Your OTP is ' . $generate_otp . ' for AgriWings registration . Thanks, Agriwings Team';

        $check_number = UserOtp::where('phone', $phone)->first();
        if (!empty($check_number)) {
            if ($check_number->status == 1) {

                $response['success'] = false;
                $response['error_message'] = "Number Already Register";
                $response['error'] = true;
                return response()->json($response);

            } else {
                $url = 'http://sms.innuvissolutions.com/api/mt/SendSMS?APIkey=' . $this->sms_link . '&senderid=AGRWNG&channel=Trans&DCS=0&flashsms=0&number=' . urlencode($phone) . '&text=' . urlencode($text) . '&route=2&peid=1701168155524038890';
                $result = $this->SendTSMS($url);

                $update = UserOtp::where('phone', $phone)->update(['otp' => $generate_otp]);

                $response['success'] = true;
                $response['error_message'] = "Otp Sent Successfully";
                $response['error'] = true;
                return response()->json($response);
            }

        }

        $url = 'http://sms.innuvissolutions.com/api/mt/SendSMS?APIkey=' . $this->sms_link . '&senderid=AGRWNG&channel=Trans&DCS=0&flashsms=0&number=' . urlencode($phone) . '&text=' . urlencode($text) . '&route=2&peid=1701168155524038890';

        $result = $this->SendTSMS($url); // call function that return response with code

        $saveotp['phone'] = $phone;
        $saveotp['otp'] = $generate_otp;

        $save = UserOtp::create($saveotp);

        if ($save) {
            $response['success'] = true;
            $response['error_message'] = "Otp Sent Successfully";
            $response['error'] = true;
        } else {
            $response['success'] = false;
            $response['error_message'] = "not found";
            $response['error'] = true;
        }
        return response()->json($response);

    }

    public function SendTSMS($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // change to 1 to verify cert
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        $result = curl_exec($ch);

    }

}
