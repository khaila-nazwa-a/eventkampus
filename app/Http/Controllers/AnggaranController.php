<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Event;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggarans = Anggaran::with('event','kategori')->latest()->get();

    return view('anggaran.index', compact('anggarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $events = Event::all();
    $kategoris = Kategori::all();

    return view('anggaran.create', compact('events','kategoris'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'event_id' => 'required',
        'kategori_id' => 'required',
        'type' => 'required',
        'jumlah' => 'required|numeric',
        'deskripsi' => 'required',
        'tanggal' => 'required'
    ]);

    Anggaran::create($request->all());

    return redirect()->route('anggaran.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $events = Event::all();
        $kategoris = Kategori::all();

        return view('anggaran.edit', compact(
                'anggaran',
                'events',
                'kategoris'
            ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'event_id' => 'required',
        'kategori_id' => 'required',
        'type' => 'required',
        'jumlah' => 'required|numeric',
        'deskripsi' => 'required',
        'tanggal' => 'required'
    ]);

    $anggarans->update($request->all());

    return redirect()->route('anggaran.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggarans->delete();

        return redirect()->route('anggaran.index')->with('success','Data berhasil dihapus');
    }
}
