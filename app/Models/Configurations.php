<?php

namespace App\Models;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Configurations extends Model
{
    use HasFactory;
  

    protected $table = 'configurations';
    protected $primarykey = 'id';


    protected $fillable = ['conf_key', 'conf_value', 'display_text','description','display_order','is_active','created_by','created_at', 'updated_by', 'updated_at'];

    public static function add($request,$id)
    {
        if($id)
        {
            $configurations=Configurations::find($id);
            $code = 200;
            $message = 'Configurations Data Update';        
        }else{
            $configurations=new Configurations; 
            $code = 200;
            $message = 'Configurations Data Insert';
        }
        $configurations->conf_key=$request->conf_key;
        $configurations->conf_value=$request->conf_value;
        $configurations->display_text=$request->display_text;
        $configurations->description=$request->description;
        $configurations->display_order=$request->display_order;
        $configurations->is_active=$request->is_active;
        $configurations->created_by  = Auth::user()->id;
        $configurations->updated_by  = Auth::user()->id;
        $configurations->save();
        return [$code , $message];
    }



}