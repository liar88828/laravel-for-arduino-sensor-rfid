<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreSensorRequest;
use App\Http\Requests\UpdateSensorRequest;
use App\Models\Record;
use App\Models\Sensor;
use App\Models\User;
use Carbon\Carbon;

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
      Sensor::query()->create([
        'rfid' => $rfid,
        'status' => 'Invalid'
      ]);
      return response()->json('Sensor tidak ditemukan', 404);
    }

// apa bila sensor tidak terdaftar
    if ($sensor['status'] !== 'Active') {
      return response()->json('Sensor Anda Tidak Terdaftar', 401);
    }

// apa bila terdaftar maka cari record dengan user dan anggota
    $currentTime = Carbon::now();
    $current = strtotime($currentTime->toTimeString());

    //---create record----

    // get record by sensor
    $record = Record::findByDateAndUserId($currentTime->toDateString(), $sensor['user_id']);


    $anggota = User::query()->where('users.id', '=', $sensor['user_id'])
      ->join('anggotas', 'anggotas.id', '=', 'users.anggota_id')
      ->select('anggotas.*', 'users.name')
      ->first();

    if (empty($anggota)) {
      return response()->json('Anggota Anda Tidak Terdaftar', 401);
    }

    // apa bila record tidak ada
    if (empty($record)) {

      $startTime = strtotime($anggota['jam_masuk']);
      $endTime = strtotime($anggota['jam_masuk_telat']);

      // apabila tepat jam masuk di dalam jam telat
      if ($current >= $startTime && $current <= $endTime) {
//        return response()->json('test absen 1', 200);

        Record::createMasuk('Tepat Waktu', $sensor['user_id']);
        return response()->json('Absen Sukses Tercatat Rajin ' . $currentTime->toTimeString(), 200);

        // apa bila di luar jam telat
      } else {
//        return response()->json('test absen 2', 200);

        Record::createMasuk('Telat Waktu', $sensor['user_id']);
        return response()->json('Absen Sukses Tercatat Anda Telat ' . $currentTime->toTimeString(), 200);
      }


      // waktu pulang
    } else if (!empty($record)) {

      // check apa kah sama dengan tanggal sekarang
      if ($currentTime->toDateString() === $record['tanggal']
        && !is_null($record['waktu_masuk'])
        && !is_null($record['waktu_pulang'])
      ) {
        return response()->json('Anda Sudah Absen Sebelumnya', 200);
      }


      $startTime = strtotime($anggota['jam_pulang']);
      $endTime = strtotime($anggota['jam_pulang_telat']);

      if ($current < $startTime) {
        return response()->json('Tidak Boleh Cabut', 200);
      }

      // apabila tepat jam pulang di dalam jam telat pulang
      if ($current >= $startTime && $current <= $endTime) {
//        return response()->json('test absen 3', 200);

        Record::createPulang($record['id']);
        return response()->json('Selamat Pulang ' . $currentTime->toTimeString(), 200);

      } else {
//        return response()->json('test absen 4', 200);

        Record::createPulang($record['id']);
        return response()->json('Selamat Lembur ' . $currentTime->toTimeString(), 200);
      }
    }

  }
}
