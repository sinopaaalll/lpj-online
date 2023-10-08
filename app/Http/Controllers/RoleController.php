<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'unique:roles']
            ],
            [
                'required' => "Role tidak boleh kosong",
                'unique' => "Nama tersebut sudah ada"
            ]
        );

        DB::beginTransaction();
        try {
            Role::create($request->all());
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('role.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate(
            [
                'name' => ['required', Rule::unique('roles')->ignore($role)]
            ],
            [
                'required' => "Role tidak boleh kosong",
                'unique' => "Nama tersebut sudah ada"
            ]
        );

        DB::beginTransaction();
        try {
            $role->update($request->all());
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('role.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        DB::beginTransaction();
        try {
            $role->delete();
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('role.index')->with('error', 'Data gagal dihapus');
        }
    }
}
