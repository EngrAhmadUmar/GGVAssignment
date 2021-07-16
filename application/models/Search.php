<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Search extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function search($key){
        // $this->db->like('name', $key);
        // $query = $this->db->get('products');
        // return $query->result();
    }
    
}