<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\link;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class LinkController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $link = Link::latest()->get();
        return view("backend.link.index", compact('link'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Link $link)
    {
        //
        
        return view("backend.link.create", compact('link'));
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
            'judul'        => 'required',
            'jenis_id'      => 'required',
            'url'          => 'required'
        ]);

        

        $link = new link;
        $link->judul = $request->get('judul');
        $link->jenis_id = $request->get('jenis_id');
        $link->url = $request->get('url');
        $link->author_id = Auth::user()->id;
        $link->save();

        return redirect()->route('link.index')->with('message', 'Link berhasil dibuat');
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
     $link = Link::findOrFail($id);
     return view("backend.link.edit", compact('link'));
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
        $this->validate($request, [
            'judul'        => 'required',
            'jenis_id'      => 'required',
            'url'          => 'required'
        ]);

        $link = link::where('id', $id)->first();
        $link->judul = $request->judul;
        $link->jenis_id = $request->jenis_id;
        $link->url = $request->url;
        $link->author_id = Auth::user()->id;
        $link->save();

        return redirect()->route('link.index')->with('message', 'Link berhasil diperbarui');
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
        $link = link::where('id', $id)->first();
        $link->delete();
        return redirect()->route('link.index')->with('message', 'Link berhasil dihapus!');
    }
}
