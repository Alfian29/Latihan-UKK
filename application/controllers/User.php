<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

public function __construct()
    {
        parent:: __construct();
        //Do your magic here
        $this->load->model('User_Model');
    }

public function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['AllDataUser'] = $this->User_Model->getDataUser();
            $data['konten'] = "v_user";
            $this->load->view('template', $data);

        }else{
            $this->load->view('form-login');
        }
    }

    public function Formlogin()
    {
        if($this->session->userdata('logged_in')== TRUE) {
            redirect(base_url('index.php/pelanggan'));
        }
        else{
            $this->load->view('form-login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('Username','Username','trim|required');
        $this->form_validation->set_rules('Password','Password','trim|required');

        if($this->form_validation->run() ==TRUE) {
            if($this->User_Model->CekUser() == TRUE) {
                redirect(base_url('index.php/pelanggan'));
            }else{
                $this->session->set_flashdata('notif',"Username atau Password Salah");
                redirect(base_url('index.php/user/FormLogin'));
            }
        }
        else {
            $this->session->set_flashdata('notif',validation_errors());
            redirect(base_url('index.php/user/FormLogin'));
            }
        }

public function Logout()
    {
        $this->session->sess_destroy();
        $this->load->view('form-login');
    }

public function simpan_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'trim');

        if ($this->form_validation->run() == TRUE)
    {
        $this->load->model('user_model', 'bar');
        $masuk=$this->bar->insert_user();
            if($masuk==true){
                $this->session->set_flashdata('notif', 'Berhasil tambah user');
            } else {
            $this->session->set_flashdata('notif', 'Gagal tambah user');
            }
            redirect(base_url('index.php/user'),'refresh');
        } else {
            $this->session->set_flashdata('notif', validation_errors());
            redirect(base_url('index.php/user'),'refresh');
        }
    }

public function SendUpdateDataUser()
    {
        $this->form_validation->set_rules('ID', 'ID', 'trim|required');
        $this->form_validation->set_rules('Username', 'Username', 'trim|required');
        $this->form_validation->set_rules('Password', 'Password', 'trim|required');
            
        if ($this->form_validation->run() == TRUE) {
            if($this->User_Model->UpdateDataUser()) {
                $this->session->set_flashdata('notif', "Berhasil Di Edit");
                redirect(base_url('index.php/user'));
            }else {
                $this->session->set_flashdata('notif', "Gagal Di Edit");
                redirect(base_url('index.php/user'));
            }
        } else {
            $this->session->set_flashdata('notif', validation_errors());
            redirect(base_url('index.php/user'));
        }
    }

public function HapusDataUser($id)
	{
        if($this->User_Model->DeleteDataUser($id) == TRUE){
            $this->session->set_flashdata('notif', 'Berhasil Dihapus');
            redirect(base_url('index.php/user'));
        } else {
            $this->session->set_flashdata('notif', 'Gagal Dihapus');
            redirect(base_url('index.php/user'));
        }
        
	}
}