<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

	protected $fillable = ['judul', 'url', 'jenis_id', 'author_id'];
	
	public function author()
	{
		return $this->belongsTo(User::class);
	}

	public function dateFormatted($showTimes = false)
	{
		$format = "d/m/Y";
		if ($showTimes) $format . "H:i:s";
		return $this->created_at->format($format); 
	}

}