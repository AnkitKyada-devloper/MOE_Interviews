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

    protected $fillable = ['name','description'];
}
