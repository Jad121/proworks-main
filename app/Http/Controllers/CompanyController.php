<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Carbon\Carbon;


class CompanyController extends Controller
{

    public function list()
    {
        return view('company.list');
    }



    public function form($id = null,$copy=false)
    {

       

        $company = [];
        $action = $id && !$copy ? 'update' : 'add';
        if ($id) {
            $company = Company::find($id)->toArray();
        }
        // return $company["ms_company_name_en"];
        return view('company.form', [ "company"=>$company, "action"=>$action]);
    }

    public function copy($id)
    {
        return $this->form($id, true);
    }




    public function getAll()
    {
        $company = Company::all();
        return response()->json($company);
    }



    public function addRecord(Request $request)
    {

        $company =   $request->validate([
            'ms_company_name_en' => 'required',
            'ms_company_name_ar' => 'required',
            'ms_company_name_cn' => 'required',
        ]);

        Company::create([
            'ms_company_name_en' => $request->ms_company_name_en,
            'ms_company_name_ar' => $request->ms_company_name_ar,
            'ms_company_name_cn' => $request->ms_company_name_cn,
            'ms_company_created_by' => auth()->user()->ws_user_id,


        ]);
        return response()->json([
            "status" => "success",
            'message' => 'Record added successfully'
        ]);
    }

    public function updateRecord(Request $request, $recordId)
    {
        $company =   $request->validate([
            'ms_company_name_en' => 'required',
            'ms_company_name_ar' => 'required',
            'ms_company_name_cn' => 'required',
        ]);

        Company::where('ms_company_id', $recordId)->update([
            'ms_company_name_en' => $request->ms_company_name_en,
            'ms_company_name_ar' => $request->ms_company_name_ar,
            'ms_company_name_cn' => $request->ms_company_name_cn,
            'ms_company_updated_by' => auth()->user()->ws_user_id,
            'ms_company_updated_date' => Carbon::now()->toDateTimeString(),


        ]);
        return response()->json(['message' => 'Record Updated successfully', 'status' => 'success']);
    }

    public function deleteRecord(Request $request)
    {
        Company::where('ms_company_id', $request->recordId)->delete();
        return response()->json(['message' => 'Record Deleted Successfuly', 'status' => 'success']);
    }
}
