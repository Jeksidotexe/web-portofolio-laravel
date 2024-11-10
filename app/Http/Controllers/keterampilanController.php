<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class keterampilanController extends Controller
{
    public function index()
    {
        $skill_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'" . implode("','", $skill) . "'";

        return view('dashboard.keterampilan.index')->with(['skill' => $skill]);
    }

    public function update(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                '_bahasa' => 'required',
                '_alurkerja' => 'required'
            ], [
                '_bahasa.required' => 'Silahkan masukkan bahasa pemrograman yang kamu kuasai!',
                '_alurkerja' => 'Silahkan masukkan alur kerja yang kamu kuasai!',
            ]);

            metadata::updateOrcreate(['meta_key' => '_bahasa'], ['meta_value' => $request->_bahasa]);
            metadata::updateOrcreate(['meta_key' => '_alurkerja'], ['meta_value' => $request->_alurkerja]);

            return redirect()->route('keterampilan.index')->with('success', 'Data keterampilan telah berhasil di ubah');
        }
    }
}
