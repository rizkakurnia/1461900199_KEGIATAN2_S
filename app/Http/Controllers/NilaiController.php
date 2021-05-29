<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('tbl_nilai')
            ->join('setup_kelas', 'tbl_nilai.id_kelas', '=', 'setup_kelas.id_kelas')
            ->join('setup_pelajaran', 'tbl_nilai.id_pelajaran', '=', 'setup_pelajaran.id_pelajaran')
            ->join('data_guru', 'tbl_nilai.id_guru', '=', 'data_guru.id_guru')
            ->join('data_siswa', 'tbl_nilai.id_siswa', '=', 'data_siswa.id_siswa')
            ->select('tbl_nilai.nilai', 'setup_kelas.nama_kelas', 'data_guru.nama_guru', 'data_siswa.nama_siswa', 'setup_pelajaran.nama_pelajaran')
            ->orderBy('nama_siswa', 'asc')
            ->get();

        return view('nilai', ['data' => $data]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $data = DB::table('tbl_nilai')
            ->where('data_siswa.nama_siswa', 'like', "%" . $search . "%")
            ->join('setup_kelas', 'tbl_nilai.id_kelas', '=', 'setup_kelas.id_kelas')
            ->join('setup_pelajaran', 'tbl_nilai.id_pelajaran', '=', 'setup_pelajaran.id_pelajaran')
            ->join('data_guru', 'tbl_nilai.id_guru', '=', 'data_guru.id_guru')
            ->join('data_siswa', 'tbl_nilai.id_siswa', '=', 'data_siswa.id_siswa')
            ->select('tbl_nilai.nilai', 'setup_kelas.nama_kelas', 'data_guru.nama_guru', 'data_siswa.nama_siswa', 'setup_pelajaran.nama_pelajaran')
            ->orderBy('nama_siswa', 'asc')
            ->get();

        return view('nilai', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
