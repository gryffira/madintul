<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Ads;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class IklanController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ads = Ads::latest()->get();
        return view("backend.iklan.index", compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ads $ads)
    {
        //
       return view("backend.iklan.create", compact('ads'));
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
            'excerpt'      => 'required',
            'image'        => 'mimes:jpeg,png,jpg,svg,bmp'
        ]);

        $ads = new Ads;
        $ads->title = $request->get('title');
        $ads->excerpt = $request->get('excerpt');
        $ads->url = $request->get('url');
        $ads->author_id = Auth::user()->id;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $destination = public_path() . '/imgiklan/';
            
            $successUploaded = $request->file('image')->move($destination, $file->getClientOriginalName());
            
            if($successUploaded)
            {
                $extension = $file->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $image);

                Image::make($destination . '/' . $image)
                ->resize(250, 170)
                ->save($destination . '/' . $thumbnail);
            }
            $ads->image = $image;
        }else{
            $ads->image = 'logo.jpg';
        }
        $ads->save();

        return redirect()->route('iklan.index')->with('message', 'Iklan berhasil dibuat');
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
        $ads = Ads::findOrFail($id);
        return view("backend.iklan.edit", compact('ads'));
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
        $ads = Ads::where('id', $id)->first();
        $ads->title = $request->title;
        $ads->excerpt = $request->excerpt;
        $ads->url = $request->url;
        $ads->author_id = Auth::user()->id;
        
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $destination = public_path() . '/imgiklan/';
            
            $successUploaded = $request->file('image')->move($destination, $file->getClientOriginalName());
            
            if($successUploaded)
            {
                $extension = $file->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $image);

                Image::make($destination . '/' . $image)
                ->resize(250, 170)
                ->save($destination . '/' . $thumbnail);
            }
            $ads->image = $image;
        }else{
            $ads->image = $request->image;
        }
        $ads->save();

        return redirect()->route('iklan.index')->with('message', 'Iklan berhasil diubah!');
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
        $ads = Ads::where('id', $id)->first();
        $ads->delete();
        return redirect()->route('iklan.index')->with('message', 'Iklan berhasil dihapus!');
    }
}
