<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[] ;


    public function gender(){
        return $this->belongsTo('App\Models\Gender','gender_id');
    }

    public function grade(){
        return $this->belongsTo('App\Models\Grade','Grade_id');
    }

    public function classroom(){
        return $this->belongsTo('App\Models\Classroom','Classroom_id');
    }

    public function section(){
        return $this->belongsTo('App\Models\Section','section_id');
    }

    public function images(){
        return $this->morphMany('App\Models\Image','imageable');
    }

    public function Nationality(){
        return $this->belongsTo('App\Models\Nationalitie' , 'nationalitie_id');
    }

    public function myparent(){
        return $this->belongsTo('App\Models\My_Parent', 'parent_id')    ;
    }


    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAccount', 'student_id');

    }

}
