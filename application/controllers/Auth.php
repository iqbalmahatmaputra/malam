<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		$this->load->model('M_pengguna');
	}
	public function index()
	{
		$data['title'] = 'Login Page!';
		$this->load->view('templates/topbar',$data);
		$this->load->view('auth/index',$data);
		$this->load->view('templates/footer',$data);
    
	}
	function register(){
		
   
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'Email ini sudah pernah daftar'
			]);
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',['matches' => 'Password Kok Beda!','min_length' => 'Password pendek kali!']);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
				
			
					if( $this->form_validation->run() == false) {
					$data['title'] = 'Registrasi Akun';
					$this->load->view('templates/topbar', $data);
					$this->load->view('auth/regis');
					$this->load->view('templates/footer');
					} else {
						$data = [
							'name' => htmlspecialchars($this->input->post('name', true)),
							'email' => htmlspecialchars($this->input->post('email', true)),
							'image' =>'default.jpg',
							'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
							'role_id' => 2,
							'is_active' => 1,
							'date_created' => date('Y\-m\-d\ H:i:s A')
						];
					$this->db->insert('user', $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Gan! Akun sudah berhasil dibuat!</div> ');
					redirect('auth');
					}

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
