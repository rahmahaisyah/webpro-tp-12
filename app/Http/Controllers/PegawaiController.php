<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $pegawai = new Pegawai;
        $pegawai->name = $request->name;
        $pegawai->posisi = $request->posisi;
        $pegawai->gaji = $request->gaji;
        $pegawai->save();

        return redirect()->route('pegawai.index');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->name = $request->name;
        $pegawai->posisi = $request->posisi;
        $pegawai->gaji = $request->gaji;
        $pegawai->save();

        return redirect()->route('pegawai.index');
    }

    public function destroy($id)
{
    $pegawai = Pegawai::findOrFail($id);
    $pegawai->delete();

    return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
}

}
