<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus masuk untuk mengakses area ini.');
            redirect('login');
        }
    }
    
    public function index() {
        $data['title'] = 'Items';
        $data['items'] = $this->Item_model->get_by_user($this->session->userdata('user_id'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('items/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($id) {
        $data['item'] = $this->Item_model->get($id);
        
        if (empty($data['item'])) {
            show_404();
        }
        
        // Periksa apakah item tersebut milik pengguna yang masuk
        if ($data['item']->user_id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda tidak berwenang melihat item ini.');
            redirect('items');
        }
        
        $data['title'] = $data['item']->name;
        
        $this->load->view('templates/header', $data);
        $this->load->view('items/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function create() {
        $data['title'] = 'Create Item';
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('items/create', $data);
            $this->load->view('templates/footer');
        } else {
            $item_data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'user_id' => $this->session->userdata('user_id')
            );
            
            if ($this->Item_model->create($item_data)) {
                $this->session->set_flashdata('success', 'Item berhasil dibuat.');
                redirect('items');
            } else {
                $this->session->set_flashdata('error', 'Gagal membuat item.');
                redirect('items/create');
            }
        }
    }
    
    public function edit($id) {
        $data['item'] = $this->Item_model->get($id);
        
        if (empty($data['item'])) {
            show_404();
        }
        
        // Periksa apakah item tersebut milik pengguna yang masuk
        if ($data['item']->user_id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda tidak berwenang mengedit item ini.');
            redirect('items');
        }
        
        $data['title'] = 'Edit Item';
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('items/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $item_data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price')
            );
            
            if ($this->Item_model->update($id, $item_data)) {
                $this->session->set_flashdata('success', 'Item berhasil diperbarui.');
                redirect('items');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui item.');
                redirect('items/edit/' . $id);
            }
        }
    }
    
    public function delete($id) {
        $item = $this->Item_model->get($id);
        
        if (empty($item)) {
            show_404();
        }
        
        // Check if the item belongs to the logged-in user
        if ($item->user_id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda tidak berwenang menghapus item ini.');
            redirect('items');
        }
        
        if ($this->Item_model->delete($id)) {
            $this->session->set_flashdata('success', 'Item berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus item.');
        }
        
        redirect('items');
    }
}