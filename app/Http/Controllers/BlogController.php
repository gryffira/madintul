<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\User;
use App\Tag;
use App\Link;
use App\Ads;
use App\Event;
use App\Photo;
use App\Video;
use App\Comment;

class BlogController extends Controller
{
    protected $limit = 6;

    public function category(Category $category)
    {
     $categories = Category::with(['posts' => function($query) {
        $query->published();
    }])->orderBy('title', 'asc')->get(); 

     $posts = $category->posts()
     ->with('author')
     ->latestFirst()
     ->published()
     ->paginate($this->limit);

     $recent = Post::published()
     ->latest()
     ->take(5)
     ->get();

     $info = Link::with('author')
     ->where('jenis_id', 2)->get();

     $terkait = Link::with('author')
     ->where('jenis_id', 1)->get();    

    $close = Event::latestFirst()
    ->start()
    ->get();

     return view("blog.posts", compact( 'categories', 'posts', 'terkait', 'info', 'recent', 'close'));
 }

 public function recentpost($id)
 {
    $recent = Post::published()
    ->latest()
    ->take(5)
    ->get();

    $posts = $category->posts()
    ->with('author')
    ->latestFirst()
    ->published()
    ->paginate($this->limit);

    $close = Event::latestFirst()
    ->start()
    ->get();

    return view("blog.posts", compact( 'recent', 'posts', 'close'));
}


public function closeagenda($id)
{
    $close = Event::latestFirst()
    ->start()
    ->get();

    $posts = $category->posts()
    ->with('author')
    ->latestFirst()
    ->published()
    ->paginate($this->limit);



    return view("blog.posts", compact( 'close',  'posts'));
}

public function landpage()
{
    $landpage = post::with('author')
    ->latestFirst()
    ->published()
    ->take(3)
    ->get();

    $terkait = Link::with('author')
    ->where('jenis_id', 1)->get();

    $info = Link::with('author')
    ->where('jenis_id', 2)->get();

    $iklan = Ads::with('author')->get();

    $agenda = Event::with('author')
    ->latestFirst()
    ->start()
    ->take(3)
    ->get();


    return view("blog.landpage",  compact('landpage', 'terkait', 'info', 'iklan', 'agenda'));
}

public function showpost($id)
{
    $categories = Category::with(['posts' => function($query) {
        $query->published();
    }])->orderBy('title', 'asc')->get(); 

    $post = Post::published()
    ->findOrFail($id);

    $user = User::all();

    $post->increment('view_count');

    $recent = Post::published()
    ->latest()
    ->take(5)
    ->get();

    $terkait = Link::with('author')
    ->where('jenis_id', 1)->get();

    $info = Link::with('author')
    ->where('jenis_id', 2)->get();

    $postComments = $post->comments()->simplePaginate(3);

    $close = Event::latestFirst()
    ->start()
    ->get();

    return view("blog.showpost", compact('post', 'categories', 'terkait', 'info', 'recent', 'postComments', 'close', 'user'));
}

public function posts()
{
 $categories = Category::with(['posts' => function($query) {
    $query->published();
}])->orderBy('title', 'asc')->get();

 $posts = Post::with('author')
 ->latestFirst()
 ->published();



 if($search = request('search'))
 {
    $posts->where(function($q) use ($search){
        $q->where('title', 'LIKE', "%{$search}%");
                // $q->orWhere('title', 'LIKE', "%{$search}%");

    });
}

$posts = $posts->paginate($this->limit);

$terkait = Link::with('author')
->where('jenis_id', 1)->get();

$info = Link::with('author')
->where('jenis_id', 2)->get();

$recent = Post::published()
->latest()
->take(5)
->get();

$close = Event::latestFirst()
    ->start()
    ->get();

return view("blog.posts", compact('terkait', 'info', 'posts', 'recent', 'categories', 'close'));
}



public function event($id)
{
    $webevent = Event::with('author')
    ->findOrFail($id);

    $terkait = Link::with('author')
    ->where('jenis_id', 1)->get();

    $info = Link::with('author')
    ->where('jenis_id', 2)->get();


    $agenda = Event::with('author')
    ->latestFirst()
    ->start()
    ->get();

    return view("blog.event", compact('terkait', 'info', 'webevent', 'agenda'));
}

public function sd()
{
    $terkait = Link::with('author')
    ->where('jenis_id', 1)->get();

    $info = Link::with('author')
    ->where('jenis_id', 2)->get();


    return view("blog.sd", compact('terkait', 'info'));
}

public function smp()
{
    $terkait = Link::with('author')
    ->where('jenis_id', 1)->get();

    $info = Link::with('author')
    ->where('jenis_id', 2)->get();


    return view("blog.smp", compact('terkait', 'info'));
}

public function sma()
{
    $terkait = Link::with('author')
    ->where('jenis_id', 1)->get();

    $info = Link::with('author')
    ->where('jenis_id', 2)->get();


    return view("blog.sma", compact('terkait', 'info'));
}

public function tba()
{
    $terkait = Link::with('author')
    ->where('jenis_id', 1)->get();

    $info = Link::with('author')
    ->where('jenis_id', 2)->get();


    return view("blog.tba", compact('terkait', 'info'));
}

public function ma()
{
    $terkait = Link::with('author')
    ->where('jenis_id', 1)->get();

    $info = Link::with('author')
    ->where('jenis_id', 2)->get();


    return view("blog.ma", compact('terkait', 'info'));
}

public function galeri()
{
 $galery = Photo::with('author')
 ->latestFirst()
 ->paginate(12);

 $terkait = Link::with('author')
 ->where('jenis_id', 1)->get();

 $info = Link::with('author')
 ->where('jenis_id', 2)->get();


 return view("blog.galery", compact('terkait', 'info', 'galery'));
}

public function videos()
{
 $video = Video::with('author')
 ->latest()
 ->paginate(6);

 $terkait = Link::with('author')
 ->where('jenis_id', 1)->get();

 $info = Link::with('author')
 ->where('jenis_id', 2)->get();


 return view("blog.video", compact('terkait', 'info', 'video'));
}

}
