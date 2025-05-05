<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {
    
    private $table = 'items';
    
    public function __construct() {
        parent::__construct();
        
        // Create items table if it doesn't exist
        $this->create_items_table();
    }
    
    public function create_items_table() {
        if (!$this->db->table_exists($this->table)) {
            $this->load->dbforge();
            
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'description' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'price' => array(
                    'type' => 'DECIMAL',
                    'constraint' => '10,2',
                ),
                'user_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
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
    
    public function get_all() {
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table)->result();
    }
    
    public function get_by_user($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table)->result();
    }
    
    public function get($id) {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }
    
    public function create($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        return $this->db->insert($this->table, $data);
    }
    
    public function update($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    
    public function delete($id) {
        return $this->db->delete($this->table, array('id' => $id));
    }
}