<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Crud_model');
        $this->load->database();
        $this->load->library('session');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2030 05:00:00 GMT");
    }

    public function index() {

        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'Admin/admin_dashboard', 'refresh');

        if ($this->session->userdata('accountant_login') == 1)
            redirect(base_url() . 'Accountant/accountant_dashboard', 'refresh');

        if ($this->session->userdata('Auctioneer_login') == 1)
            redirect(base_url() . 'Auctioneer/Auctioneer_dashboard', 'refresh');
        
        if ($this->session->userdata('retailer_login') == 1)
            redirect(base_url() . 'Retailer/retailer_dashboard', 'refresh');

        // $this->load->view('frontend/login');
    }

    function ajax_login() {
        $response = array();
        $username = $_POST["phoneNumber"];
        $password = sha1($_POST["password"]);
        $response['submitted_data'] = $_POST;
        $login_status = $this->validate_login($username, $password);
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = '';
        }
        // echo json_encode($response);
    }

    function validate_login($username = '', $password = '') {
        // $credential1 = array('phoneNumber' => $username, 'password' => $password);
        $credential = array('phoneNumber' => $username, 'password' => $password);

        // $credential3 = array('email' => $username, 'password' => $password);
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', $row->status);
            // $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('login_user_id', $row->id);
            // $this->session->set_userdata('login_user_id', $row->id);
            // $this->session->set_userdata('name', $row->name);
            // $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('login_type', 'admin');
            // return 'success';
            if($row->status==1){
                redirect(base_url() . 'Admin/admin_dashboard', 'refresh');
            }
        }
        
        $query = $this->db->get_where('wholesaleuser', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('Auctioneer_login', $row->status);
            $this->session->set_userdata('Auctioneer_id', $row->id);
            $this->session->set_userdata('login_user_id', $row->id);
            $this->session->set_userdata('name', $row->bussinessName);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('phoneNumber', $row->phoneNumber);
            $this->session->set_userdata('status', $row->status);
            $this->session->set_userdata('addr', $row->bussinessaddr1);
            $this->session->set_userdata('login_type', 'Auctioneer');
            $this->session->set_userdata('verCode', $row->verificationCode);
            // return 'success';
            redirect(base_url() . 'Auctioneer/Auctioneer_dashboard', 'refresh');
            
        }


        $query = $this->db->get_where('retaileruser', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('retailer_login', $row->status);
            $this->session->set_userdata('retailer_id', $row->id);
            $this->session->set_userdata('login_user_id', $row->id);
            $this->session->set_userdata('name', $row->bussinessName);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('addr', $row->bussinessaddr1);
            $this->session->set_userdata('login_type', 'Retailer');
            $this->session->set_userdata('phoneNumber', $row->phoneNumber);
            $this->session->set_userdata('verCode', $row->verificationCode);
            // return 'success';  
            if($row->status==1){
                redirect(base_url() . 'Retailer/retailer_dashboard', 'refresh');
            }else{
                redirect(base_url() . 'user/verification', 'refresh');
            }
        }

        $data['username'] = $_POST["phoneNumber"];
        $data['pwd'] = $_POST["password"];
        echo '<script>alert("Incorrect password or phone number, please try again.")</script>';
        redirect(base_url() . 'user/index', 'refresh');
        // return 'invalid';
    }

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }
	
    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }
}