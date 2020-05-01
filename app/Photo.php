<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

	protected $fillable = ['name', 'image', 'author_id'];
	
	public function author()
	{
		return $this->belongsTo(User::class);
	}

	 public function scopeLatestFirst($query)
  {
    return $query->orderBy('created_at', 'desc');
  }

   public function getImageUrlAttribute($value)
  {
    $imageUrl = "";

    if ( ! is_null($this->image))
    {
      $imagePath = public_path() . "/imggaleri/" . $this->image;
      if (file_exists($imagePath)) $imageUrl = asset("imggaleri/" . $this->image);
    }

    return $imageUrl;
  }

    public function dateFormat($showTimes = false)
  {
    $format = "d/m/Y";
    if ($showTimes) $format . "H:i:s";
    return $this->created_at->format($format); 
  }

}