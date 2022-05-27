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
                    <li class="page__title">Verify Account</li>
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
                        <h3>Please enter the verification code sent to the phone number</h3>
                        <ul>
                            <form method="POST"
                                action="<?php  $var = $this->session->userdata; echo base_url();?>user/verifystatus"
                                enctype="multipart/form-data">
                                <li>
                                    Account Name:
                                    <span class="new__price"><?php echo $var['name'];?></span>
                                </li>
                                <li>
                                    Account Type:
                                    <span class="new__price"><?php echo $var['login_type'];?></span>
                                </li>
                                <li>
                                    Verification Code:-
                                    <span class="new__price"><input required id="val-code-input" name="compcode"
                                            type="text" maxlength="7" onkeyup="checkForNum(this)"
                                            onselectstart="return false;" onblur="checkForNum(this)" /></span>
                                </li>
                        </ul>
                        <br>
                        <button class="btn btn-dark" type="submit">Verify My Account</button>
                        </form>
                        <br>
                        <br>
                        <form method="POST" action="<?php echo base_url();?>user/resendverification"
                            enctype="multipart/form-data">
                            <input required class="form-control" name="phoneNumber"
                                value="<?php echo $var['phoneNumber'];?>" type="hidden">

                            <button class="btn btn-dark" type="submit"> Resend Verification Code</button>

                        </form>

                        <br>
                        <button class="btn btn-dark" data-toggle="modal" data-target="#verification1Modal">Change Phone
                            Number</button>

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

<script type="text/javascript">
$(() => {
    var valCodeInput = $('#val-code-input');
    var valCodeItems = $("div[name='val-item']");
    var regex = /^[\d]+$/;
    var valCodeLength = 0;
    $('#val-box').on('click', () => {
        valCodeInput.focus();
    })
    valCodeInput.on('input propertychange change', (e) => {
        valCodeLength = valCodeInput.val().length;
        if (valCodeInput.val() && regex.test(valCodeInput.val())) {
            $(valCodeItems[valCodeLength - 1]).addClass('available');
            $(valCodeItems[valCodeLength - 1]).text(valCodeInput.val().substring(valCodeLength - 1,
                valCodeLength));
        }
    })
    $(this).on('keyup', (e) => {
        if (e.keyCode === 8) {
            $(valCodeItems[valCodeLength]).removeClass('available');
            $(valCodeItems[valCodeLength]).text("");
        }
    });
})

function checkForNum(obj) {
    obj.value = obj.value.replace(/[\D]/g, '');
}
</script>


<div class="modal fade" id="verification1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Please input your old phone number for self identification, in the next field input your new
                        phone number</h4>
                </div>
                <form method="POST" action="<?php echo base_url();?>user/changeVerNum" enctype="multipart/form-data">
                    <input required class="form-control" name="phoneNumber1" value="<?php echo $var['phoneNumber'];?>"
                        type="hidden">
                    <div class="form-group">
                        <input required type="phone" name="phoneNumber2" class="form-control"
                            placeholder="Enter the Old Number...">
                    </div>
                    <div class="form-group">
                        <input required type="phone" name="phoneNumber" class="form-control"
                            placeholder="Enter the New Number...">
                    </div>
                    <button class="btn btn-dark" type="submit">Confirm Changes and Resend Verification Code</button>
                </form>
            </div>
        </div>
    </div>
</div>