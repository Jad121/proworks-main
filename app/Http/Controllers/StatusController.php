<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Carbon\Carbon;

class StatusController extends Controller
{
      public function getAll()
    {
        $status = Status::all();
        return response()->json($status);
    }

    public function form($id = null,$copy=false)
    {

       

        $status = [];
        $action = $id && !$copy ? 'update' : 'add';
        if ($id) {
            $status = status::find($id)->toArray();
        }
        // return $status["ms_status_name_en"];
        return view('status.form', [ "status"=>$status, "action"=>$action]);
    }

    public function copy($id)
    {
        return $this->form($id, true);
    }





    public function list()
    {
        return view('status.list');
    }

  
   

    public function addRecord(Request $request)
    {
       
        $status =   $request->validate([
            'ms_status_name_en' => 'required',
            'ms_status_name_ar' => 'required',
            'ms_status_name_cn' => 'required',
            // 'ms_status_key' => 'required',
        ]);

        status::create([
            'ms_status_name_en' => $request->ms_status_name_en,
            'ms_status_name_ar' => $request->ms_status_name_ar,
            'ms_status_name_cn' => $request->ms_status_name_cn,
            'ms_status_key' => "",
            'ms_status_created_by' => auth()->user()->ws_user_id,
           

        ]);
        return response()->json([
            "status" => "success",
            'message' => 'Record added successfully'
        ]);
    }

    public function updateRecord(Request $request, $recordId)
    {
        $status =   $request->validate([
            'ms_status_name_en' => 'required',
            'ms_status_name_ar' => 'required',
            'ms_status_name_cn' => 'required',
            // 'ms_status_key' => 'required',

        ]);

        status::where('ms_status_id', $recordId)->update([
            'ms_status_name_en' => $request->ms_status_name_en,
            'ms_status_name_ar' => $request->ms_status_name_ar,
            'ms_status_name_cn' => $request->ms_status_name_cn,
            'ms_status_key' => "",
            'ms_status_updated_by' => auth()->user()->ws_user_id,
            'ms_status_updated_date' => Carbon::now()->toDateTimeString(),


        ]);
        return response()->json(['message' => 'Record Updated successfully','status'=>'success']);
    }

    public function deleteRecord(Request $request){
        status::where('ms_status_id',$request->recordId)->delete();
        return response()->json(['message'=>'Record Deleted Successfuly','status'=>'success']);
    }
}
