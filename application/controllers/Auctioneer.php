<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auctioneer extends CI_Controller
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
        if ($this->session->userdata('Auctioneer_login') != 0)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('admin_login') == 0)
            redirect(base_url() . 'Auctioneer/Auctioneer_dashboard', 'refresh');
    }

    
    function rejectBid($param1=" "){
        $id = $param1;
        $data['status'] = 2;
        $this->db->where('id', $id);
        $this->db->update('bids', $data);
        $product = $this->db->get_where('bids', array('id' => $id))->result_array();
        foreach($product as $row):
            $data1['name'] =  $row['name'];
            $data1['email'] =$row['email'];
            $data['productname'] =  $row['productname'];
            $data['bid'] =$row['bid'];
        endforeach;
        $data1['message'] = "Your bid to purchase " .$data['productname']. " for " .$data['bid']. " has been rejected. You can decide to re-bid for this product with a higher price for a chance to get your bid accepted. Thank you";
        // echo $data1['message'];
        $from_email = "ahmad@vonsung.co.rw";
        $to_email   = $data1['email']; //.",s.maisiba@alustudent.com"; //info@vonsung.co.rw";
            
        
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
        // echo $this->email->print_debugger();
        
        // print_r($data);
        echo "<script>alert('Bid Rejected Successfully');
          window.location.href='".base_url()."Auctioneer/sales';</script>";
      }

    function acceptBid($param1=" "){
        $id = $param1;
        $product = $this->db->get_where('bids', array('id' => $id))->result_array();
        foreach($product as $row):
            $prodId =  $row['productid'];
        endforeach;
        // echo $prodId;
        $product = $this->db->get_where('bids', array('productid' => $prodId))->result_array();
        foreach($product as $row):
            $data2['status'] = 2;
            $this->db->where('id', $row['id']);
            $this->db->update('bids', $data2);
        endforeach;

        // 
        $data['status'] = 1;
        $this->db->where('id', $id);
        $this->db->update('bids', $data);
        $product = $this->db->get_where('bids', array('id' => $id))->result_array();
        foreach($product as $row):
            $data1['name'] =  $row['name'];
            $data1['email'] =$row['email'];
            $data['productname'] =  $row['productname'];
            $data['bid'] =$row['bid'];
        endforeach;
        $data1['message'] = "Your bid to purchase " .$data['productname']. " for " .$data['bid']. " has been accepted. You will recieve further directives from the seller on how to get your package. Thank you";
        // echo $data1['message'];
        $from_email = "ahmad@vonsung.co.rw";
        $to_email   = $data1['email']; //.",s.maisiba@alustudent.com"; //info@vonsung.co.rw";
            
        
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
        // echo $this->email->print_debugger();
        
        // print_r($data);
        echo "<script>alert('Bid Accepted Successfully');
          window.location.href='".base_url()."Auctioneer/sales';</script>";
      }

    function shop($param1 = ""){
        $data['product_id'] = $param1;
        $this->load->view('wholesale/userview', $data);
    }


    function Auctioneer_dashboard(){
        // if ($this->session->userdata('Auctioneer_login') != 0)
        //     redirect(base_url() . 'login', 'refresh');
        $this->load->view('wholesale/profile');
            // echo $this->session->userdata('email');
            // echo $this->session->userdata('login_type');

        // $data['title']  = "Admin Dashboard";
        // $this->load->view('admin/navigation', $data);
        
        // $this->load->view('admin/footer');
    }

    function addtocart($param2 = ""){
        $product_id = $param2;
        $product = $this->db->get_where('products', array('id' => $product_id))->result_array();
            foreach($product as $row):
            $productprice =  $row['price'];
            $productname =$row['name'];
            $image = $row['image'];
            $addr = $row['bussinessAddr'];
            $sellername = $row['sellername'];
            $discountend = $row['discountend'];
            $discountstart = $row['discountstart'];
            $salesprice = $row['salesprice'];

            endforeach;

        $curDateTime = date('Y-m-d');
        if ($curDateTime >= $discountstart and $curDateTime <= $discountend){
            $productprice =  $salesprice;
        }else{
            $productprice =  $productprice;
        }
        $data = array(
            'id'      => $param2,
            'qty'     => 1,
            'addr'    => $addr,
            'price'   => $productprice,
            'name'    => $productname,
            'image'  => $image,       
            'sellername' => $sellername,
            );
        $this->cart->insert($data);
        $cartdata = $this->cart->contents();
        $this->load->view('wholesale/index');
    }

    function updatequantity(){
        if($this->input->post('qty') != NULL){
            $data = array(
                'rowid' => $this->input->post('rowid'),
                'qty'   => $this->input->post('qty'),
                );
        $this->cart->update($data);  
        $this->load->view('wholesale/cart');
        }else{
            $this->load->view('wholesale/cart');
        }
        
    }

    function deletecart($param4=""){
        $data = array(
                    'rowid' => $param4,
                    'qty'   => 0,
                    );
        $this->cart->update($data);  
        $this->load->view('wholesale/cart');
    }

    function profile(){
        $this->load->view('wholesale/profile');
    }

    function rateproduct($param4= ""){ 
        $id = $this->input->post('productid');
        $data['rateIndex'] = $this->input->post('rateIndex');
        $data['productid'] = $this->input->post('productid');
        $data['sellername'] = $this->input->post('sellername');
        $data['review'] = $this->input->post('review');
        $data['date'] = date('Y-m-d');
        $var = $this->session->userdata;
        $data['email'] = $var['email'];
        $this->db->insert('rating', $data); 
        // $this->load->view('wholesale/shop/');
        redirect(base_url().'Auctioneer/shop/'.$param4, 'refresh');
        // print_r($data);
    }
    
    function checkout(){ 
        $data['destination'] = $this->input->post('destination');
        $data['totalprice'] = $this->input->post('total');
        $data['buyercontact'] = $this->input->post('buyerphone');
        $data['date'] = date('Y-m-d');
        $data['buyername'] = $this->input->post('buyername');
        $var = $this->session->userdata;
        $data['email'] = $var['email'];
        $data['accounttype'] = $var['login_type'];
        $chrList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chrRepeatMin = 1; // Minimum times to repeat the seed string
        $chrRepeatMax = 10; // Maximum times to repeat the seed string
        $chrRandomLength = 30;
        $data['transaction_id'] =  substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))), 1, $chrRandomLength).date('mdyhis');
        foreach ($this->cart->contents() as $items):
            $products = $items['name'];
            $sellername = $items['sellername'];
            $qty = $items['qty'];
            $price = $items['price'];
            $data['products'] = $products;
            $data['sellername'] = $sellername;
            $data['price'] = $price;
            $data['unit'] = $qty;
            $data['subprice'] = $qty*$price;
            $this->db->insert('sales', $data);
        endforeach;

        $this->load->view('wholesale/payment', $data);
    }

    function retrypayment($idsales=""){ 

        // $credential = array('categories' => $idsales);
        // $query = $this->db->get_where('sales', $credential);
        // $this->db->limit(20);
        // $query = $this->db->get('products');
        $ids = $this->db->get_where('sales', array('id' => $idsales))->result_array();
        foreach($ids as $id):
            $data['id'] = $id['id'];
            $data['transaction_id'] = $id['transaction_id'];
            $data['totalprice'] = $id['subprice'];
            $data['email'] = $id['email'];
            $data['buyercontact'] = $id['buyercontact'];
            $data['buyername'] = $id['buyername'];
        endforeach;

        // print_r($data);

        $this->load->view('wholesale/retry_payment', $data);
    }

    function retry_checkout_status($param8=""){

        $da = $param8;
         
        // echo $da;

        $data['status'] = $_GET['status'];
        $ids = $this->db->get_where('sales', array('id' => $da))->result_array();
        foreach($ids as $id):
            $data['totalprice'] = $id['subprice'];
        endforeach;

        // print_r($data);

        $this->db->where('id', $da);
        if($data['status'] == 'failed'){
            if($this->db->update('sales', $data)){
                echo "<script>alert('Your transaction has ".$data['status'].", please try again later');
                    window.location.href='".base_url()."Auctioneer/index';</script>";
            }
        }elseif($data['status'] == 'successful'){
            $chrRepeatMin = 1; // Minimum times to repeat the seed string
            $chrRepeatMax = 10; // Maximum times to repeat the seed string
            $chrRandomLength = 30;
            $data['transaction_id'] =  substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))), 1, $chrRandomLength).date('mdyhis'); 
            if($this->db->update('sales', $data)){
                $this->cart->destroy();
                echo "<script>alert('Your transaction has been ".$data['status']."');
                    window.location.href='".base_url()."Auctioneer/index';</script>";
            }
        }
    }




    function checkout_status($transaction_id = ""){
        $data['status'] = $_GET['status'];
        $this->db->where('transaction_id', $transaction_id);
        if($data['status'] == 'failed'){
            if($this->db->update('sales', $data)){
                echo "<script>alert('Your transaction has ".$data['status'].", please try again later');
                    window.location.href='".base_url()."user/index';</script>";
            }
        }elseif($data['status'] == 'successfull'){
            if($this->db->update('sales', $data)){
                $this->cart->destroy();
                echo "<script>alert('Your transaction has been ".$data['status']."');
                    window.location.href='".base_url()."user/index';</script>";
            }
        }
    }

    function cart(){
        $this->load->view('wholesale/cart');
    }

    function news($param2 = ""){
        $data['news_id'] = $param2;
        $this->load->view('wholesale/news', $data);
    }

    function viewprofile(){

        $this->load->view('wholesale/viewprofile');
    }
    
    function addproduct(){
        $this->load->view('wholesale/addproducts');
    }

    function orderstatus(){
        $id = $this->input->post('productid');
        $date = date('d/m/Y  h:i:s:a');
        $order = $this->input->post('order_status');
        
        $data['deliverystatus'] = $order." on ".$date;

        $ids = $this->db->get_where('sales', array('id' => $id))->result_array();
        foreach($ids as $idf):
            $setstatus = $idf['deliverystatus'];
        endforeach;
        
        $data['deliverystatus'] = $data['deliverystatus'].", ".$setstatus;
        
        if($order == "Pending"){
            $this->db->where('id', $id);
            $this->db->update('sales', $data); 
        }elseif($order == "Accepted"){
            $this->db->where('id', $id);
            $this->db->update('sales', $data); 
        }elseif($order== "Processing"){
            $this->db->where('id', $id);
            $this->db->update('sales', $data); 
        }elseif($order == "Dispached"){
            $this->db->where('id', $id);
            $this->db->update('sales', $data); 
        }
        echo '<script>alert("Order Status Successfully Updated.")</script>';
        $this->load->view('wholesale/sales');
    }

    function viewproduct(){
        $this->load->view('wholesale/viewproducts');
    }

    function manageproduct(){
        $this->load->view('wholesale/manageproducts');
    }

    function ticket(){
        $this->load->view('wholesale/ticket');
    }

    function sales(){
        $this->load->view('wholesale/sales');
    }

    function orders(){
        $this->load->view('wholesale/orders');
    }

    function editproductFunction(){
        $id = $this->input->post('id');
        $curimage = $this->db->get_where('products', array('ID' => $id))->row()->image;
        if($curimage == ""){
            $curimage = $this->input->post('image')."".date('dmy_his');
        }else{
            $trim = $_FILES['image']['name'];
            $trim = substr($trim, -4);
            if($trim == ".png"){
                $curimage = substr($curimage, 0, -4);}
            elseif($trim == ".jpg"){
                $curimage = substr($curimage, 0, -4);}
            elseif($trim == "jpeg"){
                $curimage = substr($curimage, 0, -5);}
        }
        $curimage1 = $this->db->get_where('products', array('ID' => $id))->row()->image1;
        if($curimage1 == ""){
            $curimage1 = $this->input->post('image1')."".date('dmy_his');
        }else{
            $trim1 = $_FILES['image1']['name'];
            $trim1 = substr($trim1, -4);
            if($trim1 == ".png"){
                $curimage1 = substr($curimage1, 0, -4);}           
            elseif($trim1 == ".jpg"){
                $curimage1 = substr($curimage1, 0, -4);}
            elseif($trim1 == "jpeg"){
                $curimage1 = substr($curimage1, 0, -5);}
        }
        $curimage2 = $this->db->get_where('products', array('ID' => $id))->row()->image2;
        if($curimage2 == ""){
            $curimage2 = $this->input->post('image2')."".date('dmy_his');
        }else{
            $trim2 = $_FILES['image2']['name'];
            $trim2 = substr($trim2, -4);
            if($trim2 == ".png"){
                $curimage2 = substr($curimage2, 0, -4);}          
            elseif($trim2 == ".jpg"){
                $curimage2 = substr($curimage2, 0, -4);}
            elseif($trim2 == "jpeg"){
                $curimage2 = substr($curimage2, 0, -5);}
        }
        $curimage3 = $this->db->get_where('products', array('ID' => $id))->row()->image3;
        if($curimage3 == ""){
            $curimage3 = $this->input->post('image3')."".date('dmy_his');
        }else{
            $trim3 = $_FILES['image3']['name'];
            $trim3 = substr($trim3, -4);
            if($trim3 == ".png"){
                $curimage3 = substr($curimage3, 0, -4);}      
            elseif($trim3 == ".jpg"){
                $curimage3 = substr($curimage3, 0, -4);}
            elseif($trim3 == "jpeg"){
                $curimage3 = substr($curimage3, 0, -5);}
        }

        if($this->input->post('name') != ""){
        $data['name'] = $this->input->post('name');
        }
        if($this->input->post('description') != ""){
        $data['description'] = $this->input->post('description');}
        if($this->input->post('tag_line') != ""){
        $data['tag_line'] = $this->input->post('tag_line');}
        if($this->input->post('price') != ""){
        $data['price'] = $this->input->post('price');}
        if($this->input->post('categories') != "Category Of Product"){
        $data['categories'] = $this->input->post('categories');}
        $data['date'] = date('Y-m-d');
        if($this->input->post('minorder') != ""){
        $data['minorder'] = $this->input->post('minorder');}
        if($this->input->post('availablestock') != ""){
        $data['availablestock'] = $this->input->post('availablestock');}
        if($this->input->post('discount') != ""){
        $data['discount'] = $this->input->post('discount');}
        if($this->input->post('salesprice') != ""){
        $data['salesprice'] = $this->input->post('salesprice');}
        if($this->input->post('location') != ""){
            $data['location'] = $this->input->post('location');}
        if($this->input->post('discountstart') != ""){
        $data['discountstart'] = $this->input->post('discountstart');}
        if($this->input->post('discountend') != ""){
        $data['discountend'] = $this->input->post('discountend');}
        if($this->input->post('sellername') != ""){
        $data['sellername'] = $this->input->post('sellername');}
        if($this->input->post('bussinessAddr') != ""){
        $data['bussinessAddr'] = $this->input->post('bussinessAddr');}
        if($this->input->post('type') != ""){
        $data['type'] = $this->input->post('type');}
        if($this->input->post('color') != ""){
        $data['color'] = $this->input->post('color');}
        if($_FILES['image']['name'] != ""){
        $config = array(
            'imagename' => "0",
            'upload_path' => "./uploads/products/", //This is the directory where the file will be uploaded to
            'allowed_types' => "jpg|png",  //this is the acceptable file type
            'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
            'remove_spaces' => TRUE, //removing space in the name of uploaded file
            'file_name' => $curimage, //The name of the file
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );

            $this->load->library('upload', $config);  //initializing the "upload" library
            $this->upload->initialize($config);   // loading the array for uploading the file
            if($this->upload->do_upload('image')){
                $img = $_FILES['image']['name'];
                $img = substr($img, -4);
                if($img == ".png"){
                $data['image'] = $config['file_name'].".png";}
                elseif($img == ".jpg"){
                    $data['image'] = $config['file_name'].".jpg";}
                elseif($img == "jpeg"){
                    $data['image'] = $config['file_name'].".jpeg";}
            } }
        if($_FILES['image1']['name'] != ""){
        $config1 = array(
            'imagename1' => "1",
            'upload_path' => "./uploads/products/", //This is the directory where the file will be uploaded to
            'allowed_types' => "jpg|png",  //this is the acceptable file type
            'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
            'remove_spaces' => TRUE, //removing space in the name of uploaded file
            'file_name' => $curimage1, //The name of the file
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );

            $this->load->library('upload', $config1);  //initializing the "upload" library
            $this->upload->initialize($config1);   // loading the array for uploading the file
            if($this->upload->do_upload('image1')){
                $img1 = $_FILES['image1']['name'];
                $img1 = substr($img1, -4);
                if($img1 == ".png"){
                    $data['image1'] = $config1['file_name'].".png";}
                elseif($img == ".jpg"){
                    $data['image1'] = $config1['file_name'].".jpg";}
                elseif($img == "jpeg"){
                    $data['image1'] = $config1['file_name'].".jpeg";}
            }}
        if($_FILES['image2']['name'] != ""){
        $config2 = array(
            'imagename2' => "2",
            'upload_path' => "./uploads/products/", //This is the directory where the file will be uploaded to
            'allowed_types' => "jpg|png",  //this is the acceptable file type
            'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
            'remove_spaces' => TRUE, //removing space in the name of uploaded file
            'file_name' => $curimage2, //The name of the file
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );

            $this->load->library('upload', $config2);  //initializing the "upload" library
            $this->upload->initialize($config2);   // loading the array for uploading the file
            if($this->upload->do_upload('image2')){
                $img2 = $_FILES['image2']['name'];
                $img2 = substr($img2, -4);
                if($img2 == ".png"){
                $data['image2'] = $config2['file_name'].".png";}
                elseif($img2 == ".jpg"){
                    $data['image2'] = $config2['file_name'].".jpg";}
                elseif($img2 == "jpeg"){
                    $data['image2'] = $config2['file_name'].".jpeg";}
            }
        // $image2 = "2".date('dmy_is');
        // if(move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/products/' . $image2 . '.jpg')){
        //     $data['image2'] = $image2.".jpg";
        // }
        }
        if($_FILES['image3']['name'] != ""){
        $config3 = array(
            'imagename3' => "3",
            'upload_path' => "./uploads/products/", //This is the directory where the file will be uploaded to
            'allowed_types' => "jpg|png|jpeg|gif",  //this is the acceptable file type
            'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
            'remove_spaces' => TRUE, //removing space in the name of uploaded file
            'file_name' => $curimage3, //The name of the file
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );

            $this->load->library('upload', $config3);  //initializing the "upload" library
            $this->upload->initialize($config3);   // loading the array for uploading the file
            if($this->upload->do_upload('image3')){
                $img3 = $_FILES['image3']['name'];
                $img3 = substr($img3, -4);
                if($img3 == ".png"){
                $data['image3'] = $config3['file_name'].".png";}
                elseif($img3 == ".jpg"){
                    $data['image3'] = $config3['file_name'].".jpg";}
                elseif($img3 == "jpeg"){
                    $data['image3'] = $config3['file_name'].".jpeg";}
            }}
        
        $this->db->where('ID', $id);
        $this->db->update('products', $data); 
        echo '<script>alert("Successfully Edited Product, The website will be updated as soon as possible")</script>';
        $this->load->view('wholesale/manageproducts');
    }

    function editProduct($param5=""){
        $data['product_id'] = $param5;
        $this->load->view('wholesale/editproduct', $data);
    }

    function editaccount(){
        $id = $this->input->post('id');
        // if($this->input->post('bussinessUrl') != ""){
        //     $data['bussinessUrl'] = $this->input->post('bussinessUrl');
        // }
        // if($this->input->post('bussinessDesc') != ""){
        //     $data['bussinessDesc'] = $this->input->post('bussinessDesc');
        // }
        if($this->input->post('bussinessaddr1') != ""){
            $data['bussinessaddr1'] = $this->input->post('bussinessaddr1');
            $this->session->set_userdata('addr', $data['bussinessaddr1']);
        }
        if($this->input->post('name') != ""){
            $data['name'] = $this->input->post('name');
        }
        // if($this->input->post('city') != ""){
        //     $data['city'] = $this->input->post('city');
        // }
        // if($this->input->post('state') != ""){
        //     $data['state'] = $this->input->post('state');
        // }
        if($this->input->post('email') != ""){
            $data['email'] = $this->input->post('email');
        }
        if($this->input->post('phoneNumber') != ""){
            $data['phoneNumber'] = $this->input->post('phoneNumber');
        }
        if($this->input->post('facebook') != ""){
            $data['facebook'] = $this->input->post('facebook');
        }
        if($this->input->post('instagram') != ""){
            $data['instagram'] = $this->input->post('instagram');
        }
        if($this->input->post('twitter') != ""){
            $data['twitter'] = $this->input->post('twitter');
        }
        if($this->input->post('whatsapp') != ""){
            $data['whatsapp'] = $this->input->post('whatsapp');
        }
        $this->db->where('id', $id);
        $this->db->update('wholesaleuser', $data);
        echo '<script>alert("Successfully updated profile.")</script>';
        $this->load->view('wholesale/viewprofile');
    }

    function searchresults(){
        $this->load->view('Auctioneer/searchresults');
    }

    function changepassword(){
        $this->load->view('wholesale/changepassword');
    }

    function changepasswordFunction(){
        $oldpassword = sha1($this->input->post('oldpassword'));
        $newpassword = sha1($this->input->post('newpassword'));
        $confirmpassword = sha1($this->input->post('confirmpassword'));
        $var = $this->session->userdata;
        $phoneNumber = $var['phoneNumber'];
        $credential = array('phoneNumber' => $phoneNumber, 'password' => $oldpassword);
        $query = $this->db->get_where('wholesaleuser', $credential);
        if($query->num_rows() > 0) {
            if($newpassword == $confirmpassword){
                $data['password'] = $newpassword;
                $this->db->where('phoneNumber', $phoneNumber);
                $this->db->update('wholesaleuser', $data);
                echo "<script>alert('You Account Password Has Successfully Been Changed, You May Proceed And Use Your New Password Henceforth.');
                window.location.href='changepassword';</script>";
            }else{
                echo "<script>alert('New password and confirm password do not match, Please Try Again.');
                window.location.href='changepassword';</script>";
            }
            }else{
                echo "<script>alert('Old Password Incorrect, Please Cross Check Input And Try Again.');
                window.location.href='changepassword';</script>";
            }
    }

    public function logout(){
        $this->session->sess_destroy();
        echo "<script>alert('Successfully Logged Out, You are welcome back anytime.');</script>";
        $this->load->view('user/index');
    }

    function categories($param6 = ""){
        $key = $param6;
        $credential = array('categories' => $param6);
        $query = $this->db->get_where('products', $credential);
        // $this->db->limit(20);
        // $query = $this->db->get('products');
        $ids = $this->db->get_where('categories', array('id' => $key))->result_array();
        foreach($ids as $id):
            $data['category'] = $id['id'];
        endforeach;
        
        $data['results'] = $query->result();
        $this->load->view('wholesale/categories', $data);
    }

    public function searchbar(){
        $key = $this->input->post('search');
        $this->db->like('name', $key);
        $this->db->limit(20);
        $query = $this->db->get('products');
        if($data['results'] = $query->result()){
        $this->load->view('wholesale/searchresults', $data);
    }else{
        echo "<script>alert('No product matches your keyword, Please Try Again With Another Keyword.');
            window.location.href='index';</script>";
    }
    }

    function ticketsend(){ 
        $data['subject'] = $this->input->post('subject');
        $data['explanation'] = $this->input->post('explanation');
        $var = $this->session->userdata;
        $data['accountName'] = $var['name'];
        // $data['email'] = $var['email'];
        $data['date'] = date('Y-m-d');
        // $data['userType'] = $var['login_type'];
        $this->db->insert('ticket', $data); 
        echo '<script>alert("Successfully Submited Ticket, You will recieve an email soon.")</script>';
        $this->load->view('wholesale/ticket');
        // redirect(base_url().'Auctioneer/ticket, 'refresh');

    }
    function addproductFunction(){ 
        $data['name'] = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        $data['tag_line'] = $this->input->post('tag_line');
        $data['location'] = $this->input->post('location');
        $data['price'] = $this->input->post('price');
        $data['categories'] = $this->input->post('categories');
        $data['date'] = date('Y-m-d');
       
        $data['availablestock'] = $this->input->post('availablestock');
        $data['sellername'] = $this->input->post('sellername');
        $data['type'] = $this->input->post('type');
        $data['color'] = $this->input->post('color');
        $config = array(
            'imagename' => "0",
            'upload_path' => "./uploads/products/", //This is the directory where the file will be uploaded to
            'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
            'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
            'remove_spaces' => TRUE, //removing space in the name of uploaded file
            'file_name' => $this->input->post('imagename')."".date('dmy_his'), //The name of the file
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );

            $this->load->library('upload', $config);  //initializing the "upload" library
            $this->upload->initialize($config);   // loading the array for uploading the file
            if($this->upload->do_upload('image')){
                $img = $_FILES['image']['name'];
                $img = substr($img, -4);
                if($img == ".png"){
                $data['image'] = $config['file_name'].".png";}
                elseif($img == ".jpg"){
                    $data['image'] = $config['file_name'].".jpg";}
                elseif($img == "jpeg"){
                    $data['image'] = $config['file_name'].".jpeg";}
            }
        $config1 = array(
            'imagename1' => "1",
            'upload_path' => "./uploads/products/", //This is the directory where the file will be uploaded to
            'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
            'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
            'remove_spaces' => TRUE, //removing space in the name of uploaded file
            'file_name' => $this->input->post('imagename1')."".date('his'), //The name of the file
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );

            $this->load->library('upload', $config1);  //initializing the "upload" library
            $this->upload->initialize($config1);   // loading the array for uploading the file
            if($this->upload->do_upload('image1')){
                $img1 = $_FILES['image1']['name'];
                $img1 = substr($img1, -4);
                if($img1 == ".png"){
                $data['image1'] = $config1['file_name'].".png";}
                elseif($img1 == ".jpg"){
                    $data['image1'] = $config1['file_name'].".jpg";}
                elseif($img1 == "jpeg"){
                    $data['image1'] = $config1['file_name'].".jpeg";}
            }
        $config2 = array(
            'imagename2' => "2",
            'upload_path' => "./uploads/products/", //This is the directory where the file will be uploaded to
            'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
            'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
            'remove_spaces' => TRUE, //removing space in the name of uploaded file
            'file_name' => $this->input->post('imagename2')."".date('dmy_is'), //The name of the file
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );

            $this->load->library('upload', $config2);  //initializing the "upload" library
            $this->upload->initialize($config2);   // loading the array for uploading the file
            if($this->upload->do_upload('image2')){
                $img2 = $_FILES['image2']['name'];
                $img2 = substr($img2, -4);
                if($img2 == ".png"){
                $data['image2'] = $config2['file_name'].".png";}
                elseif($img2 == ".jpg"){
                    $data['image2'] = $config2['file_name'].".jpg";}
                elseif($img2 == "jpeg"){
                    $data['image2'] = $config2['file_name'].".jpeg";}
            }
        $config3 = array(
            'imagename3' => "3",
            'upload_path' => "./uploads/products/", //This is the directory where the file will be uploaded to
            'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
            'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
            'remove_spaces' => TRUE, //removing space in the name of uploaded file
            'file_name' => $this->input->post('imagename3')."".date('dmy_hs'), //The name of the file
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );

            $this->load->library('upload', $config3);  //initializing the "upload" library
            $this->upload->initialize($config3);   // loading the array for uploading the file
            if($this->upload->do_upload('image3')){
                $img3 = $_FILES['image3']['name'];
                $img3 = substr($img3, -4);
                if($img3 == ".png"){
                $data['image3'] = $config3['file_name'].".png";}
                elseif($img3 == ".jpg"){
                    $data['image3'] = $config3['file_name'].".jpg";}
                elseif($img3 == "jpeg"){
                    $data['image3'] = $config3['file_name'].".jpeg";}
            }
            
        
        $this->db->insert('products', $data); 
        echo '<script>alert("Successfully Added Product, The website will be updated as soon as possible")</script>';
        $this->load->view('wholesale/addproducts');
    }

    public function deleteProduct($ID) {   
        $this->load->model("model_admin");
        $this->model_admin->did_delete_row($ID);
        $this->load->view('wholesale/manageproducts');
    }
}
?>