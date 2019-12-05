<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    public function getDataPelanggan()
    {
        return $this->db->order_by('id_pelanggan', 'asc')
                        ->get('pelanggan')
                        ->result();
    }
    public function insert_pelanggan()
        {
            $data_pelanggan=array(
                'nama_pelanggan'=> $this->input->post('NamaPelanggan'),
                'jenis_kelamin' => $this->input->post('JenisKelamin'),
                'no_hp'         => $this->input->post('NoHp'),
                'alamat'        => $this->input->post('Alamat'),
        );
            $sql_masuk= $this->db->insert('pelanggan', $data_pelanggan);
            return $sql_masuk;
        }
    public function UpdateDataPelanggan()
        {
            $id = $this->input->post('ID');
            $data = array(
                "nama_pelanggan"  => $this->input->post('NamaPelanggan'),
                "jenis_kelamin"   => $this->input->post('JenisKelamin'),
                "no_hp"           => $this->input->post('NoHp'),
                "alamat"          => $this->input->post('Alamat'),
            );
            $this->db->where('id_pelanggan', $id)
                     ->update('pelanggan', $data);
    
            if($this->db->affected_rows() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    public function DeleteDataPelanggan($id)
        {
            $this->db->where('id_pelanggan', $id)
                     ->delete('pelanggan');
    
            if($this->db->affected_rows() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
}