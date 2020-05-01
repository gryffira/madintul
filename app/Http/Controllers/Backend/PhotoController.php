<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Photo;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class PhotoController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $photo = Photo::latest()->get();
        return view("backend.photo.index", compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Photo $photo)
    {
        //
        return view("backend.photo.create", compact('photo'));
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
            'image'        => 'mimes:jpeg,png,jpg,svg,bmp'
        ]);

        $photo = new Photo;
        $photo->name = $request->get('name');
        $photo->author_id = Auth::user()->id;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $destination = public_path() . '/imggaleri/';
            
            $successUploaded = $request->file('image')->move($destination, $file->getClientOriginalName());
            
            if($successUploaded)
            {
                $extension = $file->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $image);

                Image::make($destination . '/' . $image)
                ->resize(250, 170)
                ->save($destination . '/' . $thumbnail);
            }
            $photo->image = $image;
        }
        $photo->save();

        return redirect()->route('photo.index')->with('message', 'Foto berhasil diupload');
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
       $santri = Santri::where('id', $id)->first();

       $santri->nis = $request->nis;
       $santri->nama_depan = $request->nama_depan;
       $santri->nama_belakang = $request->nama_belakang;
       $santri->jenis_kl = $request->jenis_kl;
       $santri->tempat_lahir = $request->tempat_lahir;
       $santri->tgl_lahir = $request->tgl_lahir;
       $santri->alamat = $request->alamat;
       $santri->agama = $request->agama;
       $santri->no_tlp = $request->no_tlp;
       $santri->nama_ayah = $request->nama_ayah;
       $santri->pekerjaan_ayah = $request->pekerjaan_ayah;
       $santri->nama_ibu = $request->nama_ibu;
       $santri->pekerjaan_ibu = $request->pekerjaan_ibu;

       if ($request->hasFile('image'))
       {
        $file = $request->file('image');
        $image = $file->getClientOriginalName();
        $destination = public_path() . '/imgsantri/';
        
        $successUploaded = $request->file('image')->move($destination, $file->getClientOriginalName());
        
        if($successUploaded)
        {
            $extension = $file->getClientOriginalExtension();
            $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $image);

            Image::make($destination . '/' . $image)
            ->resize(200, 200)
            ->save($destination . '/' . $thumbnail);
        }
        $santri->image = $image;
    }else{
     $santri->image = $request->image;
 }
 $santri->save();

 return redirect()->route('santri.editprofil')->with('message', 'Data santri berhasil diubah!');
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
        $photo = Photo::where('id', $id)->first();
        $photo->delete();
        return redirect()->route('photo.index')->with('message', 'Foto berhasil dihapus!');
    }
}
