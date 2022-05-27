<?php
  include_once "header.php";
  $product = $this->db->get_where('products', array('ID' => $product_id))->result_array();
  foreach($product as $row):
    $sellername = $row['sellername'];
    $product_name = $row['name']; 
?>


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
                            <?php if($row['image1'] != "") {?>
                            <div class="pictures__container">
                                <img class="picture"
                                    src="<?php echo base_url();?>uploads/products/<?php echo $row['image1'];?>"
                                    id="pic2" onclick="myFunction(this)" />
                            </div>
                            <?php } ?>
                            <?php if($row['image2'] != "") {?>
                            <div class="pictures__container">
                                <img class="picture"
                                    src="<?php echo base_url();?>uploads/products/<?php echo $row['image2'];?>"
                                    id="pic3" onclick="myFunction(this)" />
                            </div>
                            <?php } ?>
                            <?php if($row['image3'] != "") {?>
                            <div class="pictures__container">
                                <img class="picture"
                                    src="<?php echo base_url();?>uploads/products/<?php echo $row['image3'];?>"
                                    id="pic4" onclick="myFunction(this)" />
                            </div>
                            <?php } ?>
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

                    <div data-toggle="modal" data-target="#contactModal" class="product-details__btn"
                        style="cursor: pointer;">
                        <a class="add">
                            <span>
                                <img src="https://img.icons8.com/android/24/000000/phone.png" />
                            </span>
                            Send Bid</a>
                    </div>
                </div>

                <div class="product-detail__right">
                    <div class="product-detail__content">
                        <h3><?php echo $row['name'];?></h3>
                        <!-- <div class="price">Starting Price
                            <span class="new__price">RWF <?php echo number_format($row['price'],1); ?></span>
                        </div> -->
                        <p>
                            <?php echo $row['description'];?>
                        </p>
                        <div class="product__info-container">
                            <ul class="product__info">
                                <li>
                                    <span>Starting Price:</span>
                                    <a href="#" class="in-stock">RWF <?php echo number_format($row['price'],1); ?></a>
                                </li>
                                <?php if($row['type']!=""){
                                    ?>
                                <li>
                                    <span>Product Type:</span>
                                    <a href="#"><?php echo $row['type'];?></a>
                                </li>
                                <?php } ?>
                                <li>
                                    <span>Quantity for sale:</span>
                                    <a href="#" class="in-stock"><?php echo $row['availablestock'];?></a>
                                </li>
                                <li>
                                    <span>Item Location:</span>
                                    <a href="#" class="in-stock"><?php echo $row['location'];?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <?php $category = $row['categories'];?>

    <?php endforeach; ?>

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
                                        <h4>Starting Price: RWF <?php $price = $product['price']; 
                                    echo $price;?>.0</h4>
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
                                        <h4>Starting Price: RWF <?php $price = $product['price']; 
                                    echo $price;?>.0</h4>
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
                        <img src="https://img.icons8.com/ios/24/000000/sell.png" />
                    </div>
                    <p>Verified Sellers</p>
                </div>

                <div class="facility__box">
                    <div class="facility-img__container">
                        <img src="https://img.icons8.com/doodle/24/000000/money.png" />
                    </div>
                    <p>100% PRODUCT GUARANTEE</p>
                </div>

                <div class="facility__box">
                    <div class="facility-img__container">
                        <img src="https://img.icons8.com/ios-glyphs/24/000000/used-product.png" />
                    </div>
                    <p>MANY TYPES OF PRODUCTS TO CHOOSE FROM</p>
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

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h3>Buyer Bid Details</h3>
                </div>

                <div class="d-flex flex-column text-center">
                    <form method="POST" action="<?php echo base_url();?>user/auction">
                        <div class="form-group">
                            <input required type="text" name="name" class="form-control" placeholder="Your Name...">
                        </div>
                        <div class="form-group">
                            <input required type="email" name="email" class="form-control" placeholder="Your Email...">
                        </div>
                        <div class="form-group">
                            <input required type="phone" name="phoneNumber" class="form-control"
                                placeholder="Your Phone Number...">
                        </div>
                        <div class="form-group">
                            <input required type="number" name="bid" class="form-control"
                                placeholder="How much will you purchase this product for?...(RWF)">
                        </div>
                        <div class="form-group">
                            <input required type="hidden" name="productname" value="<?php echo $product_name; ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input required type="hidden" name="productid" value="<?php echo $product_id; ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input required type="hidden" name="bussinessname" value="<?php echo $sellername; ?>"
                                class="form-control">
                        </div>

                        <button type="submit" name="login" class="btn btn-info btn-block btn-round">Send Bid</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>