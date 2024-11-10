<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class projectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = projects::orderBy('judul', 'asc')->get();
        return view('dashboard.projects.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('isi', $request->isi);

        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Mohon isi judul project!',
                'isi.required' => 'Mohon isi deskripsi project!',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        projects::create($data);

        return redirect()->route('projects.index')->with('success', 'Data project telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = projects::where('id', $id)->first();
        return view('dashboard.projects.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Mohon isi judul project!',
                'isi.required' => 'Mohon isi deskripsi project',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        projects::where('id', $id)->update($data);

        return redirect()->route('projects.index')->with('success', 'Data project telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        projects::where('id', $id)->delete();
        return redirect()->route('projects.index')->with('success', 'Data project telah berhasil dihapus');
    }
}
