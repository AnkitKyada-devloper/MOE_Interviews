<?php

namespace App\Http\Controllers;
use App\Models\Institutes;
use App\Models\Users;
use App\Models\Roles;
use App\Models\Institute_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InstitutesController extends Controller
{
    public function institute(Request $request,$id=null)
    {
        try{
            $validated = Validator::make($request->all(),[
           'institutes.institute_name' => 'required',
           'institutes.email' => 'required',
           'institutes.phone_number'=>'required',
           'institutes.address_line_1'=>"required",
           'institutes.address_line_2'=>"nullable",
           'institutes.address_line_3'=>"nullable",
           'institutes.city'=>"required",
           'institutes.state'=>"required",
           'institutes.country'=>"required",
           'institutes.pincode'=>"required",
           'institutes.other_info'=>"nullable",

           'users.first_name'=>'required',
           'users.last_name'=>'required',
           'users.email' => 'required',
           'users.phone_number'=>'required'
       ]);
    
       if($validated->fails())
       {
           return response()->json(['code' => 422,'message' => $validated->errors()], 422);
       }
       
        $institute_id=Institutes::add_updated($request->institutes,$id);

        $user=Users::where('email','=',$request->users['email'])->first();
       
        if($user)
       {
        $userid=$user->id;

       }else{
        $user_role_id = Roles::where('user_role', 'Institute User')->first()->id;
        
            $user = new Users;
            $user->role_id  = $user_role_id;
            $user->first_name=$request->users['first_name'];
            $user->last_name=$request->users['last_name'];
            $user->email=$request->users['email'];
            $user->phone_number=$request->users['phone_number'];
            $user->created_by = Auth::user()->id;
            $user->updated_by = Auth::user()->id;
            $user->save();
            $userid=$user->id;
            
            }
        $check=Institute_users::where('institute_id',$institute_id)
            ->where('user_id',$userid)
            ->where('institute_user_role_id',5)->first();

            if(is_null($check))
            {
                $delete_institute_user = Institute_users::where('institute_id', $institute_id)->where('institute_user_role_id', 5)->delete();

                $instituteuser = new Institute_users;
                $instituteuser->institute_id = $institute_id;
                $instituteuser->user_id = $userid;
                $instituteuser->institute_user_role_id = 5;
                $instituteuser->status = 8;
                $instituteuser->created_by  = Auth::user()->id;
                $instituteuser->updated_by  = Auth::user()->id;
                $instituteuser->save();


            }else{
               $instituteuser=$check->id;
            }
        return response()->json(['code' => 200,'message'=> 'Successfully..' ],200);
        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    } 


    public function institute_add_update(Request $request ,$id=null)
    {
        try{
            $validated = Validator::make($request->all(),[
                'institute_name' => 'required',
                'email' => 'required',
                'phone_number'=>'required',
                'address_line_1'=>"required",
                '.address_line_2'=>"nullable",
                'address_line_3'=>"nullable",
                'city'=>"required",
                'state'=>"required",
                'country'=>"required",
                'pincode'=>"required",
                'other_info'=>"nullable",
            ]);
            if($validated->fails())
            {
                return response()->json(['code' => 422,'message' => $validated->errors()], 422);
            }
            
           list($code,$message) = Institutes::institute_add_updated($request,$id);
           return response()->json(['code' => $code,'message'=> 'Successfully..' . $message],$code);

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
    public function delete_institutes($id)
    {
        try{
            $deleteinstitutes=Institutes::find($id);
            if($deleteinstitutes)
            {
                $deleteinstitutes->delete();
                return response()->json(['code' => 200,'message' => 'Successfully !..Institutes Data Delete'], 200);
            }else{
                return response()->json(['code' => 404,'message' => 'Error'], 404);
            }
        }catch(Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }
}