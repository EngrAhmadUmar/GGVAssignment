<?php
  include_once "headeradmin.php";
?>
<?php
  include_once "sidebar.php";
?>

<?php 
$var = $this->session->userdata;
?>
</div><!-- az-content-left -->
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="az-content-breadcrumb">
        <span>My Profile</span>
        <span>Edit Product</span>
    </div>
    <hr class="mg-y-30">

    <div class="az-content-label mg-b-5">Product Information</div>
    <br>
    <form method="POST" action="<?php echo base_url();?>Auctioneer/editproductFunction" enctype="multipart/form-data">
        <div class="col-lg mg-t-10 mg-lg-t-0">
            <p class="mg-b-10">Product Name</p>

            <?php
            $wholesaleusers = $this->db->get_where('wholesaleuser', array('id' => $var['Auctioneer_id']))->result_array();
            foreach($wholesaleusers as $wholesaleuser):
            ?>
            <input class="form-control" name="id" value="<?php echo $product_id;?>" type="hidden">
            <input class="form-control" name="bussinessAddr" value="<?php echo $wholesaleuser['bussinessaddr1'];?>"
                type="hidden">
            <input class="form-control" name="sellername" value="<?php echo $wholesaleuser['bussinessName'];?>"
                type="hidden">
            <?php endforeach; ?>

            <?php
            $products = $this->db->get_where('products', array('ID' => $product_id))->result_array();
            foreach($products as $product):
            ?>
            <input class="form-control" name="name" placeholder="<?php echo $product['name'];?>" type="text">

            <br>
            <p class="mg-b-10">Product Description:</p>
            <textarea rows="3" class="form-control" name="description"
                placeholder="<?php echo $product['description'];?>"></textarea>
            <br>

            <p class="mg-b-10">Product Tag Line:</p>
            <input class="form-control" name="tag_line" placeholder="<?php echo $product['tag_line'];?>" type="text">

            <br>
            <p class="mg-b-10">Product Location:</p>
            <input class="form-control" name="location" placeholder="<?php echo $product['location'];?>" type="text">

            <br>

            <p class="mg-b-10">Product Starting Price: (RWF)</p>
            <input class="form-control" name="price" placeholder="<?php echo $product['price'];?>" type="text">

            <br>

            <input name="cate" value="<?php echo $product['categories'];?>" type="hidden">
            <p class="mg-b-10">Product Category:</p>
            <div class="form-group">
                <select required class="form-control" name="categories" aria-label=".form-select-lg example">
                    <option selected>Category Of Product</option>
                    <?php
                $categories = $this->db->get_where('categories')->result_array();
                foreach($categories as $category):
                ?>
                    <option value="<?php echo $category['id'];?>"><?php echo $category['categoryname'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>

            <p class="mg-b-10">Quantity for sale:</p>
            <input class="form-control" name="availablestock" placeholder="<?php echo $product['availablestock'];?>"
                type="text">

            <p class="mg-b-20">Select Product Images</p>

            <div class="row row-sm">
                <div class="col-sm-7 col-md-6 col-lg-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" accept="image/*">
                        <label class="custom-file-label" for="customFile"><?php echo $product['image'];?></label>
                    </div>
                </div><!-- col -->
            </div>

            <br>

            <div class="row row-sm">
                <div class="col-sm-7 col-md-6 col-lg-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image1" accept="image/*">
                        <label class="custom-file-label" for="customFile"><?php echo $product['image1'];?></label>
                    </div>
                </div><!-- col -->
            </div>

            <br>

            <div class="row row-sm">
                <div class="col-sm-7 col-md-6 col-lg-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image2" accept="image/*">
                        <label class="custom-file-label" for="customFile"><?php echo $product['image2'];?></label>
                    </div>
                </div><!-- col -->
            </div>

            <br>

            <div class="row row-sm">
                <div class="col-sm-7 col-md-6 col-lg-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image3" accept="image/*">
                        <label class="custom-file-label" for="customFile"><?php echo $product['image3'];?></label>
                    </div>
                </div><!-- col -->
            </div>


            <br>
        </div>

        <hr class="mg-y-30">

        <div class="az-content-label mg-b-5">Optional Product Information</div>

        <div class="col-lg mg-t-10 mg-lg-t-0">
            <br>

            <br>
            <p class="mg-b-10">Type:</p>
            <input class="form-control" name="type" placeholder="<?php echo $product['type'];?>" type="text">


            <br>
            <p class="mg-b-10">Color:</p>
            <input class="form-control" name="color" placeholder="<?php echo $product['color'];?>" type="text">


            <br>
        </div>
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
            <button type="submit" name="submit" class="btn btn-success btn-block">Edit Product</button>
        </div>
    </form>
    <br>
</div>
<?php endforeach;?>
</div>
<?php
  include_once "footer.php";
?>