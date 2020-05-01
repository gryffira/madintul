<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
use App\Santri;
use Auth;
use App\Exports\SantrisExport;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class SantriController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $santri = Santri::orderBy('nama_depan')->get();

        return view("backend.santri.index", compact('santri'));
    }

    public function export() 
    {
        return Excel::download(new SantrisExport, 'santri.xlsx');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $santri = new Santri();

        return view("backend.santri.create", compact('santri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nis'           => 'required|unique:santris',
            'nama_depan'    => 'required',
            'image'         => 'mimes:jpeg,png,jpg,svg,bmp',
            'email'         => 'required|email|unique:users',
        ]);

        $user = new User;
        $user->role = 'santri';
        $user->name = $request->nama_depan . " " . $request->nama_belakang;
        $user->image = $request->image;
        $user->email = $request->email;
        $user->password = ('12345678');
        $user->remember_token = str_random(60);
        $user->save();


 // $link->author_id = Auth::user()->id;

        $santri = new Santri;
        $santri->nis = $request->get('nis');
        $santri->user_id = $user->id;
        $santri->nama_depan = $request->get('nama_depan');
        $santri->nama_belakang = $request->get('nama_belakang');
        $santri->jenis_kl = $request->get('jenis_kl');
        $santri->tempat_lahir = $request->get('tempat_lahir');
        $santri->tgl_lahir = $request->get('tgl_lahir');
        $santri->alamat = $request->get('alamat');
        $santri->agama = 'I';
        $santri->no_tlp = $request->get('no_tlp');
        $santri->nama_ayah = $request->get('nama_ayah');
        $santri->pekerjaan_ayah = $request->get('pekerjaan_ayah');
        $santri->nama_ibu = $request->get('nama_ibu');
        $santri->pekerjaan_ibu = $request->get('pekerjaan_ibu');

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
            $santri->image = NULL;
        }

        $santri->save();

        return redirect()->route('santri.index')->with('message', 'santri telah ditambahkan');

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
        $santri = Santri::findOrFail($id);
        return view("backend.santri.edit", compact('santri'));
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

     return redirect()->route('santri.index')->with('message', 'Data santri berhasil diubah!');
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
        $santri = Santri::where('id', $id)->first();
        $santri->user()->delete();
        $santri->comments()->delete();
        $santri->delete();
        return redirect()->route('santri.index')->with('message', 'User berhasil dihapus!');
    }

    public function beranda()
    {
        $santri = Santri::all();
        return view("backend.santri.beranda",  compact('santri'));
    }

    public function editprofil(){

        // $santri = Santri::findOrFail($id);
        return view("backend.santri.editprofil");
    }

    public function updateprofil(Request $request, $id)
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
}
