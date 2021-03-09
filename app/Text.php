<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['title'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('curriculums');
    }
}
