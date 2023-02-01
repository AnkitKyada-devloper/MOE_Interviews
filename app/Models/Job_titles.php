<?php

namespace App\Models;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job_titles extends Model
{
    use HasFactory;
    use Uuids;

    protected $table = 'job_titles';
    protected $primarykey = 'id';

    protected $fillable = ['id','name','description'];

    public static function add_update($request,$id)
    {
        if($id){
            $title = Job_titles::find($id);
            $code = 200;
            $message='Update Job_titles Data';
    
                }else{
            $title = new Job_titles;
            $code = 200;
            $message='Insert Job_titles Data';
                }
            
            $title->name=$request->name;
            $title->description=$request->description;
            $title->is_active=$request->is_active;
            $title->created_by  = Auth::user()->id;
            $title->updated_by  = Auth::user()->id;
            $title->save();
            return [$code,$message];
    }
}