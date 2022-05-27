<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');   
        $this->load->model('Image_upload');
    }

    public function index(){
        $this->session->set_userdata('admin_login', 1);
        if ($this->session->userdata('admin_login') != 0)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('admin_login') == 0)
            redirect(base_url() . 'Admin/admin_dashboard', 'refresh');
    }

    function admin_dashboard(){
        // if ($this->session->userdata('admin_login') != 0)
        //     redirect(base_url() . 'login', 'refresh');
        $this->load->view('admin/manageAdmin');
            // echo $this->session->userdata('email');
            // echo $this->session->userdata('login_type');

        // $data['title']  = "Admin Dashboard";
        // $this->load->view('admin/navigation', $data);
        
        // $this->load->view('admin/footer');
    }

    function deleteAuctioneeruser(){
        $this->load->view('admin/disableDeleteWholesalerUsers');
    }

    function feature(){
        $this->load->view('admin/featureproducts');
    }

    function addAdmin(){
        $this->load->view('admin/addAdmin');
    }

    function addReciever(){
        $data['longitude'] = $this->input->post('longitude');
        $data['latitude'] = $this->input->post('latitude');
        $data['radius'] = $this->input->post('radius');
        $data['date'] = date('Y-m-d');
        $this->db->insert('locations', $data);
        redirect(base_url() . 'admin/index', 'refresh');
    }

    function registerAdmin(){
        if($this->input->post('password')!=$this->input->post('confirmpassword')){
            echo "<script>alert('Passwords Do Not Match, Please Try Again.');
            window.location.href='index';</script>";
        }
        $data['phoneNumber'] = $this->input->post('username');
        $data['password'] = sha1($this->input->post('password'));
        $this->db->insert('admin', $data);
        redirect(base_url() . 'admin/addAdmin', 'refresh');
    }

    function addNews(){
        $this->load->view('admin/addNews');
    }

    function addNewsFunction(){
        $data['title'] = $this->input->post('title');
        $data['content'] = $this->input->post('content');
        
        $config = array(
            'upload_path' => "./uploads/news/", //This is the directory where the file will be uploaded to
            'allowed_types' => "png",  //this is the acceptable file type
            'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
            'remove_spaces' => TRUE, //removing space in the name of uploaded file
            'file_name' => date('dmy_his'), //The name of the file
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );

            $this->load->library('upload', $config);  //initializing the "upload" library
            $this->upload->initialize($config);   // loading the array for uploading the file
            if($this->upload->do_upload('image')){
                $data['image'] = $config['file_name'].".png";
            }
            
        
        $this->db->insert('news', $data);
        $this->load->view('admin/addNews');
    }

    function viewproducts(){
        $this->load->view('admin/viewproducts');
    }

    function tickets(){
        $this->load->view('admin/ticket');
    }

    function orders(){
        $this->load->view('admin/orders');
    }

    function sales(){
        $this->load->view('admin/sales');
    }

    function manageNews(){
        $this->load->view('admin/manageNews');
    }

    function manageAdmin(){
        $this->load->view('admin/manageAdmin');
    }

    function deleteusers(){
        $this->load->view('admin/disableDeleteUsers');
    }

    function categories(){
        $this->load->view('admin/categories');
    }

    function addCategory(){
        $data['categoryname'] = $this->input->post('name');
        $this->db->insert('categories', $data);
        
        echo "<script>alert('Category Added Successfully.');
        window.location.href='categories';</script>";
    }

     function editCategory(){
        $data['categoryname'] = $this->input->post('name');
        $data['id'] = $this->input->post('id');
        $this->db->where('id', $data['id']);
        $this->db->update('categories', $data);
        // print_r($data);
        // $this->db->insert('categories', $data);
        
        echo "<script>alert('Category Successfully Edit.');
        window.location.href='".base_url()."admin/categories';</script>";
    }

    public function deleteCategory($id) {   
        $this->load->model("model_admin");
        $this->model_admin->delete_category($id);
        echo "<script>alert('Category Successfully Deleted.');
        window.location.href='".base_url()."admin/categories';</script>";
    }

    function disableDeleteProducts(){
        $this->load->view('admin/disableDeleteProducts');
    }

    public function deleteAuctioneer($id) {   
        $this->load->model("model_admin");
        $this->model_admin->delete_Auctioneer($id);
        redirect(base_url() . 'admin/deleteAuctioneeruser', 'refresh');
    }

    public function deleteAdmin($id) {   
        $this->load->model("model_admin");
        $this->model_admin->delete_Admin($id);
        redirect(base_url() . 'admin/manageAdmin', 'refresh');
    }

    public function deleteProduct($id) {   
        $this->load->model("model_admin");
        $this->model_admin->delete_product($id);
        redirect(base_url() . 'admin/disableDeleteProducts', 'refresh');
    }

    public function deleteRetailer($id) {   
        $this->load->model("model_admin");
        $this->model_admin->delete_retailer($id);
        redirect(base_url() . 'admin/deleteusers', 'refresh');
    }

    public function deleteNewsFunction($id) {   
        $this->load->model("model_admin");
        $this->model_admin->delete_news($id);
        redirect(base_url() . 'admin/manageNews', 'refresh');
    }

    function featureproduct($param1=""){
        
        $ID = $param1;
        $data['feature'] = 1;
        $this->db->where('ID', $ID);
        $this->db->update('products', $data);
        redirect(base_url() . 'admin/feature', 'refresh');
    }

    function nofeatureproduct($param1=""){
    
        $ID = $param1;
        $data['feature'] = 0;
        $this->db->where('ID', $ID);
        $this->db->update('products', $data);
        redirect(base_url() . 'admin/feature', 'refresh');
    }

    function nobestdeals($param1=""){
    
        $ID = $param1;
        $data['bestdeals'] = 0;
        $this->db->where('ID', $ID);
        $this->db->update('products', $data);
        redirect(base_url() . 'admin/feature', 'refresh');
    }

    
    function bestdeals($param1=""){
    
        $ID = $param1;
        $data['bestdeals'] = 1;
        $this->db->where('ID', $ID);
        $this->db->update('products', $data);
        redirect(base_url() . 'admin/feature', 'refresh');
    }

    function feature1product($param1=""){
        
        $ID = $param1;
        $data['secondfeature'] = 1;
        $this->db->where('ID', $ID);
        $this->db->update('products', $data);
        redirect(base_url() . 'admin/feature', 'refresh');
    }

    function nofeature1product($param1=""){
        
        $ID = $param1;
        $data['secondfeature'] = 0;
        $this->db->where('ID', $ID);
        $this->db->update('products', $data);
        redirect(base_url() . 'admin/feature', 'refresh');
    }

    function activateAdmin($param1=""){
        
        $id = $param1;
        $data['status'] = 1;
        $this->db->where('id', $id);
        $this->db->update('locations', $data);
        redirect(base_url() . 'admin/manageAdmin', 'refresh');
    }

    function replyticket($ticketid=""){
        $data['ticketid'] = $ticketid;
        $this->load->view('admin/replyticket', $data);
    }

    function replyticketFunction(){
        $data['id'] = $this->input->post('id');
        $data['accountName'] = $this->input->post('name');
        $data['reply'] = $this->input->post('reply');
        $data['accountType'] = $this->input->post('accountType');
        $data['message'] = $this->input->post('message');
        if($data['accountType'] == 'Auctioneer'){
            $emails = $this->db->get_where('wholesaleuser', array('bussinessName' => $data['accountName']))->result_array();
            foreach($emails as $email):
                $data['email'] = $email['email'];
            endforeach;
        }elseif($data['accountType'] == 'Retailer'){
            $emails = $this->db->get_where('retaileruser', array('bussinessName' => $data['accountName']))->result_array();
            foreach($emails as $email):
                $data['email'] = $email['email'];
            endforeach;
        }

        $email_data['accountName'] = $data['accountName'];
        $email_data['reply'] = $data['reply'];
        $email_data['message'] = $data['message'];

        $from_email = "ahmad@vonsung.co.rw";
        $to_email   = $data['email'].",a.ahmad@alustudent.com, celestin@vonsung.co.rw";
        

        $this->load->library('email'); 
        $this->load->helper('form');
        // $this->load->library('encrypt');
        $this->load->library('encryption');


        $config['useragent'] = 'CodeIgniter';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.vonsung.co.rw';
        $config['smtp_user'] = 'ahmad@vonsung.co.rw';
        $config['smtp_pass'] = 'vonsung@vonsung';
        $config['smtp_port'] = 587;
        
        $config['smtp_timeout'] = 5;
        $config['wordwrap'] = TRUE;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = FALSE;
        $config['priority'] = 1;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['bcc_batch_mode'] = FALSE;
        $config['bcc_batch_size'] = 200; 

        $this->email->initialize($config);
        
        $this->email->set_mailtype("html");
        // $this->load->library('encrypt');
        $this->load->library('encryption');
        
        // // $this->email->attach('https://vonsung.co.rw/attachement/Advanced_Excel_and_KoBo_Training_Manual.pdf');
        $this->email->from($from_email, 'Moyata');
        $this->email->to($to_email);
        $this->email->subject('Reply to your inquiry at Moyata eCommerce');
    
        // $body = $this->load->view('admin/email_inquiry',$email_data,TRUE);
        // $this->email->message($body);    
        // $this->email->send();
            //Send email -ends
        $inquiry['reply'] = $email_data['reply'];
        $inquiry['status'] = "Attended";
        $inquiry['replydate'] = date('d/m/Y - h:i:s:a');

        $this->db->where('id', $data['id']);
        $this->db->update('ticket', $inquiry);
        
        echo "<script>alert('Reply Successfully Sent.');
        window.location.href='replyticket';</script>";
        // $data['ticketid'] = $ticketid;
        // $this->load->view('admin/replyticket', $data);
    }

    function deactivateAdmin($param1=""){
        
        $id = $param1;
        $data['status'] = 0;
        $this->db->where('id', $id);
        $this->db->update('locations', $data);
        redirect(base_url() . 'admin/manageAdmin', 'refresh');
    }

    function activatestatus($param1=""){
        
        $id = $param1;
        $data['status'] = 1;
        $this->db->where('id', $id);
        $this->db->update('retaileruser', $data);
        redirect(base_url() . 'admin/deleteusers', 'refresh');
    }

    function activateproduct($param1=""){
        

        $ID = $param1;
        $data['status'] = 1;

        $this->db->where('ID', $ID);
        $this->db->update('products', $data);
        redirect(base_url() . 'admin/disableDeleteProducts', 'refresh');
    }

    function deactivateproduct($param1=""){
        

        $ID = $param1;
        $data['status'] = 0;

        $this->db->where('ID', $ID);
        $this->db->update('products', $data);
        redirect(base_url() . 'admin/disableDeleteProducts', 'refresh');
    }

    function activatestatusw($param1=""){
        

        $id = $param1;
        $data['status'] = 1;

        $this->db->where('id', $id);
        $this->db->update('wholesaleuser', $data);
        redirect(base_url() . 'admin/deleteAuctioneeruser', 'refresh');
    }

    function deactivatestatusw($param1=""){
        

        $id = $param1;
        $data['status'] = 0;

        $this->db->where('id', $id);
        $this->db->update('wholesaleuser', $data);
        redirect(base_url() . 'admin/deleteAuctioneeruser', 'refresh');
    }

    function deactivatestatus($param1=""){
        
        $id = $param1;
        $data['status'] = 0;

        $this->db->where('id', $id);
        $this->db->update('retaileruser', $data);

        redirect(base_url() . 'admin/deleteusers', 'refresh');
    }

}

?>