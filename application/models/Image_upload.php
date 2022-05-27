<?php 


class Image_upload extends CI_Model
{
    public function File_upload($data1){
        $qry = $this -> db -> insert('products', $data1);
        if($qry){
            echo "Succesful";
        }else{
            echo "error";
        }
    }

    public function News_upload($data1){
        $qry = $this -> db -> insert('news', $data1);
        if($qry){
            echo "Succesful";
        }else{
            echo "error";
        }
    }
}