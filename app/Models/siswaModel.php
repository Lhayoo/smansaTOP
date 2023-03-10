<?php

namespace App\Models;

use CodeIgniter\Model;

class siswaModel extends Model
{
	protected $table = 'siswa';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nama', 'nisn', 'alamat', 'no_hp', 'kelas', 'nama_ortu'];

	public function getAll()
	{
		return $this->db->table('siswa')->orderBy('nisn', 'ASC');
	}
	public function getSiswa($id = false)
	{
		if ($id == false) {
			return $this->orderBy('nama', 'ASC')->findAll();
		}
		return $this->where(['id' => $id])->first();
	}

	public function getSiswaByNIS($nis)
	{
		return $this->where(['nisn' => $nis])->first();
	}
}
