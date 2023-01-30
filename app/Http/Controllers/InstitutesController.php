<?php

namespace App\Http\Controllers;
use App\Models\Institutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InstitutesController extends Controller
{
    public function add(Request $request ,$id=null)
    {
        try{
            $validated = Validator::make($request->all(),[
           'institute_name' => 'required|unique:institutes',
           'email' => 'required|unique:institutes',
           'phone_number'=>'required',
           'address_line_1'=>"required",
           'address_line_2'=>"nullable",
           'address_line_3'=>"nullable",
           'city'=>"required",
           'state'=>"required",
           'country'=>"required",
           'pincode'=>"required",
           'other_info'=>"nullable"
       ]);
        
       if($validated->fails())
       {
           return response()->json([
                'code' => 404,
                'message' => $validated->errors(),
              ], 404);
       }
       
       list($code,$message)=Institutes::add_update($request,$id);
        return response()->json(['code' => $code,'message'=> 'Successfully..' . $message],200);
        }catch (Exception $e) 
        {
             return response()->json([
                'code' => 500,
                 'message' => 'Error',
             ], 500);
        }
} 
}