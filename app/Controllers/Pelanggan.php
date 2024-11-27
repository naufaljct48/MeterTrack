<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\PemakaianModel;

class Pelanggan extends BaseController
{

    public function index()
    {
        if (!session()->get('user')) {
            return redirect()->to('/User/index');
        }
        $data = [
            'title' => 'Dashboard',
            'content' => 'Selamat datang di MeterTrack!',
        ];
        load_view('dashboard/index', $data);
    }

    public function inputPelanggan()
    {
        if (!session()->get('user')) {
            return redirect()->to('/User/index');
        }

        $userRole = session()->get('user')['role'];
        if ($userRole !== '1') {
            return redirect()->to('/dashboard')->with('error', 'Anda tidak memiliki akses untuk halaman ini');
        }

        $data = [
            'title' => 'Input Pelanggan',
            'content' => 'Halaman Input Pelanggan',
        ];
        load_view('Pelanggan/inputPelanggan', $data);
    }

    public function inputPemakaian()
    {
        if (!session()->get('user')) {
            return redirect()->to('/User/index');
        }

        $userRole = session()->get('user')['role'];
        if ($userRole !== '2') {
            return redirect()->to('/dashboard')->with('error', 'Anda tidak memiliki akses untuk halaman ini');
        }

        $pelangganModel = new PelangganModel();

        $data = [
            'title' => 'Input Pemakaian',
            'content' => 'Halaman Input Pemakaian',
            'id_pelanggan' => $pelangganModel->findAll(),
        ];
        load_view('Pelanggan/inputPemakaian', $data);
    }

    public function listPelanggan()
    {
        if (!session()->get('user')) {
            return redirect()->to('/User/index');
        }

        $data = [
            'title' => 'List Pelanggan',
            'content' => 'Selamat datang di MeterTrack!',
        ];
        load_view('Pelanggan/listPelanggan', $data);
    }

    public function listPemakaian()
    {
        if (!session()->get('user')) {
            return redirect()->to('/User/index');
        }

        $data = [
            'title' => 'List Pemakaian',
            'content' => 'Selamat datang di MeterTrack!',
        ];
        load_view('Pelanggan/listPemakaian', $data);
    }

    public function tambahPelanggan()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Request tidak valid'
            ]);
        }

        $userRole = session()->get('user')['role'];
        if ($userRole !== '1') {
            return redirect()->to('/dashboard')->with('error', 'Anda tidak memiliki akses untuk halaman ini');
        }

        $pelangganModel = new PelangganModel();

        $data = [
            'id_pelanggan' => $this->generateIdPelanggan($pelangganModel),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (!$pelangganModel->validate($data)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak valid.',
                'errors' => $pelangganModel->errors(),
            ]);
        }

        if ($pelangganModel->save($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data pelanggan berhasil disimpan.',
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.',
        ]);
    }

    private function generateIdPelanggan($pelangganModel)
    {
        $lastId = $pelangganModel->select('id')->orderBy('id', 'desc')->first();
        return $lastId ? $lastId['id'] + 1 : 1;
    }

    public function listCustomer()
    {
        $pelangganModel = new PelangganModel();
        $data = $pelangganModel->findAll();
        $response = [];

        $no = 1;
        foreach ($data as $row) {
            $status = ($row['status'] == 1) ? 'Aktif' : 'Tidak Aktif';
            $response[] = [
                $no++,
                $row['id_pelanggan'],
                $row['nama'],
                $status,
                '<button class="btn btn-primary btn-sm" onclick="detilPelanggan(' . $row['id'] . ')"><i class="fa-solid fa-magnifying-glass me-2"></i>Detail</button>'
            ];
        }

        return $this->response->setJSON([
            'data' => $response
        ]);
    }

    public function detilPelanggan()
    {
        $id = $this->request->getPost('id');
        $pelangganModel = new PelangganModel();
        $data = $pelangganModel->find($id);

        if (!$data) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Pelanggan tidak ditemukan'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function listUsage()
    {
        $PemakaianModel = new PemakaianModel();

        $data = $PemakaianModel->select('pemakaian.*, pelanggan.nama')
            ->join('pelanggan', 'pelanggan.id_pelanggan = pemakaian.id_pelanggan', 'left')
            ->findAll();

        $response = [];
        $no = 1;

        foreach ($data as $row) {
            $response[] = [
                $no++,
                $row['created_at'],
                $row['id_pelanggan'] . ' - ' . $row['nama'],
                $row['bulan'],
                $row['tahun'],
                '<button class="btn btn-primary btn-sm" onclick="detilPemakaian(' . $row['id'] . ')"><i class="fa-solid fa-magnifying-glass me-2"></i>Detail</button>'
            ];
        }

        return $this->response->setJSON([
            'data' => $response
        ]);
    }

    public function detilPemakaian()
    {
        $id = $this->request->getPost('id');
        $PemakaianModel = new PemakaianModel();

        $data = $PemakaianModel->select('pemakaian.*, pelanggan.nama')
            ->join('pelanggan', 'pelanggan.id_pelanggan = pemakaian.id_pelanggan', 'left')
            ->find($id);

        if (!$data) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Pemakaian tidak ditemukan'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function tambahPemakaian()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Request tidak valid'
            ]);
        }

        $userRole = session()->get('user')['role'];
        if ($userRole !== '2') {
            return redirect()->to('/dashboard')->with('error', 'Anda tidak memiliki akses untuk halaman ini');
        }

        $idPelanggan = $this->request->getPost('id_pelanggan');
        $bulanTahun = $this->request->getPost('tgl_pemakaian');
        $volume = $this->request->getPost('volume');

        $bulan = substr($bulanTahun, 0, 2);
        $tahun = substr($bulanTahun, 3);

        if (empty($idPelanggan) || empty($bulan) || empty($tahun) || empty($volume)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Semua field harus diisi.'
            ]);
        }

        $pemakaianModel = new PemakaianModel();
        $existingPemakaian = $pemakaianModel->where('id_pelanggan', $idPelanggan)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->first();

        if ($existingPemakaian) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Pelanggan ini sudah memiliki pemakaian untuk bulan/tahun ini.'
            ]);
        }

        $data = [
            'id_pelanggan' => $idPelanggan,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'volume' => $volume,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $pemakaianModel = new PemakaianModel();

        if ($pemakaianModel->save($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data pemakaian berhasil disimpan.',
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat menyimpan data pemakaian.'
        ]);
    }
}
