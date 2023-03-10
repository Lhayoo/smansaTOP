<?php

namespace App\Controllers;

use App\Models\userModel;
use Ngekoding\CodeIgniterDataTables\DataTablesCodeIgniter4;

class Users extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Users',
            'users' => $this->userModel->getUser(),
            'active' => 'users',
            'validation' => \Config\Services::validation(),
        ];
        return view('Users/index', $data);
    }

    public function dataTables()
    {
        $query = $this->userModel->getAll();
        $datatables = new DataTablesCodeIgniter4($query);

        $datatables->only(['username', 'level', 'last_login'])
            ->addColumn('action', function ($row) {
                return ' <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit' . $row->id . '"><i
                    class="fas fa-pen"></i>
                Edit</button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete' . $row->id . '"><i
                class="fas fa-trash"></i> 
            Hapus</button>
                   ';
                //    <a href="' . base_url('Users/delete/' . $row->id) . '" class="btn btn-sm btn-danger">Delete</a>
            })
            ->generate();
    }

    public function save()
    {
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        $level = $this->request->getVar('role');
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'Username sudah ada');
            return redirect()->to('/Users')->withInput();
        }
        $this->userModel->save([
            'username' => $username,
            'password' => $password,
            'level' => $level,
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/Users');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->userModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/Users');
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        $level = $this->request->getVar('role');
        $this->userModel->save([
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'level' => $level,
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/Users');
    }
}
