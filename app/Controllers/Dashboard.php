<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\PemakaianModel;

class Dashboard extends BaseController
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
        if (!session()->get('user')) {
            return redirect()->to('/User/index');
        }

        $user = session()->get('user');

        $roleData = $this->checkRole($user['role']);

        // Inisialisasi model
        $pelangganModel = new PelangganModel();
        $pemakaianModel = new PemakaianModel();

        // Dapatkan bulan dan tahun saat ini
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Hitung Total Pelanggan
        $totalPelanggan = $pelangganModel->countAllResults();

        // Hitung Total Pemakaian Bulan Ini
        $totalPemakaianBulanIni = $pemakaianModel
            ->where('bulan', $currentMonth)
            ->where('tahun', $currentYear)
            ->selectSum('volume')
            ->get()
            ->getRow()
            ->volume;

        // Hitung Jumlah Pelanggan yang Melakukan Pemakaian Bulan Ini
        $jumlahPelangganPemakaian = $pemakaianModel
            ->select('id_pelanggan')
            ->where('bulan', $currentMonth)
            ->where('tahun', $currentYear)
            ->groupBy('id_pelanggan')
            ->countAllResults();

        $data = [
            'title' => 'Dashboard',
            'content' => 'Selamat datang di MeterTrack!',
            'user' => $user,
            'roleDescription' => $roleData['roleDescription'],
            'role' => $user['role'],
            'totalPelanggan' => $totalPelanggan,
            'totalPemakaianBulanIni' => $totalPemakaianBulanIni,
            'jumlahPelangganPemakaian' => $jumlahPelangganPemakaian
        ];

        load_view('dashboard/index', $data);
    }
}
