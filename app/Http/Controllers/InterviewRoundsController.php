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
            return response()->json(['code' => 422,'message' => $validated->errors()], 422);
        }
       
        list($code,$message)=InterviewRounds::add_update($request,$id);
        return response()->json(['code' => $code,'message'=> ' Successfully..'. $message],200);
        }

        catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }
    public function get_all($is_active=null)
    {

     try{
        $query=InterviewRounds::select('id','name','description','is_active');
        
        if($is_active==1){
            $data =$query->where('interview_rounds.is_active',1)->get();
        }else{
            $data =$query->get();
        }
        return response()->json(['message'=> 'Successfully','info'=> $data ],200);

    }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }

    public function get_by_id($id)
    {
        try{
            $getdata=InterviewRounds::where('id',$id)->get();
            return response()->json(['message'=> 'Successfully','info'=> $getdata ],200);

        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }
    public function deleteround($id)
    {
        try{
            $deleterounddata=InterviewRounds::find($id);
            if($deleterounddata)
            {
                $deleterounddata->delete();
                return response()->json(['code' => 200,'message' => 'Successfully !..InterviewRounds Data Delete'], 200);
            }else{
                return response()->json(['code' => 404,'message' => 'Error'], 404);
            }
        }catch(Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }
    public function active_change_rounds($id,$is_active)
    {
        try{
            $title= InterviewRounds::find($id);
            $title->is_active=$is_active;
            $title->save();
            return response()->json(['code' => 200,'message' => 'Successfully !..InterviewRounds Data Update'], 200);

        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }
}