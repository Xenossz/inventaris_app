<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus masuk untuk mengakses Dashboard.');
            redirect('login');
        }
    }
    
    public function index() {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->User_model->get_user($this->session->userdata('user_id'));
        $data['items'] = $this->Item_model->get_by_user($this->session->userdata('user_id'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}
