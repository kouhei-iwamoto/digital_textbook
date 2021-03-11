<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
     protected $table = 'curriculums';
     protected $fillable = ['title', 'content', 'text_id'];
     
     
     public function text()
     {
         return $this->belongsTo(Text::class);
     }
     
     public function questions()
     {
           return $this->hasMany(Question::class);
     }
     
     public function loadRelationshipCounts()
    {
       $this->loadCount('questions');
    }
}
