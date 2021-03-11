<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     protected $table = 'questions';
     protected $fillable = ['title', 'content', 'curriculum_id', 'answer'];
     
     
     public function curriculum()
     {
         return $this->belongsTo(Curriculum::class);
     }
}
