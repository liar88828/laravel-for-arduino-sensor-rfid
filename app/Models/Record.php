<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'waktu_masuk',
        'waktu_pulang',
        'keterangan',
        'user_id'
    ];


    //        Record::query()->create([
//          'tanggal' => $currentTime->toDateString(),//'1999-10-10'
//          'waktu_masuk' => $currentTime->toTimeString(),//'12:12:00'
//          'keterangan' => 'Tepat Waktu',
//          'user_id' => $sensor['user_id']
//        ]);

    public static function createMasuk(string $keterangan, string $user_id)
    {
        $currentTime = Carbon::now();
        return static::create([
            'tanggal' => $currentTime->toDateString(),//'1999-10-10'
            'waktu_masuk' => $currentTime->toTimeString(),//'12:12:00'
            'keterangan' => $keterangan,
            'user_id' => $user_id
        ]);
    }
//          Record::query()->where('id', '=', $record['id'])
//            ->update(['waktu_pulang' => $currentTime->toTimeString()]);
    public static function findUserRecord(string $user_id)
    {
        return static::where('records.user_id', '=', $user_id)
            ->where('records.tanggal', '=', Carbon::now()->toDateString())
            ->join('users', 'users.id', '=', 'records.user_id')
            ->select('records.*', 'users.name', 'users.divisi', 'anggota_id')
            ->orderBy('tanggal', 'DESC')
            ->first();
    }

    public static function findByDateAndUserId(string $date, string $user_id)
    {
        return static::where('records.user_id', '=', $user_id)
            ->select('records.*', 'users.name', 'users.divisi', 'anggota_id')
            ->join('users', 'records.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->whereDate('records.tanggal', $date)
            ->first();
    }

    public static function createPulang(string $record)
    {
        $currentTime = Carbon::now();
        return static::where('id', '=', $record)
            ->update([
                'waktu_pulang' => $currentTime->toTimeString()
            ]);
    }


}
