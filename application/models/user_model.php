<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function CekUser()
        {
            $username = $this->input->post('Username');
            $password = $this->input->post('Password');

            $query = $this->db->where('username', $username)
                              ->where('password', $password)
                              ->get('user');
            
            if($query->num_rows() > 0) {
                $user = array_shift($query->result_array());
                $data = array('username' => $username, 'logged_in' => TRUE, 'id' => $user['id_user']);
                $this->session->set_userdata($data);

                return TRUE;
            } else {
                return FALSE;
            }

        }
    public function getDataUser()
        {
            return $this->db->order_by('id_user', 'asc')
                            ->get('user')
                            ->result();
        }
    public function insert_user()
        {
            $data_user=array(
                'username' => $this->input->post('Username'),
                'password' => $this->input->post('Password'),
        );
            $sql_masuk= $this->db->insert('user', $data_user);
            return $sql_masuk;
        }
    public function UpdateDataUser()
        {
            $id = $this->input->post('ID');
            $data = array(
                "username"  => $this->input->post('Username'),
                "password"  => $this->input->post('Password'),
            );
            $this->db->where('id_user', $id)
                     ->update('user', $data);
    
            if($this->db->affected_rows() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    public function DeleteDataUser($id)
        {
            $this->db->where('id_user', $id)
                     ->delete('user');
    
            if($this->db->affected_rows() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
}