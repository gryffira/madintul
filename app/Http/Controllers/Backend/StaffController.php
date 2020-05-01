<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
use App\Staff;
use Auth;
use App\Exports\StaffsExport;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class StaffController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::orderBy('nama_depan')->get();

        return view("backend.staff.index", compact('staff'));
    }

    public function export() 
    {
        return Excel::download(new StaffsExport, 'staff.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = new Staff();

        return view("backend.staff.create", compact('staff'));
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
            'nik'                => 'required',
            'nama_depan'         => 'required',
            'image'              => 'mimes:jpeg,png,jpg,svg,bmp', 
            
        ]);

        $user = new User;
        $user->role = $request->role;
        $user->name = $request->nama_depan . " " . $request->nama_belakang;
        $user->email = $request->email;
        $user->password = ('12345678');
        $user->remember_token = str_random(60);
        $user->save();

        $staff = new Staff;
        $staff->nik = $request->get('nik');
        $staff->user_id = $user->id;
        $staff->nama_depan = $request->get('nama_depan');
        $staff->nama_belakang = $request->get('nama_belakang');
        $staff->jenis_kl = $request->get('jenis_kl');
        $staff->tempat_lahir = $request->get('tempat_lahir');
        $staff->tgl_lahir = $request->get('tgl_lahir');
        $staff->alamat = $request->get('alamat');
        $staff->ijazah_terakhir = $request->get('ijazah_terakhir');
        $staff->tahun_ijazah_trkhr = $request->get('tahun_ijazah_trkhr');
        $staff->posisi = $request->get('posisi');
        $staff->nuptk = $request->get('nuptk');
        $staff->agama = 'ISLAM';
        $staff->no_tlp = $request->get('no_tlp');
        $staff->status_kawin = $request->get('status_kawin');
        

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
            $staff->image = NULL;
        }

        $staff->save();

        return redirect()->route('staff.index')->with('message', 'staff telah ditambahkan');
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
        $staff = Staff::findOrFail($id);
        return view("backend.staff.edit", compact('staff'));
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
        $staff->posisi = $request->posisi;
        $staff->tempat_lahir = $request->tempat_lahir;
        $staff->tgl_lahir = $request->tgl_lahir;
        $staff->alamat = $request->alamat;
        $staff->ijazah_terakhir = $request->ijazah_terakhir;
        $staff->tahun_ijazah_trkhr = $request->tahun_ijazah_trkhr;
        $staff->nuptk = $request->nuptk;
        $staff->agama = $request->agama;
        $staff->no_tlp = $request->no_tlp;
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

     return redirect()->route('staff.index')->with('message', 'Data staff berhasil diubah!');
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

        $staff = Staff::where('id', $id)->first();
        $staff->user()->delete();
        $staff->comments()->delete();
        $staff->delete();
        return redirect()->route('staff.index')->with('message', 'Staff berhasil dihapus!');
    }
}
