<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
     */
     function __construct(){
		parent::__construct();
		$this->load->model('M_mahasiswa');
	}
	public function index()
	{
		$data['mahasiswa'] = $this->M_mahasiswa->show_all()->result();
		$this->load->view('index2',$data);
    
	}
	function tambah(){
		$data['judul'] = "Form Penambahan Data Mahasiswa";
		$this->load->view('TambahData',$data);
	}
	public function insertData(){
		// $data['namaMatkul'] = $this->M_mahasiswa->getNamaMatkul();
		$data['namaMatkul'] = $this->db->get('matkul')->result_array();
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$telfon = $this->input->post('telfon');
		$kode_matkul = $this->input->post('kode_matkul');
		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'jk' =>  $jk,
			'alamat' => $alamat,
			'telfon' => $telfon,
			'kode_matkul' => $kode_matkul
		);
		$this->db->insert('mahasiswa', $data);
	
		redirect('mahasiswa/index');
	}
	public function hapus_mahasiswa($nim){
		$this->db->where('nim', $nim);
		$this->db->delete('mahasiswa');
		redirect('mahasiswa/index');
	}

	function delete($nim){
		$this->db->where('nim', $nim);
		$this->db->delete('mahasiswa');
		redirect('mahasiswa/index');
	}
	function ubah_maha($nim){
		echo "berhasil";
	}

	function ubah_mahasiswa($nim){
		$where = array('nim' => $nim);
		$data['mahasiswa'] = $this->M_mahasiswa->edit_data($where,'mahasiswa')->result();
		$this->load->view('EditData',$data);
	}
  
	 function update(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$telfon = $this->input->post('telfon');
		$kode_matkul = $this->input->post('kode_matkul');
	 
		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'jk' =>  $jk,
			'alamat' => $alamat,
			'telfon' => $telfon,
			'kode_matkul' => $kode_matkul
		);
	 
		$where = array(
			'nim' => $nim
		);
		// var_dump($where);
		// die;
	 
		$this->M_mahasiswa->update_data($where,$data,'mahasiswa');
		// $query = $this->M_mahasiswa->update_mahasiswa($data, $nim);
		// redirect('mahasiswa/index');
	}
}
