<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function admin()
    {
        return view("blog.useradmin");
    }

    public function siswa()
    {
        return view("blog.usersiswa");
    }

    public function guru()
    {
        return view("blog.tenagakerja");
    }

     public function staff()
    {
        return view("blog.tenagakerja");
    }
}
