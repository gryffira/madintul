<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;

class AgendaController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $event = Event::latest()->get();
        return view("backend.agenda.index", compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        //

       return view("backend.agenda.create", compact('event'));

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
            'tanggal_acara'  => 'required',
            'tempat'  => 'required',
            'image'        => 'mimes:jpeg,png,jpg,svg,bmp'
        ]);

        $event = new Event;
        $event->title = $request->get('title');
        $event->isi = $request->get('isi');
        $event->tanggal_acara = $request->get('tanggal_acara');
        $event->tempat = $request->get('tempat');
        $event->url_tempat = $request->get('url_tempat');
        $event->author_id = Auth::user()->id;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $destination = public_path() . '/imgagenda/';
            
            $successUploaded = $request->file('image')->move($destination, $file->getClientOriginalName());
            
            if($successUploaded)
            {
                $extension = $file->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $image);

                Image::make($destination . '/' . $image)
                ->resize(250, 170)
                ->save($destination . '/' . $thumbnail);
            }
            $event->image = $image;
        }else{
            $event->image = 'logo.jpg';
        }
        $event->save();
         // $request->user()->posts()->create($request->all());

        return redirect()->route('agenda.index')->with('message', 'Agenda berhasil dibuat');
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
        $event = Event::findOrFail($id);
        return view("backend.agenda.edit", compact('event'));
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
        $event = Event::where('id', $id)->first();
        $event->title = $request->title;
        $event->tanggal_acara = $request->tanggal_acara;
        $event->tempat = $request->tempat;
        $event->url_tempat = $request->url_tempat;
        $event->isi = $request->isi;
        $event->authaor_id = Auth::user()->id;
        
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $destination = public_path() . '/imgagenda/';
            
            $successUploaded = $request->file('image')->move($destination, $file->getClientOriginalName());
            
            if($successUploaded)
            {
                $extension = $file->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $image);

                Image::make($destination . '/' . $image)
                ->resize(250, 170)
                ->save($destination . '/' . $thumbnail);
            }
            $event->image = $image;
        }else{
             $event->image = $request->image;
        }
        $event->save();

        return redirect()->route('agenda.index')->with('message', 'Agenda berhasil diubah!');
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
       $event = Event::where('id', $id)->first();
       $event->delete();
       // $this->removeImage($event->image);
       return redirect()->route('agenda.index')->with('message', 'Agenda berhasil dihapus!');
   }

   private function removeImage($image)
   {
        if(! empty($image))
        {
            $imagePath = $this->public_path . '/imgagenda/' . $image;
            $ext = substr(strrchr($image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath. '/' .$thumbnail;

            if(file_exists($imagePath)) unlink($imagePath);
            if(file_exists($thumbnailPath)) unlink($thumbnailPath); 
        }
   }
}
