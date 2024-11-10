<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profilController extends Controller
{
    function index()
    {
        return view('dashboard.profil.index');
    }

    function update(Request $request)
    {
        $request->validate([
            '_foto' => 'mimes:jpeg,jpg,png,gif',
            '_email' => 'required|email'
        ], [
            '_foto.mimes' => 'Format foto dimasukkan tidak didukung!',
            '_email.required' => 'Harap masukkan email!',
            '_email.required' => 'Email yang dimasukkan tidak valid!'
        ]);

        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto'), $foto_baru);
            // kalau ada update foto
            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto') . "/" . $foto_lama);

            metadata::updateOrcreate(['meta_key' => '_foto'], ['meta_value' => $foto_baru]);
        }

        metadata::updateOrcreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
        metadata::updateOrcreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);
        metadata::updateOrcreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);
        metadata::updateOrcreate(['meta_key' => '_nohp'], ['meta_value' => $request->_nohp]);

        metadata::updateOrcreate(['meta_key' => '_discord'], ['meta_value' => $request->_discord]);
        metadata::updateOrcreate(['meta_key' => '_instagram'], ['meta_value' => $request->_instagram]);
        metadata::updateOrcreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);
        metadata::updateOrcreate(['meta_key' => '_youtube'], ['meta_value' => $request->_youtube]);

        return redirect()->route('profil.index')->with('success', 'Data profil telah berhasil di ubah!');
    }
}
