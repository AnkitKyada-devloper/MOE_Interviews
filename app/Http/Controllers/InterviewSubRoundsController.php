<?php

namespace App\Http\Controllers;
use App\Models\InterviewSubRounds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InterviewSubRoundsController extends Controller
{
    public function subround(Request $request,$id=null)
    {
        try{
             $validated = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'nullable',
            'is_active'=>"required"
        ]);
        
        if($validated->fails())
        {
            return response()->json([
                 'code' => 404,
                 'message' => $validated->errors(),
               ], 404);
        }
       
        list($code,$message)=InterviewSubRounds::add_update($request,$id);
        return response()->json(['code' => $code,'message'=> 'Successfully..' . $message],200);
       
        }
   
        catch (Exception $e) 
        {
             return response()->json([
                'code' => 500,
                 'message' => 'Error',
             ], 500);
        }
    }
   
    public function get_all($is_active=null)
    {
        //
        try{
     // $query=InterviewSubRounds::with('user');  
     $query=InterviewSubRounds::join('Interview_rounds as ir','ir.id','=' , 'interview_sub_rounds.round_id')
            ->select('interview_sub_rounds.*','ir.name as round_name');

        if($is_active){
            $data =$query->where('interview_sub_rounds.is_active',1)->get();
        }else{
            $data =$query->get();
    }
        return response()->json(['message'=> 'Successfully','info'=> $data ],200);
    }catch (Exception $e) 
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
            $data=InterviewSubRounds::where('id',$id)->get();
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