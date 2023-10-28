<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'ws_employee';
    protected $primaryKey = 'ms_employee_id';
    public $timestamps = false; 

    protected $fillable = [
        'ms_company_id',
        'ms_country_id',
        'ms_service_id',
        'ms_status_id',
        'ws_user_id',
        'ms_employee_name',
        'ms_employee_boarder_nb',
        'ms_employee_payment_proof_nb',
        'ms_employee_iqama_nb',
        'ms_employee_iqama_dob',
        'ms_employee_iqama_expiry',
        'ms_employee_fees',
        'ms_employee_requested_date',
        'ms_employee_completed_date',
        'ms_employee_is_invoice',
        'ms_employee_comment',
        'ms_employee_created_by',
        'ms_employee_created_date',
        'ms_employee_updated_by',
        'ms_employee_updated_date',
    ];
}
