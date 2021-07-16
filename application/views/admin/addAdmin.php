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
            <span>Add Admin Profile</span>
          </div>
          <hr class="mg-y-30">

          <div class="az-content-label mg-b-5">Admin Information</div>
          <br>
          <form method="POST" action="<?php echo base_url();?>admin/registerAdmin" enctype="multipart/form-data">
          <div class="col-lg mg-t-10 mg-lg-t-0">
            <p class="mg-b-10">Admin Username:</p>
              <input class="form-control" name="username" placeholder="Please Input Username" type="text">
              <br>
              <p class="mg-b-10">Admin Password:</p>
              <input class="form-control" name="password" placeholder="Please Input Admin Password" type="password">

              <br>

              <p class="mg-b-10">Confirm Password:</p>
              <input class="form-control" name="confirmpassword" placeholder="Please Confirm Admin Password" type="password">

              <br>
          
          </div>
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
        <button type="submit" name="submit" class="btn btn-success btn-block">Add Admin</button>
        </div>
        </form>
        <br>

       

      </div>
    </div>


<?php
  include_once "footer.php";
?>