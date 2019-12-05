<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends CI_Controller {

public function __construct()
    {
        parent:: __construct();
        //Do your magic here
        $this->load->model('Menu_Model');
    }
public function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['AllDataMenu'] = $this->Menu_Model->getDataMenu();
            $data['konten'] = "v_menu";
            $this->load->view('template', $data);

        }else{
            $this->load->view('form-login');
        }
    }
public function simpan_menu()
    {
        $this->form_validation->set_rules('NamaMenu', 'NamaMenu', 'trim');
        $this->form_validation->set_rules('Harga', 'Harga', 'trim');

        if ($this->form_validation->run() == TRUE)
    {
        $this->load->model('menu_model', 'bar');
        $masuk=$this->bar->insert_menu();
            if($masuk==true){
                $this->session->set_flashdata('notif', 'Berhasil tambah menu');
            } else {
            $this->session->set_flashdata('notif', 'Gagal tambah menu');
            }
            redirect(base_url('index.php/menu'),'refresh');
        } else {
            $this->session->set_flashdata('notif', validation_errors());
            redirect(base_url('index.php/menu'),'refresh');
        }
    }
public function SendUpdateDataMenu()
    {
        $this->form_validation->set_rules('ID', 'ID', 'trim|required');
        $this->form_validation->set_rules('NamaMenu', 'NamaMenu', 'trim|required');
        $this->form_validation->set_rules('Harga', 'Harga', 'trim|required');
            
        if ($this->form_validation->run() == TRUE) {
            if($this->Menu_Model->UpdateDataMenu()) {
                $this->session->set_flashdata('notif', "Berhasil Di Edit");
                redirect(base_url('index.php/menu'));
            }else {
                $this->session->set_flashdata('notif', "Gagal Di Edit");
                redirect(base_url('index.php/menu'));
            }
        } else {
            $this->session->set_flashdata('notif', validation_errors());
            redirect(base_url('index.php/menu'));
        }
    }

public function HapusDataMenu($id)
	{
        if($this->Menu_Model->DeleteDataMenu($id) == TRUE){
            $this->session->set_flashdata('notif', 'Berhasil Dihapus');
            redirect(base_url('index.php/menu'));
        } else {
            $this->session->set_flashdata('notif', 'Gagal Dihapus');
            redirect(base_url('index.php/menu'));
        }
        
	}
}