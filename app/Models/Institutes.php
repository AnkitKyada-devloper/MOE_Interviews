<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;



class Institutes extends Model
{
    use HasFactory;
    use Uuids;

    protected $table="institutes";
    protected $primarykey="id";

    protected $fillable=['institute_name','email','phone_number','address_line_1','address_line_2','address_line_3','city','state','country','pincode','other_infomation'];

    public static function add_update($request, $id=null){
        if($id){
            $institute = Institutes::find($id);
            $code = 201;
            $message='Update';
    
             }else{
            $institute = new Institutes;
            $code = 200;
            $message='Insert';
             }
           
                $institute->institute_name  = $request->institute_name;
                $institute->email  = $request->email;
                $institute->phone_number  = $request->phone_number;
                $institute->address_line_1  = $request->address_line_1;
                $institute->address_line_2  = $request->address_line_2;
                $institute->address_line_3  = $request->address_line_3;
                $institute->city  = $request->city;
                $institute->state  = $request->state;
                $institute->country  = $request->country;
                $institute->pincode  = $request->pincode;
                $institute->other_info  = $request->other_info;
                $institute->created_by  = Auth::user()->id;
                $institute->updated_by  = Auth::user()->id;
                $institute->save();
                return [$code,$message];
    }
}

