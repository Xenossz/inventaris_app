<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    private $table = 'users';
    
    public function __construct() {
        parent::__construct();
        
        // Create users table if it doesn't exist
        $this->create_users_table();
    }
    
    public function create_users_table() {
        if (!$this->db->table_exists($this->table)) {
            $this->load->dbforge();
            
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'username' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'password' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'created_at' => array(
                    'type' => 'DATETIME',
                ),
                'updated_at' => array(
                    'type' => 'DATETIME',
                ),
            ));
            
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table($this->table);
        }
    }
    
    public function register($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        
        return $this->db->insert($this->table, $data);
    }
    
    public function login($username, $password) {
        $query = $this->db->get_where($this->table, array('username' => $username));
        
        if ($query->num_rows() > 0) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        
        return false;
    }
    
    public function get_user($id) {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }
    
    public function email_exists($email) {
        $query = $this->db->get_where($this->table, array('email' => $email));
        return $query->num_rows() > 0;
    }
    
    public function username_exists($username) {
        $query = $this->db->get_where($this->table, array('username' => $username));
        return $query->num_rows() > 0;
    }
}
