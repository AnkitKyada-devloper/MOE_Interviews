<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstituteUsersController extends Controller
{
    public function interview(Request $request,$id=null)
    {
     try{
        $validated = Validator::make($request->all(),[
            
            'status' => 'required',
            'is_active' => 'required'
        ]);
       
        if($validated->fails())
        {
            return response()->json(['code' => 422,'message' => $validated->errors()], 422);
        }
    } catch (Exception $e) 
    {
        return response()->json(['code' => 500,'message' => 'Error'], 500);
    }
    }
}