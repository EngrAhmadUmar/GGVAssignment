<?php
  include_once "headerUserView.php";
?>

<body>
    <div class="page__title-area">
        <div class="container">
            <div class="page__title-container">
                <ul class="page__titles">
                    <li>
                        <a href="<?php echo base_url().'wholesaler/wholesaler_dashboard';?>">
                            <svg>
                                <img src="https://img.icons8.com/metro/14/000000/home.png" />
                            </svg>
                        </a>
                    </li>
                    <li class="page__title">Cart</li>
                </ul>
            </div>
        </div>
    </div>
    </header>

    <main id="main">
        <section class="section cart__area">
            <div class="container">
                <div class="responsive__cart-area">

                    <div class="cart__table table-responsive">
                        <table width="100%" class="table">
                            <thead>
                                <tr>
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th>UNIT PRICE</th>
                                    <th>QUANTITY</th>
                                    <th></th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $cartdata = $this->cart->contents();
                                    foreach ($cartdata as $data):
                                        $origin = $data['addr'];
                                        
                                        ?>
                                <tr>
                                    <td class="product__thumbnail">
                                        <a href="#">
                                            <img src="<?php echo base_url().'uploads/products/'.$data['image'];?>"
                                                alt="">
                                        </a>
                                    </td>

                                    <td class="product__name">
                                        <a href="#"><?php echo $data['name']; ?></a>
                                        <br><br>
                                        <small><?php echo $data['sellername']; ?></small>
                                    </td>
                                    <td class="product__price">
                                        <div class="price">
                                            <span class="new__price">RWF <?php echo $data['price']; ?></span>
                                        </div>
                                    </td>
                                    <td class="product__quantity">
                                        <form method="POST" action="<?php echo base_url();?>wholesaler/updatequantity/">
                                            <div class="input-counter">
                                                <div>
                                                    <!-- <span class="minus-btn" id="decrease" onclick="decreaseValue()">
                                                        <img src="https://img.icons8.com/android/24/000000/minus.png"/>
                                                    </span> -->
                                                    <input type="number" id="number" min="1" name="qty"
                                                        placeholder="<?php echo $data['qty'];?>" class="counter-btn" />
                                                    <input class="form-control" name="rowid"
                                                        value="<?php echo $data['rowid'];?>" type="hidden">
                                                    <!-- <span class="plus-btn" id="increase" onclick="increaseValue()">
                                                        <img src="https://img.icons8.com/android/24/000000/plus.png"/>
                                                    </span> -->
                                                </div>
                                            </div>

                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-secondary btn-sm">Update Quantity</button>
                                    </td>
                                    </form>
                                    <td class="product__subtotal">
                                        <div class="price">
                                            <span class="new__price">RWF <?php echo $data['subtotal']; ?></span>
                                        </div>
                                        <a href="<?php echo base_url().'wholesaler/deletecart/'.$data['rowid'];?>"
                                            class="remove__cart-item">
                                            <svg>
                                                <img
                                                    src="https://img.icons8.com/ios-filled/24/000000/delete-forever.png" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach ;?>
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-btns">
                        <div class="continue__shopping">
                            <a href="<?php echo base_url().'wholesaler/wholesaler_dashboard';?>">Continue Shopping</a>
                        </div>
                    </div>

                    <br>
                    <br>
                    <form id="distance_form">
                        <p class="mg-b-10">Delivery Location:</p>

                        <input id="origin" name="origin" name="bussinessaddr1" value="<?php echo $origin; ?>"
                            type="hidden" />
                        <input class="form-control" id="to_places" placeholder="<?PHP
                                        if(isset($_COOKIE[" destination"])){ echo $_COOKIE["destination"]; }else{
                            echo "Please input the location you want your products delivered to." ; } ?>" type="text">
                        <input id="destination" name="destination" name="addr" type="hidden" />

                        <br>
                        <input class="btn btn-primary" type="submit" value="Calculate Shipping Fee" />
                    </form>

                    <div class="cart__totals">
                        <h3>Cart Totals</h3>
                        <ul>
                            <li>
                                Subtotal
                                <span class="new__price">RWF <?php echo $this->cart->total(); ?></span>
                            </li>
                            <li>
                                Shipping
                                <span class="new__price" id="shipping">RWF
                                    <?PHP 
                                     if(isset($_COOKIE["shippingcost"])){
                                        echo $_COOKIE["shippingcost"];
                                        }else{
                                            echo "Please fill in delivery location above.";
                                        }
                                    ?>
                                </span>
                            </li>
                            <li>
                                Total
                                <span class="new__price" id="total">RWF
                                    <?PHP
                                        if(isset($_COOKIE["shippingcost"])){
                                        $total = $this->cart->total();
                                        $total = $total + $_COOKIE["shippingcost"];
                                        echo $total;
                                    }else{
                                            echo "Please fill in delivery location above.";
                                        }
                                    ?>
                                </span>
                            </li>
                        </ul>
                        <br>
                        <form method="POST" action="<?php echo base_url();?>wholesaler/checkout/">
                            <?php   $var = $this->session->userdata; ?>
                            <input name="destination" value="<?php echo $_COOKIE["destination"];?>" type="hidden" />
                            <input name="total" value="<?php echo $total;?>" type="hidden" />
                            <input name="buyerphone" value="<?php echo $var['phoneNumber'];?>" type="hidden" />
                            <input name="buyername" value="<?php echo $var['name'];?>" type="hidden" />
                            <?php if(isset($total)){?>
                            <?php
                            if($total < 10000){
                                ?> <a href="">Total Purchase less than RWF 10000</a>
                            <?php } else { ?>
                            <input class="btn btn-primary" type="submit" value="PROCEED TO CHECK OUT" />
                            <?php }?>
                            <?php } else { ?>
                            <a href="">Please fill in delivery location above.</a>
                            <?php } ?>
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

<script>
$(function() {
    // add input listeners
    google.maps.event.addDomListener(window, 'load', function() {
        var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
        var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

        google.maps.event.addListener(from_places, 'place_changed', function() {
            var from_place = from_places.getPlace();
            var from_address = from_place.formatted_address;
            $('#origin').val(from_address);
        });

        google.maps.event.addListener(to_places, 'place_changed', function() {
            var to_place = to_places.getPlace();
            var to_address = to_place.formatted_address;
            $('#destination').val(to_address);
        });

    });
    // calculate distance
    function calculateDistance() {
        var origin = $('#origin').val();
        var destination = $('#destination').val();
        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix({
            origins: [origin],
            destinations: [destination],
            travelMode: google.maps.TravelMode.DRIVING,
            // unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
            unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
            avoidHighways: false,
            avoidTolls: false
        }, callback);
    }
    // get distance results
    function callback(response, status) {
        if (status != google.maps.DistanceMatrixStatus.OK) {
            $('#result').html(err);
        } else {
            var origin = response.originAddresses[0];
            var destination = response.destinationAddresses[0];
            if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                $('#result').html("Better get on a plane. There are no roads between " + origin + " and " +
                    destination);
            } else {
                var distance = response.rows[0].elements[0].distance;
                var duration = response.rows[0].elements[0].duration;
                console.log(response.rows[0].elements[0].distance);
                var distance_in_kilo = distance.value / 1000; // the kilom
                var distance_in_mile = distance.value / 1609.34; // the mile
                var duration_text = duration.text;
                var duration_value = duration.value;
                var shipping_price = 1000;

                $('#in_mile').text(distance_in_mile.toFixed(2));
                $('#in_kilo').text(distance_in_kilo.toFixed(2));
                $('#duration_text').text(duration_text);
                $('#duration_value').text(duration_value);
                $('#from').text(origin);
                $('#to').text(destination);
                $('#shipping').text("RWF " + (distance_in_kilo) * (shipping_price));
                var shippingprice = ((distance_in_kilo) * (shipping_price));
                document.cookie = "shippingcost=" + shippingprice;
                document.cookie = "destination=" + destination;
                location = location;

            }
        }
    }
    // print results on submit the form
    $('#distance_form').submit(function(e) {
        e.preventDefault();
        calculateDistance();
    });

});
</script>


<?php
  include_once "footer.php";
?>