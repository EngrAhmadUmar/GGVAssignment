<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Model_admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function did_delete_row($ID){
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('products');
    }

    public function delete_category($id){
        $this -> db -> where('id', $id);
        $this -> db -> delete('categories');
    }

    public function delete_retailer($id){
        $this -> db -> where('id', $id);
        $this -> db -> delete('retaileruser');
    }

    public function delete_wholesaler($id){
        $this -> db -> where('id', $id);
        $this -> db -> delete('wholesaleuser');
    }

    public function delete_product($ID){
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('products');
    }

    public function delete_Admin($id){
        $this -> db -> where('id', $id);
        $this -> db -> delete('admin');
    }

    public function delete_news($id){
        $this -> db -> where('id', $id);
        $this -> db -> delete('news');
    }
    
}