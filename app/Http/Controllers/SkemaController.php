<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skema;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::all();
        return view('sertifikasi', ['skemas' => $skemas]);
    }

    public function create()
    {
        $skemas = Skema::all();
        return view('sertifikasi.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_skema' => 'required|unique:skema|max:255',
            'nm_skema' => 'required|max:255',
            'jenis' => 'required|max:255',
            'jml_unit' => 'required|integer',
        ],
        [    'kd_skema.required' => 'Kode skema wajib diisi',    
             'kd_skema.unique' => 'Kode skema sudah terdaftar',    
             'nm_skema.required' => 'Nama skema wajib diisi',    
             'jenis.required' => 'Jenis skema wajib diisi',    
             'jml_unit.required' => 'Jumlah unit wajib diisi']
        );

        $skema = new Skema;
        $skema->kd_skema = $request->kd_skema;
        $skema->nm_skema = $request->nm_skema;
        $skema->jenis = $request->jenis;
        $skema->jml_unit = $request->jml_unit;
        $skema->save();

        return redirect('/sertifikasi')->with('success', 'Skema sertifikasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $skema = Skema::findOrFail($id);

        return view('sertifikasi.edit', compact('skema'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kd_skema' => 'required|max:255',
            'nm_skema' => 'required|max:255',
            'jenis' => 'required|max:255',
            'jml_unit' => 'required|integer',
        ],
        [   'kd_skema.required' => 'Kode skema wajib diisi',    
            'nm_skema.required' => 'Nama skema wajib diisi',    
            'jenis.required' => 'Jenis skema wajib diisi',    
            'jml_unit.required' => 'Jumlah unit wajib diisi']
        );

        $validation =  Skema::where('kd_skema', $request->kd_skema)->first();

        $skema = Skema::find($id);

        if ($validation) {
            if ($validation->kd_skema == $skema->kd_skema) {
                $skema->kd_skema = $request->kd_skema;
                $skema->nm_skema = $request->nm_skema;
                $skema->jenis = $request->jenis;
                $skema->jml_unit = $request->jml_unit;
                $skema->save();
        
                return redirect()->route('sertifikasi.index')->with('success', 'Data Skema sertifikasi berhasil diperbarui.');
            } else {
                return redirect()->back()->with('success', 'Data Skema field Kode Skema tidak boleh duplicate.');
            }
        }else{
            $skema->kd_skema = $request->kd_skema;
            $skema->nm_skema = $request->nm_skema;
            $skema->jenis = $request->jenis;
            $skema->jml_unit = $request->jml_unit;
            $skema->save();
    
            return redirect()->route('sertifikasi.index')->with('success', 'Data Skema sertifikasi berhasil diperbarui.');
        }
    }

    public function destroy($id)
    {
        $skema = Skema::find($id);
        $skema->delete();

        return redirect()->route('sertifikasi.index')->with('success', 'Skema sertifikasi berhasil dihapus');
    }
}
