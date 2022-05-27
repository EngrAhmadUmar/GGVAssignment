<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
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

    function index(){
        $this->load->view('user/index');
    }

    function admin(){
        $this->load->view('admin/index');
    }

    function news($param2 = ""){
        $data['news_id'] = $param2;
        $this->load->view('user/news', $data);
    }

    function shop($param1 = ""){
        $data['product_id'] = $param1;
        $this->load->view('user/userview', $data);
    }

    function userview(){
        $this->load->view('user/userview');
    }

    function terms(){
        $this->load->view('policies/privacy/index.html');
    }

    function privacy(){
        $this->load->view('policies/tc/index.html');
    }

    function verification(){
        $this->load->view('user/verification');
    }

    function verifystatus(){ 
        $var = $this->session->userdata;
        $code = $var['verCode'];
        $compcode = $this->input->post('compcode');
        if($code == $compcode){
            if($var['login_type'] == "Auctioneer"){
                $id = $var['login_user_id'];
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('wholesaleuser', $data);
                echo '<script>alert("Your Account Has been Activated, You may proceed to login")</script>';
                $credential = array('id' => $id);
                $query = $this->db->get_where('wholesaleuser', $credential);
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
                    redirect(base_url() . 'Auctioneer/Auctioneer_dashboard', 'refresh');
                    }
            }
                // $this->load->view('user/index');
        }elseif($var['login_type'] == "Retailer"){
            $id = $var['login_user_id'];
            $data['status'] = 1;
            $this->db->where('id', $id);
            $this->db->update('retaileruser', $data);
            echo "<script>alert('Your Account Has been Activated, You may proceed to login');</script>";
            $credential = array('id' => $id);
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
                }
        }
    }
        }else{
            // echo $compcode;
            echo '<script>alert("Unable verity account, Incorrect verification code, please try again.")</script>';
            $this->load->view('user/verification'); 
        }
    
        
    }

    public function deleteProduct($ID) {   
        $this->load->model("model_admin");
        $this->model_admin->did_delete_row($ID);
    }

    function searchresults(){
        $this->load->view('user/searchresults');
    }

    function imageupload(){
        $this->load->view('user/imageupload');
    }


    function categories($param6 = ""){
        $key = $param6;
        $credential = array('categories' => $param6);
        $query = $this->db->get_where('products', $credential);
        // $this->db->limit(20);
        // $query = $this->db->get('products');
        
        $data['results'] = $query->result();
        // print_r($data);
        $this->load->view('user/categories', $data);
    }
    function forgotpassword(){
        $this->load->view('user/forgotpassword');
    }

    function forgotpasswordFunction(){
        $password = rand(100, 999)."".date("md");
        $phoneNumber = $this->input->post('phoneNumber');
        $securityQuestion = $this->input->post('securityQuestion');
        if($securityQuestion == 1){
            $securityQuestion = "What primary school did you attend?";
        }elseif($securityQuestion == 2){
            $securityQuestion = "In what town or city was your first full time job?";
        }elseif($securityQuestion == 3){
            $securityQuestion = "What were the last four digits of your childhood telephone number?";
        }
        $securityAnswer = sha1($this->input->post('securityAnswer'));
        $credential = array('phoneNumber' => $phoneNumber, 'securityQuestion' => $securityQuestion, 'securityAnswer' => $securityAnswer);
        $query = $this->db->get_where('retaileruser', $credential);
        $query1 = $this->db->get_where('wholesaleuser', $credential);
        if ($query->num_rows() > 0) {
            $phone_input = $phoneNumber;
            if(strlen($phone_input)==10){
                $phone = "+25".$phone_input;
            }elseif(strlen($phone_input)==9){
                $phone = "+250".$phone_input;
            }else{
            
            $phone = $phone_input;
            }
        $message2 = "Thank you for Using Moyata eCommerce Service, your new password is: ".$password."\r\n"."\r\n"."Moyata";
        
        
             $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.mista.io/sms",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => false,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'MOYATA','sms' => $message2,'unicode' => '1'),
              CURLOPT_HTTPHEADER => array(
                "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $data['password'] = sha1($password);
            $this->db->where('phoneNumber', $phoneNumber);
            $this->db->update('retaileruser', $data);
            echo "<script>alert('New Password Has been sent to your phone number, please check your inbox and use the password to log in.');
            window.location.href='index';</script>";
        }elseif($query1->num_rows() > 0) {
            $phone_input = $phoneNumber;
            if(strlen($phone_input)==10){
                $phone = "+25".$phone_input;
            }elseif(strlen($phone_input)==9){
                $phone = "+250".$phone_input;
            }else{
            
            $phone = $phone_input;
            }
        $message2 = "Thank you for Using Moyata eCommerce Service, your new password is: ".$password."\r\n"."\r\n"."Moyata";
        
        
             $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.mista.io/sms",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => false,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'MOYATA','sms' => $message2,'unicode' => '1'),
              CURLOPT_HTTPHEADER => array(
                "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $data['password'] = sha1($password);
            $this->db->where('phoneNumber', $phoneNumber);
            $this->db->update('wholesaleuser', $data);
            echo "<script>alert('New Password Has been sent to your phone number, please check your inbox and use the password to log in.');
            window.location.href='index';</script>";
        }else{
            echo "<script>alert('Match not found, Please cross check credentials and try again.');
            window.location.href='forgotpassword';</script>";
            $this->stopexecution();
        }
    }



    public function searchbar(){
        $key = $this->input->post('search');
        $this->db->like('name', $key);
        $this->db->limit(20);
        $query = $this->db->get('products');
        if($data['results'] = $query->result()){
        $this->load->view('user/searchresults', $data);
    }else{
        echo "<script>alert('No product matches your keyword, Please Try Again With Another Keyword.');
            window.location.href='index';</script>";
    }
    }

    function changeVerNum(){
        $var = $this->session->userdata;
        $data['name'] = $var['name'];
        $data1['phoneNumber1'] = $this->input->post('phoneNumber1');
        $data1['phoneNumber2'] = $this->input->post('phoneNumber2');
        $data['phoneNumber'] = $this->input->post('phoneNumber');
        $data['verificationCode'] = rand(100, 999)."".date("md");
        if($data1['phoneNumber1'] == $data1['phoneNumber2']){
            if($var['login_type'] == "Auctioneer"){
                $credential = array('phoneNumber' => $data['phoneNumber']);
                $query = $this->db->get_where('wholesaleuser', $credential);
                if ($query->num_rows() > 0) {
                    echo "<script>alert('Another user exists using the phone number, unable to verify identity, Please change phone number and try again.');
                    window.location.href='verification';</script>";
                }else{
            $phone_input = $data['phoneNumber'];
            if(strlen($phone_input)==10){
                $phone = "+25".$phone_input;
            }elseif(strlen($phone_input)==9){
                $phone = "+250".$phone_input;
            }else{
            $phone = $phone_input;
            }
            $message2 = "Dear ".$data['name']."!"."\r\n"."Thank you for Joining Moyata eCommerce Service, your verification code is: ".$data['verificationCode']."\r\n"."\r\n"."Moyata";
        
        
             $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.mista.io/sms",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => false,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'MOYATA','sms' => $message2,'unicode' => '1'),
              CURLOPT_HTTPHEADER => array(
                "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
              ),
            ));
            $response = curl_exec($curl);

            curl_close($curl);

            
            $id = $var['login_user_id'];
            
            $this->session->set_userdata('verCode', $data['verificationCode']);
            $this->db->where('id', $id);
            $this->db->update('wholesaleuser', $data);
            echo "<script>alert('New Verification Code Sent, Please proceed to verify identity');
            window.location.href='verification';</script>";
            }
            }elseif($var['login_type'] == "Retailer"){
            $credential = array('phoneNumber' => $data['phoneNumber']);
            $query = $this->db->get_where('retaileruser', $credential);
            if ($query->num_rows() > 0) {
                echo "<script>alert('Another user exists using the phone number, unable to verify identity, Please change phone number and try again.');
                window.location.href='verification';</script>";
            }else{
            $phone_input = $data['phoneNumber'];
            if(strlen($phone_input)==10){
                $phone = "+25".$phone_input;
            }elseif(strlen($phone_input)==9){
                $phone = "+250".$phone_input;
            }else{
            $phone = $phone_input;
            }
            $message2 = "Dear ".$data['name']."!"."\r\n"."Thank you for Joining Moyata eCommerce Service, your verification code is: ".$data['verificationCode']."\r\n"."\r\n"."Moyata";
        
        
             $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.mista.io/sms",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => false,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'MOYATA','sms' => $message2,'unicode' => '1'),
              CURLOPT_HTTPHEADER => array(
                "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
              ),
            ));
            $response = curl_exec($curl);

            curl_close($curl);

            
            $id = $var['login_user_id'];
            
            $this->session->set_userdata('verCode', $data['verificationCode']);
            $this->db->where('id', $id);
            $this->db->update('retaileruser', $data);
            echo "<script>alert('New Verification Code Sent, Please proceed to verify identity');
            window.location.href='verification';</script>";  
            }
        }
        }else{
            echo "<script>alert('Old Phone Number Does Not Match, Unable to verify identity, Please Try Again.');
            window.location.href='verification';</script>";
        }
    }

    public function logout(){
        $this->session->unset_userdata('login_user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('phoneNumber');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('addr');
        $this->session->unset_userdata('login_type');
        $this->session->unset_userdata('verCode');
        $this->session->sess_destroy();
        echo "<script>alert('Successfully Logged Out, You are welcome back anytime.');
            window.location.href='index';</script>";
    }

    function resendverification(){
        $var = $this->session->userdata;
        $data['name'] = $var['name'];
        $data['phoneNumber'] = $this->input->post('phoneNumber');
        $data['verificationCode'] = rand(100, 999)."".date("md");
        if($var['login_type'] == "Auctioneer"){
            $Auctioneers = $this->db->get_where('wholesaleuser', array('phoneNumber' => $data['phoneNumber']))->result_array();
            foreach($Auctioneers as $Auctioneer):
                $id =  $Auctioneer['id'];
            endforeach;
        }elseif($var['login_type'] == "Retailer"){
            $retailers = $this->db->get_where('retaileruser', array('phoneNumber' => $data['phoneNumber']))->result_array();
            foreach($retailers as $retailer):
                $id =  $retailer['id'];
            endforeach;
        }

            $phone_input = $data['phoneNumber'];
            if(strlen($phone_input)==10){
                $phone = "+25".$phone_input;
            }elseif(strlen($phone_input)==9){
                $phone = "+250".$phone_input;
            }else{
            
            $phone = $phone_input;
            }
            $message2 = "Dear ".$data['name']."!"."\r\n"."Thank you for Joining Moyata eCommerce Service, your new verification code is: ".$data['verificationCode']."\r\n"."\r\n"."Moyata";
        
        
             $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.mista.io/sms",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => false,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'MOYATA','sms' => $message2,'unicode' => '1'),
              CURLOPT_HTTPHEADER => array(
                "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
              ),
            ));
            $response = curl_exec($curl);

            curl_close($curl);
            $this->session->set_userdata('verCode', $data['verificationCode']);
            if($var['login_type'] == "Auctioneer"){
                $this->db->where('id', $id);
                $this->db->update('wholesaleuser', $data);
                
            }elseif($var['login_type'] == "Retailer"){
                $this->db->where('id', $id);
                $this->db->update('retaileruser', $data);
            }
            echo "<script>alert('New Verification Code Sent, Please proceed to verify identity');
            window.location.href='verification';</script>";
        
    }

    function auction(){
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phoneNumber');
        $data['bid'] = $this->input->post('bid');
        $data['productid'] = $this->input->post('productid');
        $data['productname'] = $this->input->post('productname');
        $data['bussinessname'] = $this->input->post('bussinessname');
        $data1['name'] = $this->input->post('name');
        $data1['message'] = "Your bid to purchase " .$data['productname']. " for " .$data['bid']. " has been made successfuly. You will be notified via email if this bid has been accepted by the seller. Thank you";
        // echo $data1['message'];
        $from_email = "ahmad@vonsung.co.rw";
        $to_email   = $this->input->post('email'); //.",s.maisiba@alustudent.com"; //info@vonsung.co.rw";
            
        
        $this->load->library('email');
        $this->load->helper('form');
        
        
        $config['useragent'] = 'CodeIgniter';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.vonsung.co.rw';
        $config['smtp_user'] = 'ahmad@vonsung.co.rw';
        $config['smtp_pass'] = 'vonsung@vonsung';
        $config['smtp_port'] = 587;
            
        $config['smtp_timeout'] = 5;
        $config['wordwrap'] = true;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = false;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['bcc_batch_mode'] = false;
        $config['bcc_batch_size'] = 200;
        
        $this->email->initialize($config);
            
        $this->email->set_mailtype("html");
        // $this->load->library('encrypt');
        $this->load->library('encryption');
            
        // $this->email->attach('https://vonsung.co.rw/attachement/Advanced_Excel_and_KoBo_Training_Manual.pdf');  //attachement
        $this->email->from($from_email, 'Sandrah e-Commerce');
        $this->email->to($to_email);
        $this->email->subject('Bid Successfully Sent');
        
        $body = $this->load->view('email_inquiry.php', $data1, true);
        $this->email->message($body);
        $this->email->send();
        echo $this->email->print_debugger();
        $this->db->insert('bids', $data);
        $data['date'] = date('Y-m-d');
        echo "<script>alert('Your bid to purchase " .$data['productname']. " for " .$data['bid']. " has been made successfuly. You will be notified via email if this bid has been accepted by the seller. Thank you');
            window.location.href='index';</script>";
        // echo $body;
        // print_r($data);
    }

    function register(){
        if($this->input->post('password')!=$this->input->post('confirmpassword')){
            echo "<script>alert('Passwords Do Not Match, Please Try Again.');
            window.location.href='index';</script>";
        }
        
        $data['name'] = $this->input->post('name');
        $phoneNumber = $this->input->post('phoneNumber');
        $credential = array('phoneNumber' => $phoneNumber);
        $query = $this->db->get_where('retaileruser', $credential);
        $query1 = $this->db->get_where('wholesaleuser', $credential);
        if ($query->num_rows() > 0) {
            echo "<script>alert('Another user exists using the phone number, Please change phone number and try again.');
            window.location.href='index';</script>";
            $this->stopexecution();
        }elseif($query1->num_rows() > 0) {
            echo "<script>alert('Another user exists using the phone number, Please change phone number and try again.');
            window.location.href='index';</script>";
            $this->stopexecution();
        }else{
            $data['phoneNumber'] = $phoneNumber;
        }
        $data['email'] = $this->input->post('email');
        $bussinessName = $this->input->post('bussinessName');
        $credential1 = array('bussinessName' => $bussinessName);
        $query2 = $this->db->get_where('retaileruser', $credential1);
        $query3 = $this->db->get_where('wholesaleuser', $credential1);
        if ($query2->num_rows() > 0) {
            echo "<script>alert('Another user exists using the Bussiness Name, Please change phone number and try again.');
            window.location.href='index';</script>";
            $this->stopexecution();
        }elseif($query3->num_rows() > 0) {
            echo "<script>alert('Another user exists using the Bussiness Name, Please change phone number and try again.');
            window.location.href='index';</script>";
            $this->stopexecution();
        }else{
            $data['bussinessName'] = $bussinessName;
        }
        $data['password'] = sha1($this->input->post('password'));
        $data['securityAnswer'] = sha1($this->input->post('securityAnswer'));
        $data['verificationCode'] = rand(100, 999)."".date("md");
        $data['date'] = date('Y-m-d');
        $securityQuestion = $this->input->post('securityQuestion');
        if($securityQuestion == 1){
            $data['securityQuestion'] = "What primary school did you attend?";
        }elseif($securityQuestion == 2){
            $data['securityQuestion'] = "In what town or city was your first full time job?";
        }elseif($securityQuestion == 3){
            $data['securityQuestion'] = "What were the last four digits of your childhood telephone number?";
        }
        $accountType = $this->input->post('accountType');
        if($accountType == 1){
            $this->db->insert('wholesaleuser', $data);
            $id = $this->db->insert_id();
            $this->session->set_userdata('Auctioneer_id', $id);
            redirect(base_url() . 'Auctioneer/Auctioneer_dashboard', 'refresh');
        } elseif ($accountType == 2) {
            $this->db->insert('retaileruser', $data);
            $phone_input = $data['phoneNumber'];
            if(strlen($phone_input)==10){
                $phone = "+25".$phone_input;
            }elseif(strlen($phone_input)==9){
                $phone = "+250".$phone_input;
            }else{
            
            $phone = $phone_input;
            }
        $message2 = "Dear ".$data['name']."!"."\r\n"."Thank you for Joining Moyata eCommerce Service, your verification code is: ".$data['verificationCode']."\r\n"."\r\n"."Moyata";
        
        
             $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.mista.io/sms",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => false,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'MOYATA','sms' => $message2,'unicode' => '1'),
              CURLOPT_HTTPHEADER => array(
                "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
              ),
            ));
            $response = curl_exec($curl);
            $this->session->set_userdata('retailer_phonenumber', $data['phoneNumber']);
            $this->session->set_userdata('login_type', "Retailer");
            $this->session->set_userdata('name', $data['bussinessName']);
            $this->load->view('user/verification');
            curl_close($curl);
        }
    }
}

?>