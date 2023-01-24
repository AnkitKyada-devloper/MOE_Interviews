<?php

namespace App\Models;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configurations extends Model
{
    use HasFactory;
    use Uuids;

    protected $table = 'configurations';
    protected $primarykey = 'id';


    protected $fillable = ['conf_key', 'conf_value', 'display_text','description','display_order','is_active','created_by','created_at', 'updated_by', 'updated_at'];
}