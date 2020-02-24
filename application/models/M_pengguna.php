<?php

class M_pengguna extends CI_Model{


      function show_all(){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->join('user_role', 'user_role.id = user.role_id');
            $query = $this->db->get();
            return $query;
      }
      public function getNamaMatkul(){

            $query = "SELECT `matkul`.*, `matkul`.`nama_matkul`
            FROM `matkul` JOIN `mahasiswa`
            ON `matkul`.`kode_matkul` = `mahasiswa`.`kode_matkul`
             ";
             return $this->db->query($query)->result_array();
        }
        function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
 
	function update_data($where,$data,$table){
		$this->db->where($where);
            $query = $this->db->update($table,$data);
            if($query){
                  redirect('mahasiswa/index');
		}else{
                  echo "tidak berhasil";
            }
      }
      // cara ke 2
      public function update_mahasiswa($data, $nim){
            $this->db->where('mahasiswa.nim', $nim);
            return $this->db->update('mahasiswa', $data);
      }

}