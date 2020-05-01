<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;

class BlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::latest()->get(); 

        return view("backend.blog.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        //
       $categories = Category::all(); 
       return view("backend.blog.create", compact('post', 'categories'));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //
        $this->validate($request, [
            'title'        => 'required',
            'body'         => 'required',
            'image'        => 'mimes:jpeg,png,jpg,svg,bmp'
        ]);

        $post = new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->view_count = 0;
        $post->published_at = $request->get('published_at');
        // $post->category_id = $request->get('category_id');
        $post->author_id = Auth::user()->id;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $destination = public_path() . '/imgberita/';
            
            $successUploaded = $request->file('image')->move($destination, $file->getClientOriginalName());
            
            if($successUploaded)
            {
                $extension = $file->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $image);

                Image::make($destination . '/' . $image)
                ->resize(250, 170)
                ->save($destination . '/' . $thumbnail);
            }
            $post->image = $image;
        }else{
            $post->image = 'logo.jpg';
        }
        $post->save();
         // $request->user()->posts()->create($request->all());

        return redirect()->route('blog.index')->with('message', 'Berita berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view("backend.blog.edit", compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::where('id', $id)->first();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->published_at = $request->published_at;
        $post->author_id = Auth::user()->id;
        
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $destination = public_path() . '/imgberita/';
            
            $successUploaded = $request->file('image')->move($destination, $file->getClientOriginalName());
            
            if($successUploaded)
            {
                $extension = $file->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $image);

                Image::make($destination . '/' . $image)
                ->resize(250, 170)
                ->save($destination . '/' . $thumbnail);
            }
            $post->image = $image;
        }else{
             $post->image = $request->image;
        }
        $post->save();

        return redirect()->route('blog.index')->with('message', 'Berita berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect()->route('blog.index')->with('message', 'Berita berhasil dihapus!');
    }
}
