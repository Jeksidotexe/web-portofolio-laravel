<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\metadata;
use Illuminate\Http\Request;

class pengaturanHalamanController extends Controller
{
    function index()
    {
        $datahalaman = halaman::orderBy('judul', 'asc')->get();
        return view('dashboard.pengaturanhalaman.index')->with('datahalaman', $datahalaman);
    }

    function update(Request $request)
    {
        metadata::updateOrcreate(['meta_key' => '_halaman_about'], ['meta_value' => $request->_halaman_about]);
        metadata::updateOrcreate(['meta_key' => '_halaman_hobi'], ['meta_value' => $request->_halaman_hobi]);
        metadata::updateOrcreate(['meta_key' => '_halaman_sertifikat'], ['meta_value' => $request->_halaman_sertifikat]);

        return redirect()->route('pengaturanhalaman.index')->with('success', 'Data pengaturan halaman telah berhasil di ubah!');
    }
}
