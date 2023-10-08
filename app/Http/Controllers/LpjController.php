<?php

namespace App\Http\Controllers;

use App\Models\Lpj;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LpjController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lpjs = Lpj::with('role')->get();
        return view('admin.lpj.index', compact('lpjs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.lpj.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => ['required'],
                'role_id' => ['required'],
                'jenis' => ['required'],
                'periode' => ['required'],
                'lpj' => 'mimes:pdf|max:20480',

            ],
            [
                'required' => "Kolom tidak boleh kosong",
                'unique' => "Data tersebut sudah ada",
                'mimes' => "Format file harus pdf"
            ]
        );

        DB::beginTransaction();
        try {

            $customFileName = strtolower(str_replace(' ', '-', $request->judul)) . "." . $request->file('lpj')->extension(); // Sesuaikan dengan ekstensi file yang diunggah

            Lpj::create([
                'judul' => $request->judul,
                'role_id' => $request->role_id,
                'jenis' => $request->jenis,
                'periode' => $request->periode,
                // 'lpj' => $request->file('lpj')->store('lpj', 'public')
                'lpj' => $request->file('lpj')->storeAs('lpj', $customFileName, 'public')
            ]);

            DB::commit();
            return redirect()->route('lpj.index')->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return redirect()->route('lpj.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lpj $lpj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lpj $lpj)
    {
        $roles = Role::all();
        return view('admin.lpj.edit', compact('roles', 'lpj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lpj $lpj)
    {
        $request->validate(
            [
                'judul' => ['required'],
                'role_id' => ['required'],
                'jenis' => ['required'],
                'periode' => ['required'],
                'lpj' => 'mimes:pdf|max:20480',

            ],
            [
                'required' => "Kolom tidak boleh kosong",
                'unique' => "Data tersebut sudah ada",
                'mimes' => "Format file harus pdf"
            ]
        );

        DB::beginTransaction();
        try {
            $customFileName = strtolower(str_replace(' ', '-', $request->judul)) . "."  . $request->file('lpj')->extension(); // Sesuaikan dengan ekstensi file yang diunggah

            if ($request->hasFile('lpj')) {
                // Hapus old_lpj yang ada di store 'lpj' public (jika ada)
                if ($request->old_lpj) {
                    Storage::disk('public')->delete($request->old_lpj);
                }

                // Upload file request 'lpj' ke store 'lpj' public
                $lpjPath = $request->file('lpj')->storeAs('lpj', $customFileName, 'public');
            } else {
                // Jika tidak ada file lpj yang diunggah, gunakan 'old_lpj' dari request
                $lpjPath = $request->old_lpj;
            }

            $lpj->update([
                'judul' => $request->judul,
                'role_id' => $request->role_id,
                'jenis' => $request->jenis,
                'periode' => $request->periode,
                'lpj' => $lpjPath
            ]);

            DB::commit();
            return redirect()->route('lpj.index')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return redirect()->route('lpj.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lpj $lpj)
    {
        DB::beginTransaction();
        try {

            Storage::disk('public')->delete($lpj->lpj);

            $lpj->delete();
            DB::commit();
            return redirect()->route('lpj.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return redirect()->route('lpj.index')->with('error', 'Data gagal dihapus');
        }
    }
}
