<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
  protected $fillable = ['title', 'author_id', 'excerpt', 'body', 'published_at', 'image', 'view_count'];
  protected $dates = ['published_at'];

  public function author()
  {
    return $this->belongsTo(User::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }


  // public function imageThumb(){
  //   $image_thumb_url = "";

  //   if ( ! is_null($this->image))
  //   {
  //     $imagePath = public_path() . "/imgberita/" . $this->image;
  //     if (file_exists($imagePath)) $image_thumb_url = asset("imgberita/" . $this->image);
  //     }
  
  //   return $image_thumb_url;
  // }


  public function getImageUrlAttribute($value)
  {
    $imageUrl = "";

    if ( ! is_null($this->image))
    {
      $imagePath = public_path() . "/imgberita/" . $this->image;
      if (file_exists($imagePath)) $imageUrl = asset("imgberita/" . $this->image);
    }

    return $imageUrl;
  }


  public function getDateAttribute($value)
  {
    return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
  }


   // public function getBodyHtmlAttribute($value)
   // {
   //      return $this->body ? Markdown::convertToHtml(e($post->body)) : NULL;
   // }

  public function dateFormatted($showTimes = false)
  {
    $format = "d/m/Y";
    if ($showTimes) $format . "H:i:s";
    return $this->created_at->format($format); 
  }

  public function dateFormat($showTimes = false)
  {
    $format = "d/m/Y";
    if ($showTimes) $format . "H:i:s";
    return $this->published_at->format($format); 
  }

  public function publicationLabel()
  {
    if ( ! $this->published_at) {
      return '<span class="label label-warning">Draft</span>';
    }
    elseif ( $this->published_at && $this->published_at->isFuture()) {
      return '<span class="label label-info">Terjadwal</span>';
    } 
    else {
      return '<span class="label label-success">Published</span>';
    }
  }

  public function getExcerptHtmlAttribute($value)
  {
    return $this->excerpt ? Markdown::convertToHtml(e($post->excerpt)) : NULL;
  }
  

  public function scopeLatestFirst($query)
  {
    return $query->orderBy('created_at', 'desc');
  }


  public function scopePopular($query)
  {
    return $query->orderBy('view_count', 'desc');
  }


  public function scopePublished($query)
  {
    return $query->where("published_at", "<=", Carbon::now());
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

}
