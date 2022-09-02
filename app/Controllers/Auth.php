<?php

namespace App\Controllers;

class Auth extends BaseController
{
    protected $db = null; // class variable

    public function __construct()
    {
        // inisiasi koneksi ke database
        $this->db = \Config\Database::connect();
    }

    public function login()
    {
        // mengambil validasi
        $data['v']  = \Config\Services::validation();

        return view('auth/login', $data);
    }

    public function signin()
    {
        // validation
        $validation = \Config\Services::validation();
        $vrules = [
            'email'     => 'required|valid_email',
            'password'  => 'required',
        ];
        $verrors = [
            'email'     => [
                'required'      => 'Email harus diisi',
                'valid_email'   => 'Email harus valid'
            ],
            'password'  => ['required'    => 'Password harus diisi'],
        ];

        if (!$this->validate($vrules, $verrors)) {
            return redirect()->back()->withInput();
        }

        // ambil data dari form
        $form = $this->request->getPost();
        // get data user
        $record = $this->db->table('users')->where('email', $form['email'])->get()->getRow();
        print_r($record);
        // cocokkan password
        $hash = hash("sha256", $form['password']);
        if ($record) {
            if ($hash == $record->hash) {
                // simpan user ke session
                $data = [
                    "email"     => $record->email,
                    "fullname"  => $record->fullname,
                    "logged_in" => true
                ];
                session()->set($data);

                return redirect()->to('dashboard');
            } else {
                return redirect()->back()->with('error', "Password mismatch.");
            }
        } else {
            return redirect()->back()->with('error', "User not registered.");
        }
    }

    public function logout()
    {
        session();
        session_destroy();
        return redirect()->to('/');
    }
}
