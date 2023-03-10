<?php

namespace App\Controllers;

use App\Models\siswaModel;
use Ngekoding\CodeIgniterDataTables\DataTablesCodeIgniter4;


class Siswa extends BaseController
{
    protected $siswaModel;
    public function __construct()
    {
        $this->siswaModel = new siswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Siswa',
            'siswa' => $this->siswaModel->getSiswa(),
            'active' => 'siswa',
        ];
        return view('Siswa/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Siswa',
            'siswa' => $this->siswaModel->getSiswaId($id)
        ];
        return view('Siswa/detail', $data);
    }

    public function save()
    {
        $file_excel = $this->request->getFile('fileExcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } elseif ($ext == 'xlsx') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } elseif ($ext == 'csv') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }

        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $col) {
            if ($x < 6) {
                continue;
            }
            $simpandata = [
                'nama' => $col[1],
                'nisn' => $col[4],
                'alamat' => $col[9],
                'no_hp' => $col[19],
                'kelas' => $col[42],
                'nama_ortu' => $col[30]
            ];
            $this->siswaModel->insert($simpandata);
        }

        session()->setFlashdata('success', 'Data berhasil diimport');
        return redirect()->to('/siswa');
    }

    public function dataTables()
    {
        $query = $this->siswaModel->getAll();
        $datatables = new DataTablesCodeIgniter4($query);

        $datatables->only(['nisn', 'nama', 'kelas', 'alamat', 'no_hp', 'nama_ortu'])
            ->generate();
    }
}
