<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JasaController extends Controller
{
    // Menampilkan daftar jasa
    public function index()
    {
        $judul = "Jasa";
        $data['jasa'] = Jasa::all();
        return view('admin.jasa.index', compact('data', 'judul'));
    }

    // Menampilkan form tambah jasa
    public function create()
    {
        $judul = "Tambah Jasa";
        return view('admin.jasa.create', compact('judul'));
    }

    // Menyimpan data jasa ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_jasa' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'list_services' => 'nullable|string',
        ]);

        Jasa::create([
            'jasa_id' => (string) Str::uuid(),
            'nama_jasa' => $request->nama_jasa,
            'price' => $request->price,
            'list_services' => $request->list_services,
            'created_by' => auth()->id()
        ]);

        return redirect()->route('jasa.index')->with('success', 'Jasa berhasil ditambahkan.');
    }
}
