<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Carbon\Carbon;
use App\Video;

class VideoController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $video = Video::latest()->get();
        return view("backend.video.index", compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Video $video)
    {
        //
        return view("backend.video.create", compact('video'));
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
        'video'        => 'required'
    ]);

       $video = new Video;
       $video->title = $request->get('title');
       $video->video = $request->get('video');
       $video->author_id = Auth::user()->id;
       $video->save();

       return redirect()->route('video.index')->with('message', 'Video berhasil diupload');
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
       $video = Video::where('id', $id)->first();
       $video->delete();
       return redirect()->route('video.index')->with('message', 'Video berhasil dihapus!');
   }
}
