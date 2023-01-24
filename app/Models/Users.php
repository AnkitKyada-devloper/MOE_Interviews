<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasFactory;
    use HasApiTokens; 
    use Uuids;
    
    protected $table = 'users';
    protected $keyType = 'string';
    public $incremeting = false;
    protected $primarykey = 'id';

    protected $fillable = ['role_id', 'first_name', 'middle_name','last_name','email ','password','phone_number','gender_id ','date_of_birth','is_active','created_by', 'created_at', 'updated_by', 'updated_at'];
}
