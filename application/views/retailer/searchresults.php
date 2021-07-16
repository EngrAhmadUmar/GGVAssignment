<?php
  include_once "headerUserView.php";
?>


<div class="page__title-area">
    <div class="container">
        <div class="page__title-container">
            <ul class="page__titles">
                <a href="<?php echo base_url().'user/index';?>">
                    <svg>
                        <img src="https://img.icons8.com/metro/14/000000/home.png" />
                    </svg>
                </a>
                <li class="page__title">Search Results</li>
            </ul>
        </div>
    </div>
</div>
</header>

<main id="main">
    <div class="container">
        <!-- Products Details -->
        <!-- Latest Products -->
        <section class="section related__products">
            <div class="title__container">
                <div class="section__title active" data-id="Latest Products">
                    <span class="dot"></span>
                    <h1 class="primary__title">Electronics Section</h1>
                </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-duration="1200">
                <!-- <div class="glide" id="glide_3"> -->
                    <div class="glide__track" data-glide-el="track">
                        <div class="grid">

                            <div class="content">
                                <ul class="rig columns-4">
                                    
                                    <?php
                                    foreach($results as $result):
                            ?>
                                 
                                    <li>
                                        <a href="#"><img class="product-image"
                                                src="<?php echo base_url().'uploads/products/'.$result->image;?>"></a>
                                        <h4><?php echo $result->name;?></h4>

                                        <p><?php 
                                        $content =  $result->description;
                                        echo substr($content, 0, 50);
                                        echo ".....";?></p>

                                        <?php if($result->salesprice != ""){ ?>
                                          <div class="price">RWF <?php echo $result->salesprice;?> </div>
                                          <span style="text-decoration: line-through; color:red;">RWF <?php echo $result->price;?></span>
                                        <?php }else{?>
                                          <div class="price"> RWF <?php echo $result->price;?> </div>
                                        <?php } ?>
                                        <hr>
                                        <a href="<?php echo base_url().'retailer/addtocart/'.$result->ID;?>"><button class="btn btn-default btn-xs pull-right" type="button">
                                            <i class="fa fa-cart-arrow-down"></i> Add To Cart
                                        </button></a>
                                        <a href="<?php echo base_url().'user/shop/'.$result->ID;?>"><button class="btn btn-default btn-xs pull-left" type="button">
                                            <i class="fa fa-eye"></i> View Product Details
                                        </button></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
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
