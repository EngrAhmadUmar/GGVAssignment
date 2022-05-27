<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Retailer extends CI_Controller
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
            redirect(base_url() . 'Retailer/retailer_dashboard?', 'refresh');
    }

    function retailer_dashboard(){
        // if ($this->session->userdata('Auctioneer_login') != 0)
        //     redirect(base_url() . 'login', 'refresh');
        
        $this->load->view('retailer/index');
            // echo $this->session->userdata('email');
            // echo $this->session->userdata('login_type');

        // $data['title']  = "Admin Dashboard";
        // $this->load->view('admin/navigation', $data);
        
        // $this->load->view('admin/footer');
    }

    function profile(){
        $this->load->view('retailer/profile');
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

        // echo $productprice;
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
        $this->load->view('retailer/index');

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

        $this->load->view('retailer/retry_payment', $data);
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
                    window.location.href='".base_url()."retailer/index';</script>";
            }
        }elseif($data['status'] == 'successful'){
            $chrRepeatMin = 1; // Minimum times to repeat the seed string
            $chrRepeatMax = 10; // Maximum times to repeat the seed string
            $chrRandomLength = 30;
            $data['transaction_id'] =  substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))), 1, $chrRandomLength).date('mdyhis'); 
            if($this->db->update('sales', $data)){
                $this->cart->destroy();
                echo "<script>alert('Your transaction has been ".$data['status']."');
                    window.location.href='".base_url()."retailer/index';</script>";
            }
        }
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
        $this->load->view('retailer/sales');
    }

    function ticketsend(){ 
        $data['subject'] = $this->input->post('subject');
        $data['explanation'] = $this->input->post('explanation');
        $var = $this->session->userdata;
        $data['accountName'] = $var['name'];
        $data['userType'] = $var['login_type'];
        $this->db->insert('ticket', $data); 
        echo '<script>alert("Successfully Submited Ticket, You will be served as soon as possible")</script>';
        $this->load->view('retailer/ticket');
        // redirect(base_url().'Auctioneer/ticket, 'refresh');

    }

    function updatequantity(){
        if($this->input->post('qty') != NULL){
            $data = array(
                'rowid' => $this->input->post('rowid'),
                'qty'   => $this->input->post('qty'),
                );
        $this->cart->update($data);  
        $this->load->view('retailer/cart');
        }else{
            $this->load->view('retailer/cart');
        }
        
    }

    function deletecart($param4=""){
        $data = array(
                    'rowid' => $param4,
                    'qty'   => 0,
                    );
        $this->cart->update($data);  
        $this->load->view('retailer/cart');
    }

    function news($param2 = ""){
        $data['news_id'] = $param2;
        $this->load->view('retailer/news', $data);
    }

    function shop($param1 = ""){
        $data['product_id'] = $param1;
        $this->load->view('retailer/userview', $data);
    }


    function cart(){
        $this->load->view('retailer/cart');
    }

    function viewprofile(){
        $this->load->view('retailer/viewprofile');
    }
    
    function addproduct(){
        $this->load->view('retailer/addproducts');
    }

    function viewproduct(){
        $this->load->view('retailer/viewproducts');
    }

    function manageproduct(){
        $this->load->view('retailer/manageproducts');
    }

    function ticket(){
        $this->load->view('retailer/ticket');
    }

    function sales(){
        $this->load->view('retailer/sales');
    }

    function orders(){
        $this->load->view('retailer/orders');
    }

    function categories($param6 = ""){
        $key = $param6;
        $credential = array('categories' => $param6);
        $query = $this->db->get_where('products', $credential);
        // $this->db->limit(20);
        // $query = $this->db->get('products');
        $data['category'] = $param6;
        $data['results'] = $query->result();
        $this->load->view('retailer/categories', $data);
    }

    function addproductFunction(){ 
        $data['name'] = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        $data['tag_line'] = $this->input->post('tag_line');
        $data['price'] = $this->input->post('price');
        $data['categories'] = $this->input->post('categories');
        $data['date'] = date('Y-m-d');
        $data['minorder'] = $this->input->post('minorder');
        $data['availablestock'] = $this->input->post('availablestock');
        $data['discount'] = $this->input->post('discount');
        $data['salesprice'] = $this->input->post('salesprice');
        $data['discountstart'] = $this->input->post('discountstart');
        $data['discountend'] = $this->input->post('discountend');
        $data['sellername'] = $this->input->post('sellername');
        $data['bussinessAddr'] = $this->input->post('bussinessAddr');
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
        echo '<script>alert("Successfully Added Product, Your store will be updated as soon as possible")</script>';
        $this->load->view('retailer/addproducts');
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
            'allowed_types' => "jpg|png|jpeg",  //this is the acceptable file type
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
            'allowed_types' => "jpg|png|jpeg",  //this is the acceptable file type
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
                elseif($img1 == ".jpg"){
                    $data['image1'] = $config1['file_name'].".jpg";}
                elseif($img1 == "jpeg"){
                    $data['image1'] = $config1['file_name'].".jpeg";}
            }}
        if($_FILES['image2']['name'] != ""){
        $config2 = array(
            'imagename2' => "2",
            'upload_path' => "./uploads/products/", //This is the directory where the file will be uploaded to
            'allowed_types' => "jpg|png|jpeg",  //this is the acceptable file type
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
        echo '<script>alert("Successfully Edited Product, Your store will be updated as soon as possible")</script>';
        $this->load->view('retailer/manageproducts');
    }

    function editProduct($param5=""){
        $data['product_id'] = $param5;
        $this->load->view('retailer/editproduct', $data);
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
        redirect(base_url().'retailer/shop/'.$param4, 'refresh');
        // print_r($data);
    }

    function changepassword(){
        $this->load->view('retailer/changepassword');
    }

    function changepasswordFunction(){
        $oldpassword = sha1($this->input->post('oldpassword'));
        $newpassword = sha1($this->input->post('newpassword'));
        $confirmpassword = sha1($this->input->post('confirmpassword'));
        $var = $this->session->userdata;
        $phoneNumber = $var['phoneNumber'];
        $credential = array('phoneNumber' => $phoneNumber, 'password' => $oldpassword);
        $query = $this->db->get_where('retaileruser', $credential);
        if($query->num_rows() > 0) {
            if($newpassword == $confirmpassword){
                $data['password'] = $newpassword;
                $this->db->where('phoneNumber', $phoneNumber);
                $this->db->update('retaileruser', $data);
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

    function searchresults(){
        $this->load->view('retailer/searchresults');
    }

  public function searchbar(){
        $key = $this->input->post('search');
        $this->db->like('name', $key);
        $this->db->limit(20);
        $query = $this->db->get('products');
        if($data['results'] = $query->result()){
        $this->load->view('retailer/searchresults', $data);
    }else{
        echo "<script>alert('No product matches your keyword, Please Try Again With Another Keyword.');
            window.location.href='index';</script>";
    }
    }

    function editaccount(){
        $id = $this->input->post('id');
        if($this->input->post('bussinessUrl') != ""){
            $data['bussinessUrl'] = $this->input->post('bussinessUrl');
        }
        if($this->input->post('bussinessDesc') != ""){
            $data['bussinessDesc'] = $this->input->post('bussinessDesc');
        }
        if($this->input->post('bussinessaddr1') != ""){
            $data['bussinessaddr1'] = $this->input->post('bussinessaddr1');
            $this->session->set_userdata('addr', $data['bussinessaddr1']);
        }
        if($this->input->post('bussinessaddr2') != ""){
            $data['bussinessaddr2'] = $this->input->post('bussinessaddr2');
        }
        if($this->input->post('city') != ""){
            $data['city'] = $this->input->post('city');
        }
        if($this->input->post('state') != ""){
            $data['state'] = $this->input->post('state');
        }
        if($this->input->post('zipCode') != ""){
            $data['zipCode'] = $this->input->post('zipCode');
        }
        if($this->input->post('phoneNumber') != ""){
            $data['phoneNumber'] = $this->input->post('phoneNumber');
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
        $this->db->update('retaileruser', $data);
        $this->load->view('retailer/viewprofile');
    }

    public function deleteProduct($ID) {   
        $this->load->model("model_admin");
        $this->model_admin->did_delete_row($ID);
    }

}
?>