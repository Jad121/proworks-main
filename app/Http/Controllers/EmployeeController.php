<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Country;
use App\Models\Company;
use App\Models\ws_user;
use App\Models\Status;


use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function getAll()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }



    public function form($id = null,$copy=false)
    {

       

        $employee = [];
        $action = $id && !$copy ? 'update' : 'add';
        if ($id) {
            $employee = Employee::find($id)->toArray();
        }
        return view('employee.form', [ "employee"=>$employee, "action"=>$action]);
    }

    public function copy($id)
    {
        return $this->form($id, true);
    }


    public function list()
    {
        return view('Employee.list');
    }

    public function addRecord(Request $request)
    {
        $employeeData = $request->validate([
            'ms_company_id' => 'required',
            'ms_country_id' => 'required',
            'ms_service_id' => 'required',
            'ms_status_id' => 'required',
            'ws_user_id' => 'required',
            'ms_employee_name' => 'required',
            'ms_employee_boarder_nb' => 'required',
            'ms_employee_payment_proof_nb' => 'required',
            'ms_employee_iqama_nb' => 'required',
            'ms_employee_iqama_dob' => 'required',
            'ms_employee_iqama_expiry' => 'required',
            'ms_employee_fees' => 'required',
            'ms_employee_requested_date' => 'required',
            'ms_employee_completed_date' => 'required',
            'ms_employee_is_invoice' => 'required',
            'ms_employee_comment' => 'required',
        ]);

        $employeeData['ms_employee_created_by'] = auth()->user()->ws_user_id;
        $employeeData['ms_employee_created_date'] = Carbon::now()->toDateTimeString();
        Employee::create($employeeData);
        
        return response()->json([
            "status" => "success",
            'message' => 'Record added successfully'
        ]);
    }

    public function updateRecord(Request $request, $recordId)
    {
        $employeeData = $request->validate([
            'ms_company_id' => 'required',
            'ms_country_id' => 'required',
            'ms_service_id' => 'required',
            'ms_status_id' => 'required',
            'ws_user_id' => 'required',
            'ms_employee_name' => 'required',
            'ms_employee_boarder_nb' => 'required',
            'ms_employee_payment_proof_nb' => 'required',
            'ms_employee_iqama_nb' => 'required',
            'ms_employee_iqama_dob' => 'required',
            'ms_employee_iqama_expiry' => 'required',
            'ms_employee_fees' => 'required',
            'ms_employee_requested_date' => 'required',
            'ms_employee_completed_date' => 'required',
            'ms_employee_is_invoice' => 'required',
            'ms_employee_comment' => 'required',
        ]);

        $employeeData['ms_employee_updated_by'] = auth()->user()->ws_user_id;
        $employeeData['ms_employee_updated_date'] = Carbon::now()->toDateTimeString();

        Employee::where('ms_employee_id', $recordId)->update($employeeData);

        return response()->json(['message' => 'Record Updated successfully', 'status' => 'success']);
    }

    public function deleteRecord(Request $request){
        Employee::where('ms_employee_id',$request->recordId)->delete();
        return response()->json(['message'=>'Record Deleted Successfuly','status'=>'success']);
    }

    public function getSelect(){
        $service=Service::all();
        $country=Country::all();
        $status=Status::all();
        $company=Company::all();
        $user=ws_user::all();
        return response()->json(['service'=>$service,'country'=>$country,'status'=>$status,'company'=>$company,'user'=>$user]);
    }
}
