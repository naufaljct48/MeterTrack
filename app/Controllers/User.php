<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ReferensiModel;

class User extends BaseController
{

    protected function validateCSRF($providedToken)
    {
        return $providedToken === csrf_hash();
    }

    protected function regenerateCSRF()
    {
        return csrf_hash();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'content' => 'Selamat datang di MeterTrack!',
        ];
        load_view_user('user/login', $data);
    }

    public function login()
    {
        if ($this->request->getMethod() !== 'POST') {
            return redirect()->to(base_url('/'));
        }

        $csrfName = csrf_token();
        $csrfHash = $this->request->getVar($csrfName);

        if ($csrfHash !== csrf_hash()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid CSRF token',
                'csrf_token' => $this->regenerateCSRF()
            ]);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $referensiModel = new ReferensiModel(); // Inisialisasi model Referensi

        // Ambil user berdasarkan username
        $user = $userModel->where('username', $username)->first();

        // Verifikasi password
        if (!$user || !password_verify($password, $user['password'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Username atau password salah',
                'csrf_token' => $this->regenerateCSRF()
            ]);
        }

        // Cek apakah role user ada di tabel referensi dengan kondisi jenis=1 dan status=1
        $role = $referensiModel->where('id', $user['role'])
            ->where('jenis', 1) // Periksa jenis
            ->where('status', 1) // Periksa status
            ->first();

        // Jika role tidak ditemukan atau tidak sesuai, kirim response error
        if (!$role) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Role tidak valid atau tidak aktif',
                'csrf_token' => $this->regenerateCSRF()
            ]);
        }

        // Jika login berhasil, set session
        session()->set('user', [
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role']
        ]);

        // Kembalikan response sukses
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Login Berhasil!',
            'redirect_url' => base_url('dashboard'),
            'csrf_token' => $this->regenerateCSRF()
        ]);
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
        ];
        load_view_user('user/register', $data);
    }

    public function doRegister()
    {
        if ($this->request->getMethod() !== 'POST') {
            return redirect()->to(base_url('/'));
        }
        $csrfName = csrf_token();
        $csrfHash = $this->request->getVar($csrfName);

        if ($csrfHash !== csrf_hash()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid CSRF token',
                'csrf_token' => $this->regenerateCSRF()
            ]);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Username dan password harus diisi',
                'csrf_token' => $this->regenerateCSRF()
            ]);
        }

        $userModel = new UserModel();

        $existingUser = $userModel->where('username', $username)->first();
        if ($existingUser) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Username sudah terdaftar',
                'csrf_token' => $this->regenerateCSRF()
            ]);
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $userData = [
            'username' => $username,
            'password' => $hashedPassword,
            'role' => 'Admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        try {
            $result = $userModel->insert($userData);

            if ($result) {
                session()->set('user', [
                    'id' => $userModel->getInsertID(),
                    'username' => $username,
                    'role' => 'Admin'
                ]);

                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Registrasi Berhasil!',
                    'redirect_url' => base_url('dashboard'),
                    'csrf_token' => $this->regenerateCSRF()
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Gagal menyimpan data',
                    'csrf_token' => $this->regenerateCSRF()
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'csrf_token' => $this->regenerateCSRF()
            ]);
        }
    }
}
