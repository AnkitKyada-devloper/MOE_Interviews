<?php

namespace App\Http\Controllers;
use App\Models\Institutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InstitutesController extends Controller
{
    public function add_update(Request $request ,$id=null)
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
           return response()->json(['code' => 422,'message' => $validated->errors()], 422);
       }
       
        list($code,$message)=Institutes::add_update($request,$id);
        return response()->json(['code' => $code,'message'=> 'Successfully..' . $message],200);
        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    } 

    public function get_all($is_active=null)
    {
    try{
        
        $query=Institutes::select('id','institute_name','email','phone_number','address_line_1','city','state','country','pincode','other_info','is_active');
        if($is_active==1){
            $alldata =$query->where('Institutes.is_active',1)->get();
        }else{
            $data =$query->get();
    }
        return response()->json(['message'=> 'Successfully !..','info'=> $alldata ],200);

    }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }

    public function get_by_id($id)
    {
        try{
            $getdata=Institutes::where('id',$id)->get();
            return response()->json(['message'=> 'Successfully !..Get ID','info'=> $getdata ],200);

        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }

}