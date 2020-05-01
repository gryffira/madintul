<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\User;

class HomeController extends BackendController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    	$posts = Post::with('author')
    	->latestFirst()
    	->published()
    	->take(4)
    	->get();

    	$jumlah_santri = DB::select('select * FROM santris');
    	$jumlah_guru= DB::select('select * FROM staff WHERE posisi="Pendidik"');
    	$jumlah_staff= DB::select('select * FROM staff WHERE posisi="Kependidikan"');

    	return view('/backend/home',compact('jumlah_santri', 'jumlah_guru', 'jumlah_staff', 'posts'));


    }
}
