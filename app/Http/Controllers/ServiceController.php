<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function getAll()
    {
        $service = Service::all();
        return response()->json($service);
    }



    public function form($id = null,$copy=false)
    {

       

        $service = [];
        $action = $id && !$copy ? 'update' : 'add';
        if ($id) {
            $service = service::find($id)->toArray();
        }
        return view('service.form', [ "service"=>$service, "action"=>$action]);
    }

    public function copy($id)
    {
        return $this->form($id, true);
    }



    public function list()
    {
        return view('service.list');
    }

  
   

    public function addRecord(Request $request)
    {
       
        $service =   $request->validate([
            'ms_service_name_en' => 'required',
            'ms_service_name_ar' => 'required',
            'ms_service_name_cn' => 'required',
            'ms_service_fees' => 'required',
        ]);

        Service::create([
            'ms_service_name_en' => $request->ms_service_name_en,
            'ms_service_name_ar' => $request->ms_service_name_ar,
            'ms_service_name_cn' => $request->ms_service_name_cn,
            'ms_service_fees' => $request->ms_service_fees,
            'ms_service_created_by' => auth()->user()->ws_user_id,
           

        ]);
        return response()->json([
            "status" => "success",
            'message' => 'Record added successfully'
        ]);
    }

    public function updateRecord(Request $request, $recordId)
    {
        $service =   $request->validate([
            'ms_service_name_en' => 'required',
            'ms_service_name_ar' => 'required',
            'ms_service_name_cn' => 'required',
            'ms_service_fees' => 'required',

        ]);

        Service::where('ms_service_id', $recordId)->update([
            'ms_service_name_en' => $request->ms_service_name_en,
            'ms_service_name_ar' => $request->ms_service_name_ar,
            'ms_service_name_cn' => $request->ms_service_name_cn,
            'ms_service_fees' => $request->ms_service_fees,
            'ms_service_updated_by' => auth()->user()->ws_user_id,
            'ms_service_updated_date' => Carbon::now()->toDateTimeString(),


        ]);
        return response()->json(['message' => 'Record Updated successfully','status'=>'success']);
    }

    public function deleteRecord(Request $request){
        Service::where('ms_service_id',$request->recordId)->delete();
        return response()->json(['message'=>'Record Deleted Successfuly','status'=>'success']);
    }
}
