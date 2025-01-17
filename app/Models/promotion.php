<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student(){

    return $this->belongsTo('App\Models\Student','student_id');
    }

    public function f_grade(){

     return $this->belongsTo('App\Models\Grade','from_grade');
    }
    public function academic_year(){

    return $this->belongsTo('App\Models\Student','academic_year');
     }

    public function f_classroom(){

    return $this->belongsTo('App\Models\Classroom','from_Classroom');

    }

    public function f_section(){
        return $this->belongsTo('App\Models\Section' , 'from_section');
    }


    public function t_grade(){
  
        return $this->belongsTo('App\Models\Grade','to_grade');
       }
       public function academic_year_new(){

       return $this->belongsTo('App\Models\Student','academic_year_new');
        }

       public function t_classroom(){

       return $this->belongsTo('App\Models\Classroom','to_Classroom');

       }

       public function t_section(){
           return $this->belongsTo('App\Models\Section' , 'to_section');
       }






}
