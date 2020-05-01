<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admin = User::orderBy('name')->get();

        return view("backend.admin.index", compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $admin = new User();

        return view("backend.admin.create", compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {
        //
        // $this->validate($request, [
        //     'title'        => 'required',
        //     // 'excerpt'      => 'required',
        //     'body'         => 'required',
        //     'category_id'  => 'required',
        //     'image'        => 'mimes:jpeg,png,jpg,svg,bmp'
        // ]);

        $admin = new User;
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->password = $request->get('password');
        // $admin->role_id = $request->get('role_id');
        $admin->save();

        return redirect()->route('admin.index')->with('message', 'Admin telah ditambahkan');
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
        $admin = User::findOrFail($id);
        return view("backend.admin.edit", compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest  $request, $id)
    {
        //
       $admin = User::where('id', $id)->first();
       $admin->name = $request->name;
       $admin->email = $request->email;
       $admin->save();

       return redirect()->route('admin.index')->with('message', 'Data Admin berhasil diubah!');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {
        //
      $admin = User::findOrFail($id);

      $deleteOption = $request->delete_option;

      $selectedUser = $request->selected_user;

      if($deleteOption == "delete"){
        $admin->posts()->delete();
        $admin->ads()->delete();
        $admin->videos()->delete();
        $admin->photos()->delete();
        $admin->links()->delete();
        $admin->events()->delete();
        $admin->santri()->delete();
        $admin->staff()->delete();
        $admin->comments()->delete();
    }

    elseif ($deleteOption == "attribute") {

        $admin->posts()->update(['author_id' => $selectedUser]);
        $admin->ads()->update(['author_id' => $selectedUser]);
        $admin->photos()->update(['author_id' => $selectedUser]);
        $admin->links()->update(['author_id' => $selectedUser]);
        $admin->events()->update(['author_id' => $selectedUser]);
        $admin->videos()->update(['author_id' => $selectedUser]);

    }

    $admin->delete();

    return redirect()->route('admin.index')->with('message', 'User berhasil dihapus!');
}

public function confirm(Requests\UserDestroyRequest $request, $id)
{
        //
  $admin = User::findOrFail($id);
  $user = User::where('id', '!=', $admin->id)->where('role', '=', 'admin')->orWhere('role', '=', 'superadmin')->get(); 
  return view("backend.admin.confirm", compact('admin', 'user'));
}
}
