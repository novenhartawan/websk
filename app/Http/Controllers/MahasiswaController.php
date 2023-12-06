<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mhs = Mahasiswa::with('jurusan')->get();

        return view('mahasiswa.index', ['data' => $mhs]);
    }

    public function create()
    {
        $jurusan = Jurusan::all();

        return view('mahasiswa.create', ['jurusan' => $jurusan]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => ['required', 'min:8', 'max:10'],
            'nama' => ['required'],
            'jurusan' => ['required', 'exists:jurusan,id'],
        ]);

        $mhs = Mahasiswa::create([
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
            'jurusan_id' => $validated['jurusan'],
        ]);

        return redirect(url('/mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mhs)
    {
        $mhs->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan,
        ]);

        return redirect(url('/mahasiswa'));
    }

    public function destroy(Mahasiswa $mhs)
    {
        $mhs->delete();

        return redirect(url('/mahasiswa'));
    }

    public function edit(Mahasiswa $mhs)
    {
        $jurusan = Jurusan::all();

        return view('mahasiswa.edit', ['data' => $mhs, 'jurusan' => $jurusan]);
    }

    public function show(Mahasiswa $mhs)
    {
    }
}
