<?php
  include_once "headeradmin.php";
?>
<?php
  include_once "sidebar.php";
?>
</div><!-- az-content-left -->
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="az-content-breadcrumb">
        <span>My Profile</span>
        <span>Change Password</span>
    </div>
    <hr class="mg-y-30">

    <div class="az-content-label mg-b-5">Change Password</div>
    <br>
    <div class="col-lg mg-t-10 mg-lg-t-0">
        <form method="POST" action="<?php echo base_url();?>Auctioneer/changepasswordFunction" enctype="multipart/form-data">

            <p class="mg-b-10">Old Password</p>
            <input required class="form-control" name="oldpassword" placeholder="Please input your current password" type="password">
            <br>
            <p class="mg-b-10">New Password</p>
            <input required class="form-control" name="newpassword" placeholder="Please input your new password" type="password">
            <br>
            <p class="mg-b-10">Confirm Password</p>
            <input required class="form-control" name="confirmpassword" placeholder="Please confirm your new password" type="password">

           
    </div>
    <br>
    <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-success btn-block">Change Password</button>
    </div>
    </form>
    <br>



</div>
</div>


<?php
  include_once "footer.php";
?>