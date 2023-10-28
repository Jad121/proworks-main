<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;   
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }


    public static function getAllTables()
    {
        $tables = DB::select('SHOW TABLES');
        $tableNames = array_column($tables, 'Tables_in_' . env('DB_DATABASE'));

        return  $tableNames;
    }

    public function getTable( $tablename){

        if (!Schema::hasTable($tablename)) {
            abort(404); 
        }
        $columns = Schema::getColumnListing($tablename);
        $data = DB::table($tablename)->get();
        return view('admin.tables.single_table',compact('data','columns','tablename'));
    }

    public function delete($tablename, $id)
    {
        if (!Schema::hasTable($tablename)) {
            abort(404); // Table doesn't exist
        }
        $idn=$tablename.'_id';
        DB::table($tablename)->where($idn, $id)->delete();
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }

    public function updateRecord($tablename, $id, Request $request)
    {
        $tableColumns = Schema::getColumnListing($tablename);
        $data = $request->only($tableColumns);

        // Remove non-existent columns from the data array
        $data = array_filter($data, function ($key) use ($tableColumns) {
            return in_array($key, $tableColumns);
        }, ARRAY_FILTER_USE_KEY);

        // Update the record in the specified table
        $idn=$tablename.'_id';
        DB::table($tablename)->where($idn, $id)->update($data);

    

        DB::table($tablename)->where($idn,$id)->update([
            $tn.'_updated_by'=>auth()->user()->ws_user_id,
            $tn.'_updated_date'=>now()->format('Y-m-d H:i:s'),
        ]);
        return redirect()->back();
    }

    public function addRecord($tablename, Request $request)
    {
        $tableColumns = Schema::getColumnListing($tablename);
        $data = $request->only($tableColumns);

        // Remove non-existent columns from the data array
        $data = array_filter($data, function ($key) use ($tableColumns) {
            return in_array($key, $tableColumns);
        }, ARRAY_FILTER_USE_KEY);

        // Create the record in the specified table
        DB::table($tablename)->insert($data);
        return redirect()->back();
    }



}
