<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Traits\Uuids;


class Institutes extends Model
{
    use HasFactory;
    use Uuids;

    protected $table="institutes";
    protected $primarykey="id";

    protected $fillable=['institute_name','email','phone_number','address_line_1','address_line_2','address_line_3','city','state','country','pincode','other_infomation'];

    
}

