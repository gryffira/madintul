<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
    	'user_id', 'user_name', 'body', 'post_id'
    ];

	public function post()
	{
		return $this->belongsTo(Post::class);
	}

	public function dateFormatted($showTimes = false)
	{
		$format = "d-m-Y, H:i:s";
		if ($showTimes) $format . "H:i:s";
		return $this->created_at->format($format); 
	}
}
