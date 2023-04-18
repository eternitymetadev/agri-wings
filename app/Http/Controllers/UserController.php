<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BaseClient;
use App\Models\Location;
use App\Models\Permission;
use App\Models\RegionalClient;
use App\Models\Role;
use App\Models\User;
use App\Models\Zone;
use App\Models\UserPermission;
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
        $getpermissions = Permission::all();
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
        $getpermissions = Permission::all();

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
                // 'name' => 'required',
                'contact_number' => 'required|unique:users,phone',
                'contact_number' => 'required|unique:regional_clients,phone',
                //  'captcha' => ['required', 'captcha'],
                //  'g-recaptcha-response' => 'recaptcha',
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
                $gstupload = $request->file('upload_gst');
                $path = Storage::disk('s3')->put('clients', $gstupload);
                $gst_img_path_save = Storage::disk('s3')->url($path);

                //  ======= pan upload
                $panupload = $request->file('upload_pan');
                $pan_path = Storage::disk('s3')->put('clients', $panupload);
                $pan_img_path_save = Storage::disk('s3')->url($pan_path);

                $getpin_transfer = Zone::where('postal_code', $request->pin)->first();
                if(!empty($getpin_transfer->hub_transfer)){
                $get_branch = Location::where('name', $getpin_transfer->hub_transfer)->first();
                $client_assign_branch = $get_branch->id;
                }else{
                $get_branch = Location::where('name', 'Karnal')->first();
                $client_assign_branch = $get_branch->id; 
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
                $saveclientdetails['upload_gst'] = $gst_img_path_save;
                $saveclientdetails['upload_pan'] = $pan_img_path_save;
                $saveclientdetails['location_id'] = $client_assign_branch;
                $saveclientdetails['status'] = 1;

                $saveclientdetails['payment_term'] = 'Bill To Client';

                RegionalClient::create($saveclientdetails);

                $data = ['contact_name' => $request->contact_name, 'user_id' => $userid];
                $user['to'] = $request->email;
                Mail::send('client-verified-email', $data, function ($messges) use ($user) {
                    $messges->to($user['to']);
                    $messges->subject('Verify Your Email Address for Agriwings');

                });

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
         

        // }

        if ($verified->status == 0) {
            $data = ['login_id' => $verified->login_id, 'password' => $verified->user_password, 'name' => $verified->name];
            $user['to'] = $verified->email;
            Mail::send('client-login-email', $data, function ($messges) use ($user) {
                $messges->to($user['to']);
                $messges->subject('Your Login Credentials for Agriwings');

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

        if ($usernumber) {
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

}
