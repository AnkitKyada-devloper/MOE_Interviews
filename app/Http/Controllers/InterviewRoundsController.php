<?php

namespace App\Http\Controllers;

use App\Models\InterviewRounds;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class InterviewRoundsController extends Controller
{
    public function interview(Request $request,$id=null)
    {
   
     try{
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'nullable',
            'is_active' => 'required'
        ]);
        if($validated->fails())
        {
            return response()->json([
                 'code' => 404,
                 'message' => $validated->errors(),
               ], 404);
        }
       
        list($code,$message)=InterviewRounds::add_update($request,$id);
        return response()->json(['code' => $code,'message'=> ' Successfully..'. $message],200);
        }

    catch (Exception $e) 
    {
            return response()->json([
                'code' => 500,
                'message' => 'Error',
            ], 500);
        }
    }
    public function get_by_id($id)
    {
        try{
            $data=InterviewRounds::where('id',$id)->get();
            return response()->json(['message'=> 'Successfully','info'=> $data ],200);

        }catch (Exception $e) 
        {
            return response()->json([
                'code' => 500,
                'message' => 'Error',
            ], 500);
        }
    }
    
}