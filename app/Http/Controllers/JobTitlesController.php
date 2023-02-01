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
       return response()->json(['code' => 422,'message' => $validated->errors()],422);
    }
       list($code,$message)=Job_titles::add_update($request,$id);
        return response()->json(['code' => $code,'message'=> 'Successfully..' . $message],$code);
        
    }catch (Exception $e) {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }
    public function get_all($is_active=null)
    {
     try{
        $query=Job_titles::select('id','name','description','is_active');

        if($is_active==1){
            $activedata =$query->where('Job_titles.is_active',1)->get();
        }else{
            $activedata =$query->get();
        }
        return response()->json(['message'=> 'Successfully','info'=> $activedata ],200);

    }catch (Exception $e) 
        {
         return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }

    public function get_by_id($id)
    {
        try{
            $data=Job_titles::where('id',$id)->get();
            return response()->json(['message'=> 'Successfully','info'=> $data ],200);

        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }

    public function delete($id)
    {
        try{
            $deletedata=Job_titles::find($id);
            
            if($deletedata)
            {
              $deletedata->delete();
                return response()->json(['code' => 200,'message' => 'Successfully !..Job_titles Data Delete'], 200);
            }else{   
              return response()->json(['code' => 400,'message' => 'Error'], 400);
            }
            }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }

    public function active_change($id,$is_active)
    {
        try{
            $title= Job_titles::find($id);
            $title->is_active=$is_active;
            $title->save();
            return response()->json(['code' => 200,'message' => 'Successfully !..Job_titles Data Update'], 200);

        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }
}
    