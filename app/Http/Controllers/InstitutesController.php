<?php

namespace App\Http\Controllers;
use App\Models\Institutes;
use Illuminate\Http\Request;

class InstitutesController extends Controller
{
    public function add(Request $request){

        $institute= new Institutes;
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
        $institute->other_infomation  = $request->other_infomation;
        $institute->created_by  = Auth::user()->id;
        $institute->updated_by  = Auth::user()->id;
        $institute->save();
    
    
    
        }
    
    

}
