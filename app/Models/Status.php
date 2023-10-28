<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'ms_status';
    protected $primaryKey = 'ms_status_id';
    public $timestamps = false; 

    protected $fillable = [
        'ms_status_name_en',
        'ms_status_name_ar',
        'ms_status_name_cn',
        'ms_status_key',
        'ms_status_created_by',
        'ms_status_created_date',
        'ms_status_updated_by',
        'ms_status_updated_date',
    ];
}
