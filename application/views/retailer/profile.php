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
            <span>Edit Profile</span>
          </div>
                    <hr class="mg-y-30">
                    <?php
$retailers = $this->db->get_where('retaileruser', array('id' => $var['retailer_id']))->result_array();
foreach($retailers as $retailer):
?>
          <div class="az-content-label mg-b-5">Basic Information</div>
          <br>
          <form method="POST" action="<?php echo base_url();?>retailer/editaccount" enctype="multipart/form-data">

          <div class="col-lg mg-t-10 mg-lg-t-0">
            <p class="mg-b-10">Company Name</p>

            <input class="form-control" name="id" value="<?php echo $retailer['id'];?>" type="hidden">

              <input class="form-control" name="bussinessName" placeholder="<?php echo $retailer['bussinessName'];?>" readonly="" type="text">
              
              <br>
              <p class="mg-b-10">Company Website URL:</p>
              <input class="form-control" name="bussinessUrl" placeholder="<?php echo $retailer['bussinessUrl'];?>" type="text">

              <br>
              <p class="mg-b-10">Company Description:</p>
              <textarea rows="3" name="bussinessDesc" class="form-control" placeholder="<?php echo $retailer['bussinessDesc'];?>"></textarea>
              <br>

              </div>

          <hr class="mg-y-30">

          <div class="az-content-label mg-b-5">Contact Information</div>

          <div class="col-lg mg-t-10 mg-lg-t-0">
            <br>

          <p class="mg-b-10">Country Name: </p>
              <input class="form-control" name="" placeholder="Rwanda" readonly="" type="text">

          <br>
          <p class="mg-b-10">Address 1:</p>
          <input class="form-control" id="from_places" placeholder="<?php echo $retailer['bussinessaddr1'];?>" type="text">
          <input id="origin" name="bussinessaddr1" type="hidden" />
         

          <br>
          <p class="mg-b-10">City:</p>
          <input class="form-control" name="city" placeholder="<?php echo $retailer['city'];?>" type="text">

          <br>
          <p class="mg-b-10">State:</p>
          <input class="form-control" name="state" placeholder="<?php echo $retailer['state'];?>" type="text">

          <br>
          <p class="mg-b-10">Zip Code:</p>
          <input class="form-control" name="zipCode" placeholder="<?php echo $retailer['zipCode'];?>" type="text">

          <br>
          <p class="mg-b-10">Phone:</p>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    Phone:
                  </div>
                </div><!-- input-group-prepend -->
                <input id="phoneMask" type="text" name="phoneNumber" class="form-control" placeholder="<?php echo $retailer['phoneNumber'];?>">
              </div><!-- input-group -->
            </div>
          <br>
        <!-- </div> -->

        <hr class="mg-y-30">

          <div class="az-content-label mg-b-5">Social Networking</div>

          <div class="col-lg mg-t-10 mg-lg-t-0">


          <br>
          <p class="mg-b-10">On Facebook:</p>
          <input class="form-control" name="facebook" placeholder="<?php echo $retailer['facebook'];?>" type="text">

          <br>
          <p class="mg-b-10">On Instagram:</p>
          <input class="form-control" name="instagram" placeholder="<?php echo $retailer['instagram'];?>" type="text">

          <br>
          <p class="mg-b-10">On Twitter:</p>
          <input class="form-control" name="twitter" placeholder="<?php echo $retailer['twitter'];?>" type="text">
         
         <br>
          <p class="mg-b-10">On Whatsapp:</p>
          <input class="form-control" name="whatsapp" placeholder="<?php echo $retailer['whatsapp'];?>" type="text">
          <br>
          <br>
          <br>
          </div>
          <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
        <button type="submit" name="submit" class="btn btn-success btn-block">Edit Profile</button>
        </div>
        </form>
          
      </div>
      <?php endforeach;?>
    </div>
          </div>

<?php
  include_once "footer.php";
?>

<script>
$(function() {
        // add input listeners
        google.maps.event.addDomListener(window, 'load', function () {
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            // var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#origin').val(from_address);
            });

            // google.maps.event.addListener(to_places, 'place_changed', function () {
            //     var to_place = to_places.getPlace();
            //     var to_address = to_place.formatted_address;
            //     $('#destination').val(to_address);
            // });

        });
});
</script>