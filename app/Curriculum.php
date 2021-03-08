<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
     protected $fillable = ['title', 'content'];
     
     
     public function text()
     {
         return $this->belongsTo(Text::class);
     }
}
