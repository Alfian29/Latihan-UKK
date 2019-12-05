<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function getDataMenu()
    {
        return $this->db->order_by('id_menu', 'asc')
                        ->get('menu')
                        ->result();
    }
    public function insert_menu()
        {
            $data_menu=array(
                'nama_menu' => $this->input->post('NamaMenu'),
                'harga'     => $this->input->post('Harga'),
        );
            $sql_masuk= $this->db->insert('menu', $data_menu);
            return $sql_masuk;
        }
    public function UpdateDataMenu()
        {
            $id = $this->input->post('ID');
            $data = array(
                "nama_menu"  => $this->input->post('NamaMenu'),
                "harga"        => $this->input->post('Harga'),
            );
            $this->db->where('id_menu', $id)
                     ->update('menu', $data);
    
            if($this->db->affected_rows() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    public function DeleteDataMenu($id)
        {
            $this->db->where('id_menu', $id)
                     ->delete('menu');
    
            if($this->db->affected_rows() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
}