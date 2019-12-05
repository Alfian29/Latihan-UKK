<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelanggan extends CI_Controller {

public function __construct()
    {
        parent:: __construct();
        //Do your magic here
        $this->load->model('Pelanggan_Model');
    }
public function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['AllDataPelanggan'] = $this->Pelanggan_Model->getDataPelanggan();
            $data['konten'] = "v_pelanggan";
            $this->load->view('template', $data);

        }else{
            $this->load->view('form-login');
        }
    }
public function simpan_pelanggan()
    {
        $this->form_validation->set_rules('NamaPelanggan', 'NamaPelanggan', 'trim');
        $this->form_validation->set_rules('JenisKelamin', 'JenisKelamin', 'trim');
        $this->form_validation->set_rules('NoHp', 'NoHp', 'trim');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'trim');

        if ($this->form_validation->run() == TRUE)
    {
        $this->load->model('pelanggan_model', 'bar');
        $masuk=$this->bar->insert_pelanggan();
            if($masuk==true){
                $this->session->set_flashdata('notif', 'Berhasil tambah pelanggan');
            } else {
            $this->session->set_flashdata('notif', 'Gagal tambah pelanggan');
            }
            redirect(base_url('index.php/pelanggan'),'refresh');
        } else {
            $this->session->set_flashdata('notif', validation_errors());
            redirect(base_url('index.php/pelanggan'),'refresh');
        }
    }
public function SendUpdateDataPelanggan()
    {
        $this->form_validation->set_rules('ID', 'ID', 'trim|required');
        $this->form_validation->set_rules('NamaPelanggan', 'NamaPelanggan', 'trim|required');
        $this->form_validation->set_rules('NoHP', 'NoHp', 'trim');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'trim');
        
            
        if ($this->form_validation->run() == TRUE) {
            if($this->Pelanggan_Model->UpdateDataPelanggan()) {
                $this->session->set_flashdata('notif', "Berhasil Di Edit");
                redirect(base_url('index.php/pelanggan'));
            }else {
                $this->session->set_flashdata('notif', "Gagal Di Edit");
                redirect(base_url('index.php/pelanggan'));
            }
        } else {
            $this->session->set_flashdata('notif', validation_errors());
            redirect(base_url('index.php/pelanggan'));
        }
    }

public function HapusDataPelanggan($id)
	{
        if($this->Pelanggan_Model->DeleteDataPelanggan($id) == TRUE){
            $this->session->set_flashdata('notif', 'Berhasil Dihapus');
            redirect(base_url('index.php/pelanggan'));
        } else {
            $this->session->set_flashdata('notif', 'Gagal Dihapus');
            redirect(base_url('index.php/pelanggan'));
        }
        
	}
}