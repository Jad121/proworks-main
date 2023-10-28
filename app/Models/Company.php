<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'ms_company';
    protected $primaryKey = 'ms_company_id';
    public $timestamps = false; 

    protected $fillable = [
        'ms_company_name_en',
        'ms_company_name_ar',
        'ms_company_name_cn',
        'ms_company_created_by',
        'ms_company_created_date',
        'ms_company_updated_by',
        'ms_company_updated_date',
    ];



// public static function get(){

//     return MS_Company::get();

// }

// public static function find($id){
    
// }

}
