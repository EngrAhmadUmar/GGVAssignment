<?php
  include_once "headerUserView.php";
  $product = $this->db->get_where('products', array('ID' => $product_id))->result_array();
  foreach($product as $row):
?>


<div class="page__title-area">
    <div class="container">
        <div class="page__title-container">
            <ul class="page__titles">
                <li>
                    <a href="<?php echo base_url().'retailer/retailer_dashboard';?>">
                        <svg>
                            <img src="https://img.icons8.com/metro/14/000000/home.png" />
                        </svg>
                    </a>
                </li>
                <li class="page__title"><?php echo $row['name'];?></li>
            </ul>
        </div>
    </div>
</div>
</header>

<main id="main">
    <div class="container">
        <!-- Products Details -->
        <section class="section product-details__section">
            <div class="product-detail__container">
                <div class="product-detail__left">
                    <div class="details__container--left">
                        <div class="product__pictures">
                            <div class="pictures__container">
                                <img class="picture"
                                    src="<?php echo base_url();?>uploads/products/<?php echo $row['image'];?>" id="pic1"
                                    onclick="myFunction(this)" />
                            </div>
                            <div class="pictures__container">
                                <img class="picture"
                                    src="<?php echo base_url();?>uploads/products/<?php echo $row['image1'];?>"
                                    id="pic2" onclick="myFunction(this)" />
                            </div>
                            <div class="pictures__container">
                                <img class="picture"
                                    src="<?php echo base_url();?>uploads/products/<?php echo $row['image2'];?>"
                                    id="pic3" onclick="myFunction(this)" />
                            </div>
                            <div class="pictures__container">
                                <img class="picture"
                                    src="<?php echo base_url();?>uploads/products/<?php echo $row['image3'];?>"
                                    id="pic4" onclick="myFunction(this)" />
                            </div>
                        </div>
                        <div class="product__picture" id="product__picture">
                            <!-- <div class="rect" id="rect"></div> -->
                            <div class="picture__container">
                                <img id="imageBox"
                                    src="<?php echo base_url();?>uploads/products/<?php echo $row['image'];?>"
                                    id="pic" />
                            </div>
                        </div>
                        <div class="zoom" id="zoom"></div>
                    </div>
                    <script>
                    function myFunction(smallImg) {
                        var fullImg = document.getElementById("imageBox");
                        fullImg.src = smallImg.src;
                    }
                    </script>

                    <div class="product-details__btn">
                        <a class="add" href="<?php echo base_url().'retailer/addtocart/'.$row['ID'];?>">
                            <span>
                                <img src="https://img.icons8.com/material-rounded/24/000000/shopping-cart.png" />
                            </span>
                            Add to Cart</a>
                    </div>
                </div>

                <div class="product-detail__right">
                    <div class="product-detail__content">
                        <h3><?php echo $row['name'];?></h3>
                        <div class="price">
                            <span class="new__price"><?php echo $row['price'];?></span>
                        </div>
                        <p>
                            <?php echo $row['description'];?>
                        </p>
                        <div class="product__info-container">
                            <ul class="product__info">
                                <li class="select">
                                </li>

                                <?php if($row['brand']!=""){
                                    ?>
                                <li>
                                    <span>Brand:</span>
                                    <a href="#"><?php echo $row['brand'];?></a>
                                </li>
                                <?php } ?> 
                                <?php if($row['type']!=""){
                                    ?>
                                <li>
                                    <span>Product Type:</span>
                                    <a href="#"><?php echo $row['type'];?></a>
                                </li>
                                <?php } ?> 
                                <li>
                                    <span>Availability:</span>
                                    <a href="#" class="in-stock"><?php echo $row['availablestock'];?></a>
                                </li>
                                <?php $category = $row['categories'];?>
                                <form method="POST"
                                    action="<?php echo base_url().'retailer/rateproduct/'.$row['ID'];?>">
                                    <input class="form-control" name="rateIndex"
                                        value="<?php echo $_COOKIE["rating"]+1;?>" type="hidden">
                                    <input class="form-control" name="productid" value="<?php echo $row['ID'];?>"
                                        type="hidden">
                                    <input class="form-control" name="sellername"
                                        value="<?php echo $row['sellername'];?>" type="hidden">
                                    <?php endforeach; ?>

                                    <?php
                                $rate = $this->db->get_where('rating', array('productid' => $product_id))->result_array();
                                $totalrate = 0;
                                $number = 0;
                                foreach($rate as $data):
                                  $totalrate = $totalrate + $data['rateIndex'];
                                  $number = $number + 1;
                                endforeach;
                                if($number>0){
                               $averaterating = $totalrate/$number;
                                }else{
                                  
                                }
                              ?>

                                    <?php if($number>0){?>
                                    <li>
                                        <span>Current Rating:</span>
                                        <a href="#" class="in-stock"><?php echo round($averaterating, 1);?>/5</a>
                                    </li>
                                    <?php }?>

                                    <li>
                                        <div style="color:grey;">
                                            <span>Rate Product:</span>
                                            <i class="fa fa-star" data-index="0"></i>
                                            <i class="fa fa-star" data-index="1"></i>
                                            <i class="fa fa-star" data-index="2"></i>
                                            <i class="fa fa-star" data-index="3"></i>
                                            <i class="fa fa-star" data-index="4"></i>
                                    </li>
                                    <li>
                                        <span>Add Review:</span>
                                        <br>
                                        <br>
                                        <textarea style="border-top-style: hidden;" rows="3" class="form-control"
                                            name="review" placeholder="2000 characters max"></textarea>
                                    </li>
                                    <button type="submit" class="btn btn-secondary btn-sm">Submit Review</button>
                                </form>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>

    <style>
    .container1 {
        max-width: 1040px;
        margin: 30px auto;
        background: #fff;
        border-radius: 8px;
        padding: 20px;
    }

    .margin-bottom {
        150px;
    }

    .comment {
        display: block;
        transition: all 1s;
    }
    </style>
    <section class="section related__products">
        <div class="title__container">
            <div class="section__title filter-btn active">
                <span class=" dot"></span>
                <h1 class="primary__title">Product Reviews</h1>
            </div>
        </div>
        <div class="container1">
            <div class="row">
                <div class="col-6">
                    <div class="comment">
                        
                        <?php
        $rating = $this->db->get_where('rating', array('productid' => $product_id))->result_array();
            foreach($rate as $data):
          ?>
                        <li>
                            <span>Date:</span>
                            <a><?php echo $data['date'];?></a>
                        </li>
                        <li>
                            <span>Review:</span>
                            <a><?php echo $data['review'];?></a>
                        </li>
                        <hr>
                        <?php   
    endforeach;
    ?>
                    </div>
                    <!--End Comment-->
                </div>
                <!--End col -->
            </div>
        </div>
    </section>



    <!-- Related Products -->
    <section class="section related__products">
        <div class="title__container">
            <div class="section__title filter-btn active">
                <span class=" dot"></span>
                <h1 class="primary__title">Related Products</h1>
            </div>
        </div>
        <div class="container" data-aos="fade-up" data-aos-duration="1200">
            <div class="glide" id="glide_3">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides latest-center">
                        <?php
$products = $this->db->get_where('products', array('categories' => $category))->result_array();
foreach($products as $product):
?>
                        <li class="glide__slide">
                            <div class="product">
                                <div class="product__header">
                                    <a href="#"><img
                                            src="<?php echo base_url().'uploads/products/'.$product['image'];?>"
                                            alt="product"></a>
                                </div>
                                <div class="product__footer">
                                    <h3><?php echo $product['name'];?></h3>

                                    <div class="product__price">
                                        <h4><?php echo $product['price'];?></h4>
                                    </div>
                                    <a href="<?php echo base_url().'user/shop/'.$product['ID'];?>"><button type="submit"
                                            class="product__btn">View Product</button></a>
                                    <br>

                                </div>

                            </div>
                        </li>
                        <?php endforeach; ?>
                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                <img src="https://img.icons8.com/metro/26/000000/chevron-left.png" />
                            </button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                <img src="https://img.icons8.com/metro/26/000000/chevron-right.png" />
                            </button>
                        </div>
                </div>
            </div>
    </section>

    <!-- Latest Products -->
    <section class="section latest__products" id="latest">
        <div class="title__container">
            <div class="section__title active" data-id="Latest Products">
                <span class="dot"></span>
                <h1 class="primary__title">Latest Products</h1>
            </div>
        </div>
        <div class="container" data-aos="fade-up" data-aos-duration="1200">
            <div class="glide" id="glide_2">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides latest-center">
                        <?php
$products = $this->db->get_where('products', array('status' => 1))->result_array();
foreach($products as $product):
?>
                        <li class="glide__slide">
                            <div class="product">
                                <div class="product__header">
                                    <img src="<?php echo base_url().'uploads/products/'.$product['image'];?>"
                                        alt="product">
                                </div>
                                <div class="product__footer">
                                    <h3><?php echo $product['name'];?></h3>

                                    <div class="product__price">
                                        <h4><?php echo $product['price'];?></h4>
                                    </div>
                                    <a href="<?php echo base_url().'user/shop/'.$product['ID'];?>"><button type="submit"
                                            class="product__btn">View Product</button></a>
                                    <br>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">


                        <img src="https://img.icons8.com/metro/26/000000/chevron-left.png" />
                        <img src="https://img.icons8.com/metro/26/000000/chevron-right.png" />
                    </button>
                    </button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                </div>
            </div>
        </div>
    </section>
    </div>
    <!-- Facility Section -->
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
<?php
  include_once "footer.php";
?>

<script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
    crossorigin="anonymous"></script>
<script>
var ratedIndex = -1,
    uID = 0;

$(document).ready(function() {
    resetStarColors();

    if (localStorage.getItem('ratedIndex') != null) {
        setStars(parseInt(localStorage.getItem('ratedIndex')));
        uID = localStorage.getItem('uID');
    }

    $('.fa-star').on('click', function() {
        ratedIndex = parseInt($(this).data('index'));
        document.cookie = "rating=" + ratedIndex,
            localStorage.setItem('ratedIndex', ratedIndex);
        saveToTheDB();
        location = location;
    });

    $('.fa-star').mouseover(function() {
        resetStarColors();
        var currentIndex = parseInt($(this).data('index'));
        setStars(currentIndex);
    });

    $('.fa-star').mouseleave(function() {
        // resetStarColors();

        if (ratedIndex != -1)
            setStars(ratedIndex);
    });
});

function saveToTheDB() {
    $.ajax({
        url: "<?php echo base_url().'retailer/shop/'.$product['ID'];?>",
        method: "POST",
        dataType: 'json',
        data: {
            save: 1,
            uID: uID,
            ratedIndex: ratedIndex

        },
        success: function(r) {
            uID = r.id;
            localStorage.setItem('uID', uID);
        }
    });
}


function setStars(max) {
    for (var i = 0; i <= max; i++)
        $('.fa-star:eq(' + i + ')').css('color', 'orange');
}

function resetStarColors() {
    $('.fa-star').css('color', 'grey');
}
</script>