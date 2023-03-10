<?php

namespace App\Controllers;

use App\Models\siswaModel;


class Home extends BaseController
{
    protected $siswaModel;
    public function __construct()
    {
        $this->siswaModel = new siswaModel();
    }
    public function index()
    {
        if (isset($_POST['cari'])) {
            $nis = $this->request->getVar('nama');
            $data = [
                'title' => 'Home',
                'listSiswa' => $this->siswaModel->getSiswa(),
                'siswa' => $this->siswaModel->getSiswaByNIS($nis),
                'active' => 'home',
            ];
        } else {
            $data = [
                'title' => 'Home',
                'siswa' => $this->siswaModel->getSiswaByNIS('0'),
                'listSiswa' => $this->siswaModel->getSiswa(),
                'active' => 'home',
            ];
        }
        return view('Home/index', $data);
    }
}
