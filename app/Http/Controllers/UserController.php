<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class UserController extends Controller
{


    public function getAll()
    {
        $user = User::all();
        return response()->json($user);
    }


    public function form($id = null,$copy=false)
    {

       

        $user = [];
        $action = $id && !$copy ? 'update' : 'add';
        if ($id) {
            $user = user::find($id)->toArray();
        }
        // return $user["ms_user_name_en"];
        return view('user.form', [ "user"=>$user, "action"=>$action]);
    }

    public function copy($id)
    {
        return $this->form($id, true);
    }





    public function list()
    {
        return view('User.list');
    }

  
    public function getAllCountries()
    {
        $countries = Country::all(); 
        return response()->json($countries);
    }

    public function addRecord(Request $request)
    {
       
        $user =   $request->validate([
            'User_fname' => 'required',
            'User_lname' => 'required',

            //add more later
        ]);

        // $user["pass"]=Hash::make($user["pass"]);
        // $user["create_by"]=auth()->user()->User_id,
        // $user["time"]=Hash::make($user["pass"]);


        User::create([
            'User_first_name' => $request->User_fname,
            'User_last_name' => $request->User_lname,
            'User_email' => $request->User_email,
            'User_address' => $request->User_address,
            'User_phone' => $request->User_phone,
            'User_created_by' => auth()->user()->User_id,
            'ws_country_id' => $request->countryDropdown,
            'User_password' => Hash::make($request->User_password)
        ]);
        return response()->json([
            "status" => "success",
            'message' => 'Record added successfully'
        ]);
    }

    public function updateRecord(Request $request, $recordId)
    {
        $request->validate([
            'User_fname' => 'required',
            'User_lname' => 'required'
            //add more later
        ]);
        User::where('User_id', $recordId)->update([
            'User_first_name' => $request->User_fname,
            'User_last_name' => $request->User_lname,
            'User_email' => $request->User_email,
            'User_address' => $request->User_address,
            'User_phone' => $request->User_phone,
            'User_created_by' => auth()->user()->User_id,
            'User_updated_by' => auth()->user()->User_id,
            'ws_country_id' => $request->countryDropdown,
            'User_password' => Hash::make($request->User_password),
            'User_updated_date' => Carbon::now()->toDateTimeString(),
        ]);
        return response()->json(['message' => 'Record Updated successfully','status'=>'success']);
    }

    public function deleteRecord(Request $request){
        User::where('User_id',$request->userId)->delete();
        return response()->json(['message'=>'User Deleted Successfuly','status'=>'success']);
    }
}
