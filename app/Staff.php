<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Carbon\Carbon;

class Staff extends Model
{
    //
    protected $fillable = ['image', 
                          'user_id', 
                          'nama_depan', 
                          'nama_belakang', 
                          'jenis_kl', 
                          'tempat_lahir', 
                          'tgl_lahir', 
                          'alamat', 
                          'agama', 
                          'no_tlp', 
                          'ijazah_terakhir', 
                          'tahun_ijazah_trkhr', 
                          'nuptk', 
                          'status_kawin'];

	 public function dateFormated()
    {
        return Date::parse($this->attributes['tgl_lahir'])
        ->format('j F Y');
    }

	public function getImageUrlAttribute($value)
  {
    $imageUrl = "/imgstaff/default-profile.png";

    if ( ! is_null($this->image))
    {
      $imagePath = public_path() . "/imgstaff/" . $this->image;
      if (file_exists($imagePath)) $imageUrl = asset("imgstaff/" . $this->image);
    }

    return $imageUrl;
  }

  public function dateBirth()
{

 Date::setLocale('id');
 return Date::parse($this->attributes['tgl_lahir'])
 ->format('j F Y');
}

public function dateNow()
{
    Date::setLocale('id');
    return Date::now()->format('l, j F Y');
}

public function user(){

    return $this->hasOne(User::class,'id','user_id');
    
}

public function comments(){

    return $this->hasMany(Comment::class,'user_id','id');

}

}
