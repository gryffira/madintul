<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Carbon\Carbon;

class Santri extends Model
{

  protected $table = 'santris';
  protected $fillable = ['nis', 
  'user_id',
  'image', 
  'nama_depan', 
  'nama_belakang', 
  'jenis_kl', 
  'tempat_lahir', 
  'tgl_lahir', 
  'alamat', 
  'agama', 
  'no_tlp', 
  'nama_ayah', 
  'pekerjaan_ayah', 
  'nama_ibu', 
  'pekerjaan_ibu'];

  public function dateFormated()
  {

    return Date::parse($this->attributes['tgl_lahir'])
    ->format('j F Y');
}

public function getImageUrlAttribute($value)
{
    $imageUrl = "/imgsantri/default-profile.png";

    if ( ! is_null($this->image))
    {
      $imagePath = public_path() . "/imgsantri/" . $this->image;
      if (file_exists($imagePath)) $imageUrl = asset("imgsantri/" . $this->image);
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