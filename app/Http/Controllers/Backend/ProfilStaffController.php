<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
use App\Staff;
use App\Post;
use Auth;
use App\Exports\StaffsExport;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class ProfilStaffController extends BackendController
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

        return view("backend.profilstaff.index", compact('posts'));
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
        $staff = Staff::findOrFail(Auth::user()->staff->id);
        return view("backend.profilstaff.edit", compact('staff'));
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

     $staff = Staff::where('id', $id)->first();

     $staff->nik = $request->nik;
     $staff->nama_depan = $request->nama_depan;
     $staff->nama_belakang = $request->nama_belakang;
     $staff->jenis_kl = $request->jenis_kl;
     $staff->tempat_lahir = $request->tempat_lahir;
     $staff->tgl_lahir = $request->tgl_lahir;
     $staff->alamat = $request->alamat;
     $staff->posisi = $request->posisi;
     $staff->agama = 'ISLAM';
     $staff->no_tlp = $request->no_tlp;
     $staff->ijazah_terakhir = $request->ijazah_terakhir;
     $staff->tahun_ijazah_trkhr = $request->tahun_ijazah_trkhr;
     $staff->nuptk = $request->nuptk;
     $staff->status_kawin = $request->status_kawin;

     if ($request->hasFile('image'))
     {
        $file = $request->file('image');
        $image = $file->getClientOriginalName();
        $destination = public_path() . '/imgstaff/';

        $successUploaded = $request->file('image')->move($destination, $file->getClientOriginalName());

        if($successUploaded)
        {
            $extension = $file->getClientOriginalExtension();
            $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $image);

            Image::make($destination . '/' . $image)
            ->resize(200, 200)
            ->save($destination . '/' . $thumbnail);
        }
        $staff->image = $image;
    }else{
       $staff->image = $request->image;
   }
   $staff->save();

   return redirect()->route('profilstaff.edit', Auth::user()->staff->id)->with('message', 'Data berhasil diubah!');
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
