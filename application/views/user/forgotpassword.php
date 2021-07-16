<?php
  include_once "header.php";
?>

<style>
.val-box {
    display: inline-block;
    height: 40px;
    width: 216px;
    text-align: center;
    position: relative;
    background: #FFFFFF;
}

.val-box input[type=text] {
    position: absolute;
    left: 0;
    top: 0;
    height: 34px;
    width: 212px;
    opacity: 0.9;
    z-index: -999;
    outline: none;
}

.val-box div {
    height: 34px;
    width: 28px;
    border: 1px solid #DDD;
    border-radius: 5px;
    float: left;
    margin: 2px 3px;
    z-index: 5;
    font-size: 1.5em;
    font-family: arial;
    font-weight: 530;
    text-align: center;
    line-height: 1.5em;
    cursor: text;
}

.val-box .available {
    border-color: #0081db;
}
</style>

<body>
    <div class="page__title-area">
        <div class="container">
            <div class="page__title-container">
                <ul class="page__titles">
                    <li>
                        <a href="<?php echo base_url().'user/index';?>">
                            <svg>
                                <img src="https://img.icons8.com/metro/14/000000/home.png" />
                            </svg>
                        </a>
                    </li>
                    <li class="page__title">Forgot Password</li>
                </ul>
            </div>
        </div>
    </div>
    </header>

    <main id="main">
        <section class="section cart__area">
            <div class="container">



                <div class="responsive__cart-area">
                    <div class="cart__totals">

                        <ul>
                            <form method="POST" action="<?php echo base_url();?>user/forgotpasswordFunction"
                                enctype="multipart/form-data">
                                <li>
                                    Account Phone Number:
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <input required type="text" name="phoneNumber" class="form-control"
                                            id="phoneNumber" placeholder="Your Phone Number...">
                                    </div>

                                </li>
                                <li>
                                    Security Question:
                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <select class="form-control" name="securityQuestion" id="securityQuestion"
                                            aria-label="Security Question">
                                            <option selected>Security Question</option>
                                            <option value="1">What primary school did you attend?</option>
                                            <option value="2">In what town or city was your first full time job?
                                            </option>
                                            <option value="3">What were the last four digits of your childhood
                                                telephone number?</option>
                                        </select>
                                    </div>

                                </li>
                                <li>
                                    Security Answer:
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <input required type="text" name="securityAnswer" class="form-control"
                                            id="securityAnswer" placeholder="Input answer to security question here...">
                                    </div>

                                </li>

                        </ul>
                        <br>
                        <button class="btn btn-dark" type="submit">Confirm Credentials And Send New Password</button>
                        </form>


                    </div>

                </div>
            </div>
        </section>
        <!-- Facility Section -->
        <section class="facility__section section" id="facility">
            <div class="container">
                <div class="facility__contianer" data-aos="fade-up" data-aos-duration="1200">
                    <div class="facility__box">
                        <div class="facility-img__container">
                            <img src="https://img.icons8.com/pastel-glyph/24/000000/airplane-take-off--v3.png" />
                        </div>
                        <p>FREE SHIPPING WORLD WIDE</p>
                    </div>

                    <div class="facility__box">
                        <div class="facility-img__container">
                            <img src="https://img.icons8.com/doodle/24/000000/money.png" />
                        </div>
                        <p>100% MONEY BACK GUARANTEE</p>
                    </div>

                    <div class="facility__box">
                        <div class="facility-img__container">
                            <img src="https://img.icons8.com/cotton/24/000000/mobile-payment--v3.png" />
                        </div>
                        <p>MANY PAYMENT GATWAYS</p>
                    </div>

                    <div class="facility__box">
                        <div class="facility-img__container">
                            <img src="https://img.icons8.com/doodle/24/000000/man-in-headphones.png" />
                        </div>
                        <p>24/7 ONLINE SUPPORT</p>
                    </div>
                </div>
            </div>
        </section>
        </div>

    </main>


    <!-- Go To -->

    <a href="#header" class="goto-top scroll-link">
        <img src="https://img.icons8.com/ios-glyphs/30/000000/up.png" />
    </a>
</body>


<?php
  include_once "footer.php";
?>