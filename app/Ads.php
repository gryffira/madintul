<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    
    protected $fillable = ['title', 'author_id', 'excerpt', 'url', 'image'];
    

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->image))
        {
            $imagePath = public_path() . "/imgiklan/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("imgiklan/" . $this->image);
        }

        return $imageUrl;
    }

    public function dateFormatted($showTimes = false)
  {
    $format = "d/m/Y";
    if ($showTimes) $format . "H:i:s";
    return $this->created_at->format($format); 
  }
}