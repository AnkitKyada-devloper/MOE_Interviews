<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    use Uuids;

    protected $table = 'roles';
    protected $primarykey = 'id';

    protected $fillable = ['user_role', 'is_active', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
