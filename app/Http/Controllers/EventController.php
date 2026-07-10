<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('kategori','user')->latest()->get();
        return view('event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('event.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id'=>'required',
            'judul'=>'required',
            'deskripsi'=>'required',
            'poster'=>'required|image',
            'lokasi'=>'required',
            'tanggal'=>'required',
            'jam_mulai'=>'required',
            'jam_selesai'=>'required',
            'kuota'=>'required|integer'
        ]);

        $poster = $request->file('poster')->store('poster','public');

        Event::create([
            'kategori_id'=>$request->kategori_id,
            'user_id'=>auth()->id(),
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'poster'=>$poster,
            'lokasi'=>$request->lokasi,
            'tanggal'=>$request->tanggal,
            'jam_mulai'=>$request->jam_mulai,
            'jam_selesai'=>$request->jam_selesai,
            'kuota'=>$request->kuota
        ]);
        return redirect()->route('event.index')->with('success','Event berhasil dibuat');
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
    public function edit(Event $event)
    {
        $kategori = Kategori::all();
        return view('event.edit', compact('event', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'kuota' => 'required|integer'
        ]);

        $data = [
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'kuota' => $request->kuota
        ];

        if ($request->hasFile('poster')) {
            Storage::disk('public')->delete($event->poster);
            $data['poster'] = $request->file('poster')->store('poster', 'public');
        }

        $event->update($data);

        return redirect()->route('event.index')->with('success', 'Event berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        Storage::disk('public')->delete($event->poster);
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus');
    }
}
