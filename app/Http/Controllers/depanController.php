<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\projects;
use App\Models\riwayat;
use Illuminate\Http\Request;

class depanController extends Controller
{
    public function index()
    {
        $about_id = get_meta_value('_halaman_about');
        $about_data = halaman::where('id', $about_id)->first();

        $hobi_id = get_meta_value('_halaman_hobi');
        $hobi_data = halaman::where('id', $hobi_id)->first();

        $sertifikat_id = get_meta_value('_halaman_sertifikat');
        $sertifikat_data = halaman::where('id', $sertifikat_id)->first();

        $projects_data = projects::all();

        $pengalaman_data = riwayat::where('tipe', 'pengalaman')->get();
        $pendidikan_data = riwayat::where('tipe', 'pendidikan')->get();

        return view('halaman depan.index')->with([
            'about' => $about_data,
            'hobi' => $hobi_data,
            'sertifikat' => $sertifikat_data,
            'pengalaman' => $pengalaman_data,
            'pendidikan' => $pendidikan_data,
            'projects' => $projects_data
        ]);
    }
}
