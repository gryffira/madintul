<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request\UserStoreRequest;

class User extends Authenticatable
{
    protected $primaryKey = 'id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
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

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes) $format . "H:i:s";
        return $this->created_at->format($format); 
    }

 public function posts(){

    return $this->hasMany(Post::class,'author_id','id');
}    

public function ads(){

    return $this->hasMany(Ads::class,'author_id','id');

}
public function events(){

    return $this->hasMany(Event::class,'author_id','id');

}
public function links(){

    return $this->hasMany(Link::class,'author_id','id');

}
public function photos(){

    return $this->hasMany(Photo::class,'author_id','id');

}

public function videos(){

    return $this->hasMany(Video::class,'author_id','id');

}

    public function setPasswordAttribute($password)
{
    $this->attributes['password'] = \Hash::make($password);
}

public function santri(){

    return $this->hasOne(Santri::class,'user_id','id');
    
}

public function staff(){

    return $this->hasOne(Staff::class,'user_id','id');
    
}

public function admin(){

    return $this->hasOne(Staff::class,'user_id','id');
    
}

public function comments(){

    return $this->hasMany(Comment::class,'user_id','id');

}


}
