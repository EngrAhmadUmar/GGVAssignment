<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-90680653-2');
    </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- <link type="text/css" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <!--   <link type="text/css" href="<?php echo base_url();?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url();?>css/theme.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url();?>images/icons/css/font-awesome.css" rel="stylesheet"> -->
    <link type="text/css"
        href='<?php echo base_url();?>http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <link href="<?php echo base_url();?>lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url();?><?php echo base_url();?>lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css"
        rel="stylesheet">
    <link href="<?php echo base_url();?>lib/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/pickerjs/picker.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/azia.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico" type="image/x-icon" />


    <!-- Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="<?php echo base_url();?>styles.css" />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script defer
        src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyBgsPDm7AZ1yabqXRFv5yo2X4i5h_fDjLc"
        type="text/javascript"></script>


    <title>Moyata</title>
</head>


<style>
/* Dropdown Button */
.dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>

<body>

    <!-- Header -->
    <header id="header" class="header">
        <div class="navigation">
            <div class="container">
                <nav class="nav">
                    <div class="nav__hamburger">
                        <img src="https://img.icons8.com/android/24/000000/menu.png" />
                        <!-- <svg>
              <use xlink:href="images/sprite.svg#icon-menu"></use>
            </svg> -->
                    </div>

                    <div class="nav__logo">
                        <a href="<?php echo base_url();?>" class="scroll-link">
                            Moyata eCommerce Website
                        </a>
                    </div>

                    <div class="nav__menu">
                        <div class="menu__top">
                            <span class="nav__category">Moyata</span>
                            <a href="<?php echo base_url().'User/index';?>" class="close__toggle">
                                <img src="https://img.icons8.com/ios-glyphs/30/000000/shop.png" />
                            </a>
                        </div>
                        <ul class="nav__list">
                            <li class="nav__item">
                                <div class="dropdown">
                                    <a class="nav__link scroll-link">CATEGORIES</a>
                                    <div class="dropdown-content">

                                        <?php
                                        $categories = $this->db->get_where('categories')->result_array();
                                        foreach($categories as $category):
                                        $credential = array('categories' => $category['id']);
                                        $query = $this->db->get_where('products', $credential);
                                        if ($query->num_rows() > 0) {
                                        ?>
                                        <a href="<?php echo base_url().'user/categories/'.$category['id'];?>"><?php echo $category['categoryname'];?>
                                        </a>
                                        <?php } endforeach;?>
                                    </div>
                                </div>
                            </li>

                            <li class="nav__item">
                                <a href="#news" class="nav__link scroll-link" data-toggle="modal"
                                    data-target="#loginModal">Log In</a>
                            </li>
                            <li class="nav__item" data-toggle="modal" data-target="#registerModal">
                                <a href="#contact" class="nav__link scroll-link">Register</a>
                            </li>
                        </ul>

                    </div>

                    <div class="nav__icons">

                        <a href="#" class="icon__item" data-toggle="modal" data-target="#searchModal">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>

                    </div>
                </nav>
            </div>
        </div>

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-title text-center">
                            <h4>Login</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form method="POST" action="<?php echo base_url();?>Login/ajax_login">
                                <div class="form-group">
                                    <input required type="phone" name="phoneNumber" class="form-control"
                                        placeholder="Your Phone Number...">
                                </div>
                                <div class="form-group">
                                    <input required type="password" name="password" class="form-control"
                                        placeholder="Your Password...">
                                </div>
                                <button type="submit" name="login"
                                    class="btn btn-info btn-block btn-round">Login</button>
                            </form>


                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <div class="signup-section">Forgot Password? <a
                                href="<?php echo base_url().'user/forgotpassword';?>" class="text-info"> Click Here</a>.
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-title text-center">
                            <h4>Register</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form method="POST" action="<?php echo base_url();?>user/register">
                                <div class="form-group">
                                    <input required type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Full Name...">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="phoneNumber" class="form-control" id="phoneNumber"
                                        placeholder="Your Phone Number...">
                                </div>
                                <div class="form-group">
                                    <input required type="email" name="email" class="form-control" id="Email"
                                        placeholder="Your Email...">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="bussinessName" class="form-control"
                                        id="bussinessName" placeholder="Your Bussiness Name...">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="accountType" id="accountType"
                                        aria-label="Account Type">
                                        <option selected>Select Account Type</option>
                                        <option value="1">Wholesale Account</option>
                                        <option value="2">Retail Account</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input required type="password" name="password" class="form-control" id="password"
                                        placeholder="Your Password...">
                                </div>

                                <div class="form-group">
                                    <input required type="password" name="confirmpassword" class="form-control"
                                        id="confirmpassword" placeholder="Confirm Password...">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="securityQuestion" id="securityQuestion"
                                        aria-label="Security Question">
                                        <option selected>Security Question</option>
                                        <option value="1">What primary school did you attend?</option>
                                        <option value="2">In what town or city was your first full time job?</option>
                                        <option value="3">What were the last four digits of your childhood telephone
                                            number?</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input required type="text" name="securityAnswer" class="form-control"
                                        id="securityAnswer" placeholder="Input answer to security question here...">
                                </div>

                                <button type="submit" name="submit"
                                    class="btn btn-info btn-block btn-round">Register</button>
                            </form>

                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <div class="signup-section">By registering you are accepting our <a
                                href="<?php echo base_url().'user/terms';?>" class="text-info">T&C's </a> and
                            <a href="<?php echo base_url().'user/privacy';?>" class="text-info"> Privacy Policy</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <span class="closebtn" onclick="closeSearch()" title="Close Overlay">x</span>
                    <div class="overlay-content">
                        <div class="container-fluid">
                            <form class="d-flex" method="POST" action="<?php echo base_url();?>user/searchbar">
                                <input required class="form-control me-2" name="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


      
