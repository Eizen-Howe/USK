<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use App\User;
use App\Masyarakat;
// use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    // Register Masyarakat
    public function FormRegisterMasyarakat()
    {
        return view('auth.register');
    }
    public function ActionRegisterMasyarakat()
    {
        request()->validate([
            'nik' => 'required|unique:masyarakat',
            'nama' => 'required',
            'email' => 'required|unique:masyarakat',
            'password' => 'required',
            'telp' => 'required',
        ]);
        $data_masyarakat = new Masyarakat();
        $data_masyarakat->nik = request()->get('nik');
        $data_masyarakat->nama = request()->get('nama');
        $data_masyarakat->email = request()->get('email');
        $data_masyarakat->password = bcrypt(request()->get('password'));
        $data_masyarakat->telp = request()->get('telp');
        $data_masyarakat->save();

        $user = new User;
        $user->nik = request()->get('nik');
        $user->name = request()->get('nama');
        $user->email = request()->get('email');
        $user->password = bcrypt(request()->get('password'));
        $user->save();

        return redirect()->to('/register')->with('success', 'Registrasi Berhasil!');
    }

    // /*
    // |--------------------------------------------------------------------------
    // | Register Controller
    // |--------------------------------------------------------------------------
    // |
    // | This controller handles the registration of new users as well as their
    // | validation and creation. By default this controller uses a trait to
    // | provide this functionality without requiring any additional code.
    // |
    // */

    // use RegistersUsers;

    // /**
    //  * Where to redirect users after registration.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = RouteServiceProvider::HOME;

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    // /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'nik' => ['required', 'string', 'max:16'],
    //         'nama' => ['required', 'string', 'max:35'],
    //         'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'telp' => ['required', 'string', 'max:13'],
    //     ]);
    // }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'nik' => $data['nik'],
    //         'nama' => $data['nama'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'telp' => $data['telp'],
    //     ]);
    // }
}
