<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Skema;

class PesertaController extends Controller
{
   
    public function index()
    {
        $pesertas = Peserta::paginate(10);
        return view('home', compact('pesertas'));
    }

    public function create()
    {
        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_skema' => 'required|max:255',
            'nm_peserta' => 'required|max:255',
            'jekel' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:255',
        ]);
    
        $peserta = new Peserta;
        $peserta->id_peserta = mt_rand(10000000, 99999999);
        $peserta->kd_skema = $request->kd_skema;
        $peserta->nm_peserta = $request->nm_peserta;
        $peserta->jekel = $request->jekel;
        $peserta->alamat = $request->alamat;
        $peserta->no_hp = $request->no_hp;
        $peserta->save();

    
        return redirect('/')->with('success', 'Peserta sertifikasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $skemas = Skema::all();
    
        return view('peserta.edit', compact('peserta', 'skemas'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kd_skema' => 'required|max:255',
            'nm_peserta' => 'required|max:255',
            'jekel' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:255',
        ]);
    
        $peserta = Peserta::find($id);
        $peserta->kd_skema = $request->kd_skema;
        $peserta->nm_peserta = $request->nm_peserta;
        $peserta->jekel = $request->jekel;
        $peserta->alamat = $request->alamat;
        $peserta->no_hp = $request->no_hp;
        $peserta->save();
    
        return redirect('/')->with('success', 'Peserta sertifikasi berhasil diubah');
    }
    
    public function destroy($id)
    {
        $peserta = Peserta::find($id);
        $peserta->delete();
    
        return redirect('/')->with('success', 'Peserta sertifikasi berhasil dihapus');
    }
    
    public function search(Request $request)
    {
        $search = $request->get('search');
        $pesertas = Peserta::where('nm_peserta', 'like', '%'.$search.'%')->paginate(5);
        return view('home', ['pesertas' => $pesertas]);
    }

}