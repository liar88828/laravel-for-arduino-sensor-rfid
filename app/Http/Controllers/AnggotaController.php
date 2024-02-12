<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Models\Record;
use App\Models\Sensor;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $data = Anggota::query()
            ->join('users', 'users.id', '=', 'anggotas.user_id')
            ->select(//'users.divisi',
                'users.name','users.divisi', 'anggotas.*')
            ->paginate(10);

        return view('anggota.index',
            ['data' => $data]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnggotaRequest $request)
    {
        Anggota::create($request->validated());
        return redirect()
            ->route('anggota.index')
            ->with('message', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Anggota::query()->findOrFail($id);
        return view('anggota.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Anggota::query()->findOrFail($id);
//        dd($data);
        return view(
            'anggota.edit',
            ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnggotaRequest $request, string $id)
    {
        $data = Anggota::query()->findOrFail($id);
        $data->update($request->validated());
        return redirect()
            ->route('anggota.index', $data->id)
            ->with('message', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Anggota::destroy($id);
        return redirect()
            ->route('anggota.index')
            ->with('message', 'Data Berhasil Di Hapus');
    }
}
