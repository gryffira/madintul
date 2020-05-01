<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
use App\Santri;
use Auth;
use App\Post;
use App\Exports\SantrisExport;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class ProfilSantriController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $posts = Post::with('author')
        ->latestFirst()
        ->published()
        ->take(4)
        ->get();

        return view("backend.profilsantri.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $santri = Santri::findOrFail(Auth::user()->santri->id);
        
        return view("backend.profilsantri.edit", compact('santri'));
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
        // $user = User::where('id', $id)->first();
        // $user->image = $request->image;
        // $user->save();

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

       return redirect()->route('profilsantri.edit', Auth::user()->santri->id)->with('message', 'Data berhasil diubah!');
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
    }
}
