<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;
use App\Models\Sensor;


class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Record::query()
            ->join('users', 'users.id', '=', 'records.user_id')
            ->select(//'users.divisi',
                'users.name', 'records.*')
            ->paginate(10);

        return view('record.index',
            ['data' => $data]
        );
    }
//    public function list()
//    {
//        return view('record.list',
//            ['data' => Record::paginate(10)]
//        );
//    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('record.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecordRequest $request)
    {
        Record::create($request->validated());
        return redirect()
            ->route('record.index')
            ->with('message', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Record::query()->findOrFail($id);
        return view('record.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Record::query()->findOrFail($id);
        return view(
            'record.edit',
            ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecordRequest $request, string $id)
    {
        $data = Record::query()->findOrFail($id);
        $data->update($request->validated());
        return redirect()
            ->route('record.index', $data->id)
            ->with('message', 'Data Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Record::destroy($id);
        return redirect()
            ->route('record.index')
            ->with('message', 'Data Berhasil Di Hapus');
    }

}
