<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Record;
use App\Models\Sensor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AuthController extends Controller
{

    // Show Login Form
    public function login()
    {
        return view('auth.login');
    }

    public function profile()
    {
        return view('auth.login');
    }

    // Show Login Form
    public function profileCheck(string $id)
    {
        $user = User::query()->where('users.id', '=', $id)
//            ->join('sensors', 'sensors.user_id', '=', 'users.id')
//            ->join('anggotas', 'anggotas.id', '=', 'users.anggota_id')
            ->first();

        if ($user == null) {
            return redirect()
                ->route('list.user')
                ->with('message', 'Data Tidak Ditemukan');
        }

        $anggota = Anggota::query()->where('anggotas.id', '=', $user['anggota_id'])
//            ->join('sensors', 'sensors.user_id', '=', 'users.id')
//            ->join('anggotas', 'anggotas.id', '=', 'users.anggota_id')
            ->first();

        $sensor = Sensor::query()->where('sensors.user_id', '=', $user['id'])
//            ->join('sensors', 'sensors.user_id', '=', 'users.id')
//            ->join('anggotas', 'anggotas.id', '=', 'users.anggota_id')
            ->first();

        $record = Record::query()->where('records.user_id', '=', $user['id'])
//            ->join('sensors', 'sensors.user_id', '=', 'users.id')
//            ->join('anggotas', 'anggotas.id', '=', 'users.anggota_id')
            ->get();


//        dd($data);
        return view(
            'auth.profile',
            [
                'user' => $user,
                'anggota' => $anggota,
                'sensor' => $sensor,
                'record' => $record,
            ]
        );

    }

    // Show Login Form
    public function register()
    {
        return view('auth.register');
    }

    // Create New User/register
    public function store(Request $request)
    {
//        dd($request);

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'alamat' => ['required', 'min:3'],
            'no_tlp' => ['required', 'min:3'],
            'jenis_kelamin' => ['required', 'min:3'],
            'lahir' => ['required', 'date'],
            'divisi' => ['required', 'min:3'],
            'rfid' => ['required', Rule::unique('sensors', 'rfid')],
        ]);
//dd($formFields);
        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'alamat' => $formFields['alamat'],
            'no_tlp' => $formFields['no_tlp'],
            'jenis_kelamin' => $formFields['jenis_kelamin'],
            'lahir' => $formFields['lahir'],
            'divisi' => $formFields['divisi'],
            'password' => $formFields['password'],

        ]);


        Sensor::create([
            'rfid' => $formFields['rfid'],
            'status' => 'Invalid',
            'user_id' => $user->id,
        ]);


        // Create Anggota
//        $anggota = Anggota::create([
//            'nama' => $formFields['nama'],
//            'alamat' => $formFields['alamat'],
//            'no_tlp' => $formFields['no_tlp'],
//            'jenis_kelamin' => $formFields['jenis_kelamin'],
//            'password' => $formFields['password'],
//            'id_user' => $user->id,
//        ]);

        // Merge the two arrays
//        $combined_data = array_merge($user, $anggota);
//        dd($combined_data);
        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }


    // Authenticate User /login
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }


    public function list()
    {

        $data = User::query()
            ->join('sensors', 'users.id', '=', 'sensors.user_id')
            ->select('users.*', 'sensors.rfid')
            ->paginate(20);
//        dd($data);
        return view('auth.list_user', ['data' => $data]);

    }


    public function edit(string $id)
    {
        $data = User::query()
            ->where('users.id', '=', $id)
            ->join('sensors', 'users.id', '=', 'sensors.user_id')
            ->select('users.*', 'sensors.rfid')
            ->first();
//        dd($data);
        return view('auth.edit', ['data' => $data]);

    }

    public function update(Request $request, string $id)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'min:3'],
            'password' => 'required|confirmed|min:6',
            'alamat' => ['required', 'min:3'],
            'no_tlp' => ['required', 'min:3'],
            'jenis_kelamin' => ['required', 'min:3'],
            'lahir' => ['required', 'date'],
            'divisi' => ['required', 'min:3'],
            'rfid' => ['required', 'min:3'],
        ]);
//dd($formFields);
        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::query()->findOrFail($id);
        $user->update([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'alamat' => $formFields['alamat'],
            'no_tlp' => $formFields['no_tlp'],
            'jenis_kelamin' => $formFields['jenis_kelamin'],
            'lahir' => $formFields['lahir'],
            'divisi' => $formFields['divisi'],
            'password' => $formFields['password'],
        ]);

        Sensor::query()->where('user_id', '=', $user->id)
            ->update(['rfid' => $formFields['rfid']]);

//            findOrFail($user->id);
//        $sensor->update(['rfid' => $formFields['rfid']]);


//        auth()->login($user);
//        dd('test');
        return redirect()
            ->route('list.user', $formFields)
            ->with('message', 'Data Berhasil Di Ubah');
    }


    public function create()
    {
        return view('auth.create');
    }


}
