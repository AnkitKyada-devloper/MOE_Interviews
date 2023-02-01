<?php

namespace App\Models;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class InterviewSubRounds extends Model
{
    use HasFactory;
    use Uuids;

    protected $table = 'interview_sub_rounds';
    protected $primarykey = 'id';

    protected $fillable = ['id','round_id','name','description'];

    // public function user()
    // {
    //     return $this->belongsTo(InterviewRounds::class,'round_id');
    // }
    public static function add_update($request,$id)
    {
        
        if($id){
        $round = InterviewSubRounds::find($id);
        $code = 200;
        $message='Update InterviewSubRounds Data';

         }else{
        $round = new InterviewSubRounds;
        $code = 200;
        $message='Insert InterviewSubRounds Data';
         }
       
        $round->round_id=$request->round_id;
        $round->name=$request->name;
        $round->description=$request->description;
        $round->is_active=$request->is_active;
        $round->created_by  = Auth::user()->id;
        $round->updated_by  = Auth::user()->id;
        $round->save();
        return [$code,$message];
    }

}