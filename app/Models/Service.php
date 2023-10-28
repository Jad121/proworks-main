<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'ms_service';
    protected $primaryKey = 'ms_service_id';
    public $timestamps = false; 

    protected $fillable = [
        'ms_service_name_en',
        'ms_service_name_ar',
        'ms_service_name_cn',
        'ms_service_fees',
        'ms_service_created_by',
        'ms_service_created_date',
        'ms_service_updated_by',
        'ms_service_updated_date',
    ];
}
