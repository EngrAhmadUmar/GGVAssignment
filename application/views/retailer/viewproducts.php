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
            <span>View Products</span>
          </div>
          <hr class="mg-y-30">

  <div class="az-content-label mg-b-5">View Products.</div>
          <p class="mg-b-20">Hover over rows to view more details</p>

          <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Date Added</th>
                </tr>
              </thead>
              <tbody>
              <?php
$products = $this->db->get_where('products', array('status' => 1))->result_array();
foreach($products as $product):
?>
                <tr>
                  <th scope="row"><?php echo $product['ID'];?></th>
                  <td><?php echo $product['name'];?></td>
                  <td><?php echo $product['availablestock'];?></td>
                  <td><?php echo $product['price'];?></td>
                  <td>17/10/2021</td>
                </tr>
                <?php endforeach;?>
                <!-- <tr>
                  <th scope="row">2</th>
                  <td>Aventador SVJ</td>
                  <td>12</td>
                  <td>$320,800</td>
                  <td>12/08/2021</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Aventador SVJ</td>
                  <td>12</td>
                  <td>$320,800</td>
                  <td>12/08/2021</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Aventador SVJ</td>
                  <td>12</td>
                  <td>$320,800</td>
                  <td>12/08/2021</td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Aventador SVJ</td>
                  <td>12</td>
                  <td>$320,800</td>
                  <td>12/08/2021</td> -->
                </tr>
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