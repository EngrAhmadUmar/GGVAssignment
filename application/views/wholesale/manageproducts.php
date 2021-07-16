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
            <span>Manage Products</span>
          </div>
          <hr class="mg-y-30">

  <div class="az-content-label mg-b-5">Managed Products Published To Your Store.</div>
          <p class="mg-b-20">Hover over rows to view more details</p>

          <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Available Stock</th>
                  <th>Price</th>
                  <th>Edit Product</th>
                  <th>Delete Product</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $products = $this->db->get_where('products', array('sellername' => $var['name']))->result_array();
              foreach($products as $product):
              ?>
                <tr>
                <th scope="row"><?php echo $product['ID'];?></th>
                  <td><?php echo $product['name'];?></td>
                  <td><?php echo $product['availablestock'];?></td>
                  <td><?php echo $product['price'];?></td>
                  <td><a href="<?php echo base_url().'wholesaler/editProduct/'.$product['ID'];?>"><img src="https://img.icons8.com/android/24/000000/edit.png"/></a></td>
                  <td><a href="<?php echo base_url().'wholesaler/deleteProduct/'.$product['ID'];?>"><img src="https://img.icons8.com/flat-round/24/000000/delete-sign.png"/></a></td>
                </tr>
                <?php endforeach;?>
            </table>
          </div>
        </div>
        <br>
        <br>
      </div>
    </body>
  <?php
  include_once "footer.php";
?>