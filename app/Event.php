<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Jenssegers\Date\Date;

class Event extends Model
{

    protected $fillable = ['title', 'author_id', 'isi', 'tempat', 'url_tempat', 'image', 'tanggal_acara'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->image))
        {
            $imagePath = public_path() . "/imgagenda/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("imgagenda/" . $this->image);
        }

        return $imageUrl;
    }

    public function scopelatestFirst($query)
    {
        return $query->orderBy('tanggal_acara', 'asc');
    }

    public function getExcerptHtmlAttribute($value)
    {
        return $this->isi ? Markdown::convertToHtml(e($webevent->isi)) : NULL;
    }

    public function scopeStart($query)
    {
        return $query->where("tanggal_acara", ">=", Carbon::now());
    }

    public function dateFormat()
    {
        Date::setLocale('id');
        
        return Date::parse($this->attributes['tanggal_acara'])
        ->format('l, j F Y');
    }

      public function dateFormatted($showTimes = false)
  {
    $format = "d/m/Y";
    if ($showTimes) $format . "H:i:s";
    return $this->created_at->format($format); 
  }
}