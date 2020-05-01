<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cohensive\Embed\Facades\Embed;

class Video extends Model
{
    //
	protected $fillable = ['title', 'video', 'author_id'];

	public function author()
	{
		return $this->belongsTo(User::class);
	}

	public function getVideoHtmlAttribute()
	{
		$embed = Embed::make($this->video)->parseUrl();

		if (!$embed)
			return '';

		$embed->setAttribute(['width' => 500]);
		return $embed->getHtml();
	}
	
	public function dateFormat($showTimes = false)
	{
		$format = "d/m/Y";
		if ($showTimes) $format . "H:i:s";
		return $this->created_at->format($format); 
	}
}
