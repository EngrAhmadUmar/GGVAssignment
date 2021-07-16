<?php
  include_once "headeradmin.php";
?>

<?php
  include_once "sidebar.php";
?>

</div><!-- az-content-left -->
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
            <span>Profile</span>
            <span>Manage Products</span>
          </div>
          <hr class="mg-y-30">

  <div class="az-content-label mg-b-5">View Products Published To Your Store.</div>
          <p class="mg-b-20">Hover over rows to view more details</p>

          <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Seller Name</th>
                  <th>Available Stock</th>
                  <th>Price</th>
                  <th>Date Added</th>
                  <th>Product Status</th>
                  <th>Delete Product</th>
                </tr>
              </thead>
              <tbody>
              <?php
$products = $this->db->get('products')->result_array();
foreach($products as $product):
?>
                <tr>
                  <th scope="row"><?php echo $product['ID'];?></th>
                  <td><?php echo $product['name'];?></td>
                  <td><?php echo $product['sellername'];?></td>
                  <td><?php echo $product['availablestock'];?></td>
                  <td><?php echo $product['price'];?></td>
                  <td><?php echo $product['date'];?></td>
                  <td>
                  <?php if($product['status']==1){ ?>
                    <a href="<?php echo base_url().'admin/deactivateproduct/'.$product['ID'];?>"><button class="btn btn-secondary btn-sm" style="background-color:#e01e1e;">Deactivate Product</button></a>
                  <?php }elseif($product['status']==0) { ?>
                    <a href="<?php echo base_url().'admin/activateproduct/'.$product['ID'];?>"><button class="btn btn-secondary btn-sm">Activate Product</button></a>
                  <?php } ?> 
                </td>
                  <td><a href="<?php echo base_url().'admin/deleteProduct/'.$product['ID'];?>"><img src="https://img.icons8.com/flat-round/24/000000/delete-sign.png"/></a></td>
                </tr>
                <?php endforeach;?>
              </tbody>
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