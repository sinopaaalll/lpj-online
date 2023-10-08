<?php

namespace App\Http\Controllers;

use App\Models\Lpj;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function kunjungi()
    {
        $roles = Role::all();
        $lpjs = Lpj::all();
        return view('user.kunjungi', compact('roles', 'lpjs'));
    }

    public function download(string $id)
    {
        $data = Lpj::findOrFail($id);

        return Storage::download('/public/' . $data->lpj);
    }
}
