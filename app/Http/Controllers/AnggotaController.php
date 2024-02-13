<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Models\Record;
use App\Models\Sensor;
use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $data = Anggota::query()
//            ->join('users', 'users.anggota_id', '=', 'anggotas.id')
//            ->select('users.name', 'users.divisi', 'anggotas.*')
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
        $anggota = Anggota::query()->create($request->validated());
//        dd($anggota);
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

    public function pilih(string $id)
    {
        $anggota = Anggota::query()->paginate(10);
        $user = User::query()->findOrFail($id);

        return view(
            'anggota.pilih',
            [
                'anggota' => $anggota,
                'user' => $user,
            ]);
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

    public function konfirmasi(string $id, Request $request)
    {
        $formFields = $request->validate([
            'anggota_id' => ['required']
        ]);

        $data = User::query()
            ->where('id', '=', $id)
            ->update(['anggota_id'=>$formFields['anggota_id']]);
//        dd($data);
        return redirect()
            ->route('profile.check', $id)
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
