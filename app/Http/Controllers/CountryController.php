<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Carbon\Carbon;

class CountryController extends Controller
{



    public function list()
    {
        return view('country.list');
    }

    public function form($id = null,$copy=false)
    {

        $country = [];
        $action = $id && !$copy ? 'update' : 'add';
        if ($id) {
            $country = Country::find($id)->toArray();
        }
        return view('country.form', compact('country', 'action'));
    }

    

    public function copy($id)
    {
        return $this->form($id, true);
    }

    public function getAll()
    {
        $country = Country::all();
        return response()->json($country);
    }






    public function addRecord(Request $request)
    {

        $country =   $request->validate([
            'ws_country_name_en' => 'required',
            'ws_country_name_ar' => 'required',
            'ws_country_name_cn' => 'required',
        ]);

        Country::create([
            'ws_country_name_en' => $request->ws_country_name_en,
            'ws_country_name_ar' => $request->ws_country_name_ar,
            'ws_country_name_cn' => $request->ws_country_name_cn,
            'ws_country_created_by' => auth()->user()->ws_user_id,


        ]);
        return response()->json([
            "status" => "success",
            'message' => 'Record added successfully'
        ]);
    }

    public function updateRecord(Request $request, $recordId)
    {
        $country =   $request->validate([
            'ws_country_name_en' => 'required',
            'ws_country_name_ar' => 'required',
            'ws_country_name_cn' => 'required',
        ]);

        Country::where('ws_country_id', $recordId)->update([
            'ws_country_name_en' => $request->ws_country_name_en,
            'ws_country_name_ar' => $request->ws_country_name_ar,
            'ws_country_name_cn' => $request->ws_country_name_cn,
            'ws_country_updated_by' => auth()->user()->ws_user_id,
            'ws_country_updated_date' => Carbon::now()->toDateTimeString(),


        ]);
        return response()->json(['message' => 'Record Updated successfully', 'status' => 'success']);
    }

    public function deleteRecord(Request $request)
    {

        Country::where('ws_country_id', $request->recordId)->delete();
        return response()->json(['message' => 'Deleted Successfuly', 'status' => 'success']);
    }
}
