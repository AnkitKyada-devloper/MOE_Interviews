<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configurations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConfigurationsController extends Controller
{

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
}
