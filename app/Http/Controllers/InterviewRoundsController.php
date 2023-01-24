<?php

namespace App\Http\Controllers;

use App\Models\InterviewRounds;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InterviewRoundsController extends Controller
{
    public function interview(Request $request)
    {
   
     try{
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'nullable'
        ]);
       
        if($validated->fails())
        {
            return response()->json([
                 'code' => 404,
                 'message' => $validated->errors(),
               ], 404);
        }
         
        $interview = new InterviewRounds;
        $interview->name=$request->name;
        $interview->description=$request->description;
        $interview->created_by  = Auth::user()->id;
        $interview->updated_by  = Auth::user()->id;
        $interview->save();
        return response()->json(['code' => 200,'message'=> 'Registration  is Success'],200);
   }

    // catch (Exception $e) 
    {
            return response()->json([
                'code' => 500,
                'message' => 'Error',
            ], 500);
        }
    }
}