<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreSensorRequest;
use App\Models\Anggota;
use App\Models\Record;
use App\Models\Sensor;
use App\Http\Requests\UpdateSensorRequest;
use App\Models\User;
use Carbon\Carbon;
use Carbon\Traits\Date;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Sensor::query()
            ->join('users', 'users.id', '=', 'sensors.user_id')
            ->select('users.divisi', 'users.name', 'sensors.*')
            ->paginate(10);

        return view('sensor.index',
            ['data' => $data]
        );
    }

//    public function list()
//    {
//        return view('sensor.list',
//            ['data' => Sensor::paginate(10)]
//        );
//    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::query()->get();
        return view(
            'sensor.create',
            ['users' => $user]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSensorRequest $request)
    {
        Sensor::create($request->validated());
        return redirect()
            ->route('sensor.index')
            ->with('message', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Sensor::query()->findOrFail($id);

        return view('sensor.detail',
            [
                'data' => $data,

            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Sensor::query()->findOrFail($id);
        $user = User::query();

        return view(
            'sensor.edit',
            [
                'data' => $data,
                'user' => $user
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSensorRequest $request, string $id)
    {
        $data = Sensor::query()->findOrFail($id);
        $data->update($request->validated());

        return redirect()
            ->route('sensor.index', $data->id)
            ->with('message', 'Data Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sensor::destroy($id);
        return redirect()
            ->route('sensor.index')
            ->with('message', 'Data Berhasil Di Hapus');
    }

    public function absen(string $rfid)
    {

        // cari sensor
        $sensor = Sensor::query()->where('rfid', '=', $rfid)->first();

        // apa bila sensor tidak di temukan
        if (!$sensor) {
            return response()->json('Sensor tidak ditemukan', 404);
        }

        if ($sensor['status'] !== 'Active') {
            return response()->json('Sensor Anda Tidak Terdaftar', 401);
        }

//            $user = user::query()->where('users.id', $sensor['user_id'])
//                ->join('anggotas', 'users.id', '=', 'anggotas.user_id')
//                ->join('records', 'users.id', '=', 'records.user_id')
//                ->select('users.name', 'users.divisi', 'anggotas.')
//                ->first();
//            return response()->json($user, 200);

//            $user = Anggota::query()->where('user_id','=',$sensor['user_id'])
//                ->join('users', 'users.id', '=', 'anggotas.user_id')
//                ->select(//'users.divisi',
//                    'users.name','users.divisi', 'anggotas.*')
//                ->first();


//            $record = Record::query()->where('user_id', $sensor['user_id'])
//                ->join('users', 'users.id', '=', 'records.user_id')
////                ->join('anggotas', 'anggotas.user_id', '=', 'records.user_id')
//                ->select(
//                    'name', 'divisi',
////                    'anggotas.jam_masuk',
//                    'records.waktu_masuk', 'records.waktu_pulang', 'records.tanggal'
//                )
//                ->first();
//            return response()->json($record, 200);


        $record = Record::query()->where('records.user_id', $sensor['user_id'])
            ->join('anggotas', 'records.user_id', '=', 'anggotas.user_id')
            ->select('records.tanggal', 'waktu_pulang', 'waktu_masuk','anggotas.*' )
            ->orderBy('tanggal','DESC')
            ->first();
        $currentTime = Carbon::now();

        if (!$record) {
            Record::query()->create([
                    'tanggal' => $currentTime->subDay(),
                    'keterangan' => 'Record Tersimpan',
                    'user_id' => $sensor['user_id']
                ]
            );
            return response()->json('RFID Tersimpan', 200);
        }

//            return response()->json('Anda Sudah Absen Sebelumnya'. $record['tanggal'].'test'.$currentTime->toDateString(), 200);
        if ($currentTime->toDateString() === $record['tanggal']) {
            return response()->json('Anda Sudah Absen Sebelumnya', 200);

        }

        $current = strtotime($currentTime->toTimeString());
        $startTime = strtotime($record['jam_masuk']);
        $endTime = strtotime($record['jam_masuk_telat']);

        if ($current >= $startTime && $current <= $endTime) {
            Record::query()->create([
                'tanggal' => $currentTime->toDateString(),//'1999-10-10'
                'waktu_masuk' => $currentTime->toTimeString(),//'12:12:00'
                'waktu_pulang' => null,
                'keterangan' => 'Tepat Waktu',
                'user_id' => $sensor['user_id']
            ]);
            return response()->json('Absen Sukses Tercatat Rajin ' . $currentTime->toTimeString(), 200);

        } else {
            Record::query()->create([
                'tanggal' => $currentTime->toDateString(),//'1999-10-10'
                'waktu_masuk' => $currentTime->toTimeString(),//'12:12:00'
                'waktu_pulang' => null,
                'keterangan' => 'Telat Waktu',
                'user_id' => $sensor['user_id']
            ]);
            return response()->json('Absen Sukses Tercatat Anda Telat ' . $currentTime->toTimeString(), 200);
        }


//        if ($currentTime->toDateString() < $record['tanggal']) {
//            return response()->json('Anda Sudah Absen Sebelumnya', 200);
//
//        }

    }

}
