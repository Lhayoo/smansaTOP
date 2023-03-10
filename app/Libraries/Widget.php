<?php
namespace App\Libraries;

use App\Models\Auth_Model;
use App\Models\Pegawai_Model;
use App\Models\Siswa_Model;
use App\Models\Hak_Akses_Model;

class Widget{
	private $data;
	
	public function sidebar()
	{
		$session 	= session();
		$pegawai_m 	= model(Pegawai_Model::class);
		$siswa_m 	= model(Siswa_Model::class);
		$hak_akses_m= model(Hak_Akses_Model::class);
		
		$id_user 	= $session->get('id_user');
		$jenis		= $session->get('jenis');
		
		$uri	= service('uri');		
		
		if($jenis == 'pegawai')
		{
			$user		= $pegawai_m->getPegawaiId($id_user)->getRowArray();
			$hak		= $hak_akses_m->setHakAksesPegawai($id_user);
			$menu		= $hak_akses_m->getHakAksesPegawai($id_user)->getResultArray();
		}
		else 
		{
			$user		= $siswa_m->getSiswaId($id_user)->getRowArray();
			$hak		= $hak_akses_m->setHakAksesSiswa($id_user);;
			$menu		= $hak_akses_m->getHakAksesSiswa()->getResultArray();
		}
		$this->data['_home'] = ($uri->setSilent()->getSegment(1) == '') OR ($uri->setSilent()->getSegment(1) == 'home') ? true:false;
		$this->data['_active_module'] 		= $uri->setSilent()->getSegment(1);
		$this->data['_active_controller'] 	= $uri->setSilent()->getSegment(2);
		$this->data['_nama']		= $user['nama'];
		$this->data['_hak']			= $hak;
		$this->data['_menu']		= $menu;
		
		return view('_template/sidebar', $this->data);
	}
	
	public function menu_apk()
	{
		$session 	= session();
		$pegawai_m 	= model(Pegawai_Model::class);
		$siswa_m 	= model(Siswa_Model::class);
		$hak_akses_m= model(Hak_Akses_Model::class);
		
		$id_user 	= $session->get('id_user');
		$jenis		= $session->get('jenis');
		
		$uri	= service('uri');		
		
		if($jenis == 'pegawai')
		{
			$user		= $pegawai_m->getPegawaiId($id_user)->getRowArray();
			$hak		= $hak_akses_m->setHakAksesPegawaiApk($id_user);
			$menu		= $hak_akses_m->getHakAksesPegawaiApk($id_user)->getResultArray();
		}
		else 
		{
			$user		= $siswa_m->getSiswaId($id_user)->getRowArray();
			$hak		= $hak_akses_m->setHakAksesSiswaApk($id_user);;
			$menu		= $hak_akses_m->getHakAksesSiswaApk()->getResultArray();
		}
		$this->data['_home'] = ($uri->setSilent()->getSegment(1) == '') OR ($uri->setSilent()->getSegment(1) == 'home') ? true:false;
		$this->data['_active_module'] 		= $uri->setSilent()->getSegment(1);
		$this->data['_active_controller'] 	= $uri->setSilent()->getSegment(2);
		$this->data['_nama']		= $user['nama'];
		$this->data['_hak']			= $hak;
		$this->data['_menu']		= $menu;
		
		return view('apk/_template/menu_app', $this->data);
	}
	
	public function apk_nav_user()
	{
		$session 	= session();
		$pegawai_m 	= model(Pegawai_Model::class);
		$siswa_m 	= model(Siswa_Model::class);
		
		$id_user 	= $session->get('id_user');
		$jenis		= $session->get('jenis');
		
		if($jenis == 'pegawai')
		{
			$user		= $pegawai_m->getPegawaiId($id_user)->getRowArray();
			$this->data['_no_id']		= $user['username'];		
		}
		else 
		{
			$user		= $siswa_m->getSiswaId($id_user)->getRowArray();
			$this->data['_no_id']		= $user['nis'];		
		}		
		$this->data['_nama']		= $user['nama'];
		
		return view('apk/_template/nav_user', $this->data);
	}
}