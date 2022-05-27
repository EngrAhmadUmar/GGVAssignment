<?php
  include_once "headeradmin.php";
?>

<?php
  include_once "sidebar.php";
?>

<?php 
            $var = $this->session->userdata;
            // echo $var['name']; 
            ?>

        </div><!-- az-content-left -->
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
            <span>Profile</span>
            <span>View Profile</span>
          </div>
                    <hr class="mg-y-30">

          <div class="az-content-label mg-b-5">Basic Information</div>
          <br>
          <div class="col-lg mg-t-10 mg-lg-t-0">
          <?php
$retailer = $this->db->get_where('retaileruser', array('id' =>  $var['retailer_id']))->result_array();
foreach($retailer as $retailers):
?>
            <p class="mg-b-10">Company Name</p>
              <input class="form-control" placeholder="<?php echo $retailers['bussinessName'];?>" readonly="" type="text">
              
              <br>
              <p class="mg-b-10">Company Website URL:</p>
              <input class="form-control" placeholder="<?php echo $retailers['bussinessUrl'];?>" readonly="" type="text">

              
              <br>
              <p class="mg-b-10">Company Description:</p>
              <textarea rows="3" class="form-control" placeholder="<?php echo $retailers['bussinessDesc'];?>" readonly=""></textarea>
              <br>

              <p class="mg-b-10">Dated Joined Moyata:</p>
              <textarea rows="1" class="form-control" placeholder="<?php echo $retailers['date'];?>" readonly=""></textarea>
              <br>

              <br>
            </div>

          <hr class="mg-y-30">

          <div class="az-content-label mg-b-5">Contact Information</div>

          <div class="col-lg mg-t-10 mg-lg-t-0">
            <br>

          <p class="mg-b-10">Country Name: </p>
              <input class="form-control" placeholder="Rwanda" readonly="" type="text">

          <br>
          <p class="mg-b-10">Address 1:</p>
          <input class="form-control" placeholder="<?php echo $retailers['bussinessaddr1'];?>" readonly="" type="text">
               

          <br>
          <p class="mg-b-10">City:</p>
          <input class="form-control" placeholder="<?php echo $retailers['city'];?>" readonly="" type="text">

          <br>
          <p class="mg-b-10">State:</p>
          <input class="form-control" placeholder="<?php echo $retailers['state'];?>" readonly="" type="text">

          <br>
          <p class="mg-b-10">Zip Code:</p>
          <input class="form-control" placeholder="<?php echo $retailers['zipCode'];?>" readonly="" type="text">

          <br>
          <p class="mg-b-10">Phone:</p>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    Phone:
                  </div>
                </div><!-- input-group-prepend -->
                <input readonly="" id="phoneMask" type="text" class="form-control" placeholder="<?php echo $retailers['phoneNumber'];?>">
              </div><!-- input-group -->
            </div>
          <br>
        <!-- </div> -->

        <hr class="mg-y-30">

          <div class="az-content-label mg-b-5">Social Networking</div>

          <div class="col-lg mg-t-10 mg-lg-t-0">


          <br>
          <p class="mg-b-10">On Facebook:</p>
          <input class="form-control" readonly="" placeholder="<?php echo $retailers['facebook'];?>" type="text">

          <br>
          <p class="mg-b-10">On Instagram:</p>
          <input class="form-control" readonly="" placeholder="<?php echo $retailers['instagram'];?>" type="text">

          <br>
          <p class="mg-b-10">On Twitter:</p>
          <input class="form-control" readonly="" placeholder="<?php echo $retailers['twitter'];?>" type="text">
          <?php endforeach; ?>
          <br>
          <br>

      </div>
    </div>
          </div>
          

    </div>

<?php
  include_once "footer.php";
?>