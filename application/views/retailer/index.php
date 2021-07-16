<?php
  include_once "headerUserView.php";
?>


<!-- Hero -->
<div class="hero">
    <div class="glide" id="glide_1">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <?php
                $products = $this->db->get_where('products', array('feature' => 1))->result_array();
                foreach($products as $product):
                ?>

                <!-- Product starts -->
                <li class="glide__slide">
                    <div class="hero__center">
                        <div class="hero__left">
                            <span class=""><?php echo $product['name'];?></span>
                            <h1 class=""><?php echo $product['tag_line'];?></h1>
                            <p><?php echo $product['description'];?></p>
                            <a href="<?php echo base_url().'retailer/shop/'.$product['ID'];?>"><button
                                    class="hero__btn">SHOP NOW</button></a>
                        </div>
                        <div class="hero__right">
                            <div class="hero__img-container">
                                <img class="banner_01"
                                    src="<?php echo base_url().'uploads/products/'.$product['image'];?>"
                                    alt="banner2" />
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Product ends -->
                <?php endforeach;?>
            </ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
            <button class="glide__bullet" data-glide-dir="=0"></button>
            <button class="glide__bullet" data-glide-dir="=1"></button>
        </div>

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
</header>
<!-- End Header -->

<!-- Main -->
<main id="main">
    <div class="container">
        <!-- Collection -->
        <section id="collection" class="section collection">
            <div class="collection__container" data-aos="fade-up" data-aos-duration="1200">
                <?php
$products = $this->db->get_where('products', array('secondfeature' => 1))->result_array();
foreach($products as $product):
?>
                <div class="collection__box">
                    <div class="img__container">
                        <img class="collection_02" src="<?php echo base_url().'uploads/products/'.$product['image'];?>"
                            alt="">
                    </div>
                    <div class="collection__content">
                        <div class="collection__data">
                            <span><?php echo $product['tag_line'];?></span>
                            <h1><?php echo $product['name'];?></h1>
                            <a href="<?php echo base_url().'retailer/shop/'.$product['ID'];?>">SHOP NOW</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

        </section>


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
                                        <a href="<?php echo base_url().'retailer/shop/'.$product['ID'];?>"><button
                                                type="submit" class="product__btn">View Product</button></a>
                                        <br>
                                        <br>
                                        <a href="<?php echo base_url().'retailer/addtocart/'.$product['ID'];?>"><button
                                                type="submit" class="product__btn">Add to cart</button></a>
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

        <section class="section related__products">
            <div class="title__container">
                <div class="section__title filter-btn active">
                    <span class=" dot"></span>
                    <h1 class="primary__title">Our Best Deals</h1>
                </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-duration="1200">
                <div class="glide" id="glide_3">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides latest-center">
                            <?php
$products = $this->db->get_where('products', array('bestdeals' => 1))->result_array();
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
                                        <a href="<?php echo base_url().'retailer/shop/'.$product['ID'];?>"><button
                                                type="submit" class="product__btn">View Product</button></a>
                                        <br>
                                        <br>
                                        <a href="<?php echo base_url().'retailer/addtocart/'.$product['ID'];?>"><button
                                                type="submit" class="product__btn">Add to cart</button></a>
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
                        </button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                            <img src="https://img.icons8.com/metro/26/000000/chevron-right.png" />
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="section related__products">
            <div class="title__container">
                <div class="section__title active" data-id="Latest Products">
                    <span class="dot"></span>
                    <h1 class="primary__title">On Sale</h1>
                </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-duration="1200">
                <div class="glide" id="glide_3">
                    <div class="glide__track" data-glide-el="track">
                        <div class="grid">

                            <div class="content">
                                <ul class="rig columns-4">
                                    <?php
                                    $this->db->limit(8);
                                    $this->db->from('products');
                                    $this->db->where('salesprice != ""');
                                    
                                    $query = $this->db->get();
                                    
                                  $products = $query->result_array();
                                  foreach($products as $product):
                                  ?>
                                    <li>
                                        <a href="#"><img class="product-image"
                                                src="<?php echo base_url().'uploads/products/'.$product['image'];?>"></a>
                                        <h4><?php echo $product['name'];?></h4>

                                        <p><?php 
                                        $content =  $product['description'];
                                        echo substr($content, 0, 50);
                                        echo ".....";?></p>

                                        <?php if($product['salesprice'] != ""){ ?>
                                        <div class="price">RWF <?php echo $product['salesprice'];?> </div>
                                        <span style="text-decoration: line-through; color:red;">RWF
                                            <?php echo $product['price'];?></span>
                                        <?php }else{?>
                                        <div class="price"> RWF <?php echo $product['price'];?> </div>
                                        <?php } ?>
                                        <hr>
                                        <a href="<?php echo base_url().'retailer/addtocart/'.$product['ID'];?>">
                                            <button class="btn btn-default btn-xs pull-right" type="button">
                                                <i class="fa fa-cart-arrow-down"></i> Add To Cart
                                            </button></a>
                                        <a href="<?php echo base_url().'retailer/shop/'.$product['ID'];?>"><button
                                                class="btn btn-default btn-xs pull-left" type="button">
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

        <?php
                $categories = $this->db->get_where('categories')->result_array();
                foreach($categories as $category):
                    $credential = array('categories' => $category['id']);
                    $query = $this->db->get_where('products', $credential);
                    if ($query->num_rows() > 0) {
                ?>
        <section class="section latest__products" id="latest">
            <div class="title__container">
                <div class="section__title active" data-id="Latest Products">
                    <span class="dot"></span>
                    <h1 class="primary__title"><?php echo $category['categoryname'];?></h1>
                </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-duration="1200">
                <div class="glide" id="glide_3">
                    <div class="glide__track" data-glide-el="track">
                        <div class="grid">

                            <div class="content">
                                <ul class="rig columns-4">
                                <?php
                                    $this->db->limit(8);
                                   $products = $this->db->get_where('products', array('categories' => $category['id']))->result_array();
                                    foreach($products as $product):
                                    ?>
                                    <li>
                                        <a href="#"><img class="product-image"
                                                src="<?php echo base_url().'uploads/products/'.$product['image'];?>"></a>
                                        <h4><?php echo $product['name'];?></h4>

                                        <p><?php 
                                        $content =  $product['description'];
                                        echo substr($content, 0, 50);
                                        echo ".....";?></p>

                                        <?php if($product['salesprice'] != ""){ ?>
                                        <div class="price">RWF <?php echo $product['salesprice'];?> </div>
                                        <span style="text-decoration: line-through; color:red;">RWF
                                            <?php echo $product['price'];?></span>
                                        <?php }else{?>
                                        <div class="price"> RWF <?php echo $product['price'];?> </div>
                                        <?php } ?>
                                        <hr>
                                        <a href="<?php echo base_url().'wholesaler/addtocart/'.$product['ID'];?>">
                                            <button class="btn btn-default btn-xs pull-right" type="button">
                                                <i class="fa fa-cart-arrow-down"></i> Add To Cart
                                            </button></a>
                                        <a href="<?php echo base_url().'wholesaler/shop/'.$product['ID'];?>"><button
                                                class="btn btn-default btn-xs pull-left" type="button">
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
        <?php } endforeach; ?>

        <!--New Section  -->
        <section class="section news" id="news">
            <div class="container">
                <div class="title__container">
                    <div class="section__titles">
                        <div class="section__title active">
                            <span class="dot"></span>
                            <h1 class="primary__title">Moyata News</h1>
                        </div>
                    </div>
                </div>
                <div class="news__container">
                    <div class="glide" id="glide_5">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <?php
                $news = $this->db->get('news')->result_array();
                foreach($news as $new):
              ?>
                                <li class="glide__slide">
                                    <div class="new__card">
                                        <div class="card__header">
                                            <img src="<?php echo base_url().'uploads/news/'.$new['image'];?>" alt="">
                                        </div>
                                        <div class="card__footer">
                                            <h3><?php echo $new['title'];?></h3>
                                            <span>By Admin</span>
                                            <p><?php 
                      $content =  $new['content'];
                      echo substr($content, 0, 200);
                      echo ".....";?></p>
                                            <a href="<?php echo base_url().'retailer/news/'.$new['id'];?>"><button
                                                    type="submit" class="product__btn">Read More</button></a>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
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
<br>


<!-- End Main -->






<?php
  include_once "footer.php";
?>