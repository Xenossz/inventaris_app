<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->login();
    }
    
    public function register() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            
            if ($this->User_model->register($data)) {
                $this->session->set_flashdata('success', 'Registrasi Berhasil, Anda bisa Login sekarang');
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan. Silakan coba lagi.');
                redirect('register');
            }
        }
    }
    
    public function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user = $this->User_model->login($username, $password);
            
            if ($user) {
                $user_data = array(
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'logged_in' => TRUE
                );
                
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('success', 'Anda sekarang sudah Login.');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Nama pengguna atau kata sandi tidak valid.');
                redirect('login');
            }
        }
    }
    
    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');
        
        $this->session->set_flashdata('success', 'Anda sekarang telah keluar.');
        redirect('login');
    }
}