<?php
  include_once "headeradmin.php";
?>

<?php
  include_once "sidebar.php";
?>

</div><!-- az-content-left -->
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
            <span>Admin</span>
            <span>Manage Retailers</span>
          </div>
          <hr class="mg-y-30">

  <div class="az-content-label mg-b-5">Retailer User Details</div>
          <p class="mg-b-20">Hover over rows to highlight</p>

          <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Bussiness Name</th>
                  <th>Phone Number</th>
                  <th>Bussiness Type</th>
                  <th>Account Status</th>
                  <th>Date Joined</th>
                  <th>Enable/Disable User</th>
                  <th>Delete User</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $retailerusers = $this->db->get('retaileruser')->result_array();
                    foreach($retailerusers as $retaileruser):
                ?>
                <tr>
                  <th scope="row"><?php echo $retaileruser['id'];?></th>
                  <td><?php echo $retaileruser['bussinessName'];?></td>
                  <td><?php echo $retaileruser['phoneNumber'];?></td>
                  <td><?php echo $retaileruser['bussinessType'];?></td>
                  <td><?php echo $retaileruser['status'];?></td>
                  <td><?php echo $retaileruser['date'];?></td>
                  <td>
                  <?php if($retaileruser['status']==1){ ?>
                    <a href="<?php echo base_url().'admin/deactivatestatus/'.$retaileruser['id'];?>"><button class="btn btn-secondary btn-sm" style="background-color:#e01e1e;">Deactivate User</button></a>
                  <?php }elseif($retaileruser['status']==0) { ?>
                    <a href="<?php echo base_url().'admin/activatestatus/'.$retaileruser['id'];?>"><button class="btn btn-secondary btn-sm">Activate User</button></a>
                  <?php } ?> 
                </td>
                  <td><a href="<?php echo base_url().'admin/deleteRetailer/'.$retaileruser['id'];?>"><img src="https://img.icons8.com/flat-round/24/000000/delete-sign.png"/></a></td>
                </tr>
                <?php endforeach; ?>
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
