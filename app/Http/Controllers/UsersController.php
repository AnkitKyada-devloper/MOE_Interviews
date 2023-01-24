<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function login(Request $request)
    {
    try{
        $validated = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);
       
        if($validated->fails())
        {
            return response()->json(
               [
                 'code' => 404,
                 'message' => $validated->errors(),
                 ], 404);
        }

        $users=Users::where('email',$request->email)->where('is_active',1)->first();
           
        if($users)
        {
         if(Hash::check($request->password, $users->password))
         {
                  
                if($users->role_id==1 || $users->role_id==2)
                {
                  $tokenResult = $users->createToken('Access Token');
                    return response()->json(['code' => 200,'message'=> 'Admin is Correct', 'token' =>$tokenResult ],200);
                        }

                        elseif($users->role_id==3)
                        {
                        $institute_user = DB::table('institute_users')->select('*')->where('user_id', '=', $users->id)->where('is_active', 1)->count();
                        
                                    if($institute_user > 0)
                                    {
                                        $tokenResult = $users->createToken('Access Token');
                                        return response()->json(['code' => 200,'message'=> 'institute is Correct' ,'access_token' => $tokenResult->accessToken],200);
                                    
                                    }else{
                                        return response()->json(['code' => 404,'message'=> 'institute not found'],404);
                                    }
                        }
                        else{
                            return response()->json(['code' => 404,'message'=> 'Data Not Found' ],404);
                }
            }
            else{
                return response()->json(['code' => 404,'message'=> 'Password is Incorrect'],404);
            }
    
        }
        else{
            return response()->json(['code' => 404,'message'=> 'Email is Incorrect'],404);
    }
    }
            catch (Exception $e) 
            {
                    return response()->json(
                    [
                        'code' => 500,
                        'message' => 'Error',
                    ], 500);
            }
                
    }

    public function register(Request  $request)
    {
      try{

        $validate = Validator::make($request->all(),[
            'role_id' => 'required',
            'first_name'=>'nullable',
            'middle_name'=>'nullable',
            'last_name'=>'nullable',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone_number'=>'nullable',
            'gender_id'=>'nullable',
            'date_of_birth'=>'nullable',
        ]);
        
    
        if($validate->fails())
        {
            return response()->json(
               [
                 'code' => 404,
                 'message' => $validate->errors(),
                 ], 404);
        }
         
         $user = new Users;
         $user->role_id  = $request->role_id;
         $user->first_name=$request->first_name;
         $user->middle_name=$request->middle_name;
         $user->last_name=$request->last_name;
         $user->email=$request->email;
         $user->password =Hash::make($request->password);
         $user->phone_number  = $request->phone_number;
         $user->gender_id  = $request->gender_id;
         $user->date_of_birth  = $request->date_of_birth;
         $user->created_by  = Auth::user()->id;
         $user->updated_by  = Auth::user()->id;
         $user->save();

         return response()->json(['code' => 200,'message'=> 'Registration  is Success'],200);
      }
       
      catch(Exception $e) 
        {
            return response()->json(
            [
                'code' => 500,
                'message' => 'Error',
            ], 500);
        }
  
    }
}