<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'ws_country';
    protected $primaryKey = 'ws_country_id';
    public $timestamps = false; 

    protected $fillable = [
        'ws_country_name_en',
        'ws_country_name_ar',
        'ws_country_name_cn',
        'ws_country_created_by',
        'ws_country_created_date',
        'ws_country_updated_by',
        'ws_country_updated_date',
    ];
}
