<?php

namespace App\Models;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class InterviewRounds extends Model
{
    use HasFactory;
    use Uuids;

    protected $table = 'interview_rounds';
    protected $primarykey = 'id';

    protected $fillable = ['id','name','description'];

    // public function comments()
    // {
    //     return $this->hasMany(InterviewSubRounds::class);
    // }
    public static function add_update($request,$id)
    {
        if($id){
            $interview = InterviewRounds::find($id);
            $code = 200;
            $message='Update InterviewRounds Data';

        }else{
            $round = new  InterviewRounds;
            $code = 200;
            $message='Insert InterviewRounds Data';
        }
        $interview->name=$request->name;
        $interview->description=$request->description;
        $interview->is_active=$request->is_active;
        $interview->created_by  = Auth::user()->id;
        $interview->updated_by  = Auth::user()->id;
        $interview->save();
        return [$code,$message];

    }

}
