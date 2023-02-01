<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Institute_users extends Model
{
    use HasFactory;
    use Uuids;

    protected $table="institute_users";
    protected $primarykey="id";

    protected $fillable=['institute_id','user_id','institute_user_role_id','status'];


}