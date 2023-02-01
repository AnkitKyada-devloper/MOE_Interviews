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

    public static function add_updated($data,$id){
        if($id){
            $institute=Institutes::find($id);
            $code = 200;
            $message = 'Configurations Data Update';        
        }else{
            $institute=new Institutes; 
            $code = 200;
            $message = 'Configurations Data Insert';
        }
            //    $institute = new Institutes;
                $institute->institute_name = $data['institute_name'];
                $institute->email = $data['email'];
                $institute->phone_number = $data['phone_number'];
                $institute->address_line_1 = $data['address_line_1'];
                $institute->address_line_2 = $data['address_line_2'];
                $institute->address_line_3 = $data['address_line_3'];
                $institute->city = $data['city'];
                $institute->state = $data['state'];
                $institute->country = $data['country'];
                $institute->pincode = $data['pincode'];
                $institute->other_info = $data['other_info'];
                $institute->created_by = Auth::user()->id;
                $institute->updated_by = Auth::user()->id;
                $institute->save();
                return  $id = $institute->id;
                
    }
    
        // public static function institute_add_updated($data,$id){
        //         if($id){
        //             $institute=Institutes::find($id);
        //             $code = 200;
        //             $message = 'Configurations Data Update';        
        //         }else{
        //             $institute=new Institutes; 
        //             $code = 200;
        //             $message = 'Configurations Data Insert';
        //         }
        //         $institute->institute_name = $data['institute_name'];
        //         $institute->email = $data['email'];
        //         $institute->phone_number = $data['phone_number'];
        //         $institute->address_line_1 = $data['address_line_1'];
        //         $institute->address_line_2 = $data['address_line_2'];
        //         $institute->address_line_3 = $data['address_line_3'];
        //         $institute->city = $data['city'];
        //         $institute->state = $data['state'];
        //         $institute->country = $data['country'];
        //         $institute->pincode = $data['pincode'];
        //         $institute->other_info = $data['other_info'];
        //         $institute->created_by = Auth::user()->id;
        //         $institute->updated_by = Auth::user()->id;
        //         $institute->save();
        //         return [$code , $message];
        //     }
            }

