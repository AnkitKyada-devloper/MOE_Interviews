<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Job_titles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobTitlesController extends Controller
{
   public function add_update(Request $request,$id=null)
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
       list($code,$message)=Job_titles::add_update($request,$id);
        return response()->json(['code' => $code,'message'=> 'Successfully..' . $message],$code);
        
    }catch (Exception $e) {
            return response()->json([
            'code' => 500,
                'message' => 'Error',
            ], 500);
        }
    }
    public function get_all($is_active=null)
    {

     try{
        
        $query=Job_titles::select('id','name','description','is_active');
        if($is_active==1){
            $data =$query->where('Job_titles.is_active',1)->get();
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
            $data=Job_titles::where('id',$id)->get();
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