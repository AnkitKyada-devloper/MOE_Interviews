<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configurations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConfigurationsController extends Controller
{

    public function add_update(Request $request,$id=null)
    {
        $validated = Validator::make($request->all(),[
            'conf_key' => 'required',
            'conf_value'=> 'required',
            'display_text'=>'required',
            'description' => 'nullable',
            'display_order'=>'required',
            'is_active'=>'required'
        ]);
        
        if($validated->fails())
        {
            return response()->json(['code' => 422,'message' => $validated->errors()], 422);
        }

        try{
           list($code,$message)=Configurations::add($request,$id);
           return response()->json(['code' => $code,'message'=> ' Successfully..'. $message],200);

        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }
    public function delete($id)
    {
        try{

            $remove=Configurations::find($id);
            if($remove){
                $remove->delete();
             return response()->json(['code' => 200,'message' => 'Successfully !..Configurations Data Delete'], 200);
        }else{
            return response()->json(['code' => 404,'message' => 'Error'], 404);
        }
        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }

    public function get_all($is_active=null)
    {
     try{
        
        $query=Configurations::select('id','conf_key','conf_value','display_text','description','display_order','is_active');
        if($is_active==1){
            $data =$query->where('configurations.is_active',1)->get();
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
            $data=Configurations::where('id',$id)->get();
            return response()->json(['message'=> 'Successfully','info'=> $data ],200);

        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }

    public function get_conf_key($conf_key)
    {
        try{
            $query=Configurations::select('id','conf_key','conf_value','display_text');
            if($conf_key){
                $data =$query->where('configurations.conf_key',$conf_key)->get();
                return response()->json(['message'=> 'Successfully','info'=> $data ],200);
            }
            else{
                $data =$query->get();
            }
             return response()->json(['message'=> 'Successfully','info'=> $data ],200);
        
        }catch (Exception $e) 
            {
                return response()->json(['code' => 500,'message' => 'Error'], 500);
            }
    }
    public function get_conf_value($conf_key,$conf_value)
    {
        try{
            $query=Configurations::select('id','display_text');
            if([$conf_key,$conf_value]){
                $data =$query->where('configurations.conf_key',$conf_key)->where('configurations.conf_value',$conf_value)->get();

                return response()->json(['message'=> 'Successfully','info'=> $data],200);
            }
            else{
                $data =$query->get();
            }
             return response()->json(['message'=> 'Successfully','info'=> $data ],200);
        
        }catch (Exception $e) 
            {
                return response()->json(['code' => 500,'message' => 'Error'], 500);
            }
    }
    public function change_cong($id,$is_active)
    {
        try{
            $title= Configurations::find($id);
            $title->is_active=$is_active;
            $title->save();
            return response()->json(['code' => 200,'message' => 'Successfully !..Configurations Data Update'], 200);

        }catch (Exception $e) 
        {
            return response()->json(['code' => 500,'message' => 'Error'], 500);
        }
    }
}
