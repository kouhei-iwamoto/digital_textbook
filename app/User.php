<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_teacher',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function texts()
    {
        
        return $this->hasMany(Text::class);
    }
    public function loadRelationshipCounts()
    {
        $this->loadCount('texts');
    }
    
   //このユーザが使用している教科書。（ Textモデルとの関係を定義）
    public function user_text()
    {
        return $this->belongsToMany(Text::class, 'user_text','user_id', 'text_id')->withTimestamps();
    }
}
