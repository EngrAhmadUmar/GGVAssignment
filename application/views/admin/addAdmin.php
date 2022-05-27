<?php
  include_once "headeradmin.php";
?>
<?php
  include_once "sidebar.php";
?>
</div><!-- az-content-left -->
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="az-content-breadcrumb">
        <span>Add Reciever Location</span>
        <span>Add Reciever Location</span>
    </div>
    <hr class="mg-y-30">

    <div class="az-content-label mg-b-5">Reciever Information</div>
    <br>
    <form method="POST" action="<?php echo base_url();?>admin/addReciever" enctype="multipart/form-data">
        <div class="col-lg mg-t-10 mg-lg-t-0">
            <p class="mg-b-10">Reciever Longitude:</p>
            <input class="form-control" name="longitude" placeholder="Please Input Reciever Longitude" type="text">
            <br>
            <p class="mg-b-10">Reciever Latitude:</p>
            <input class="form-control" name="latitude" placeholder="Please Input Reciever Longitude" type="text">

            <br>

            <p class="mg-b-10">Reciever Coverage Radius(m):</p>
            <input class="form-control" name="radius" placeholder="Please Enter Reciever Coverage Radius(m)"
                type="number">

            <br>

        </div>
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
            <button type="submit" name="submit" class="btn btn-success btn-block">Add Reciever</button>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </form>
    <br>
    <br>



</div>
</div>


<?php
  include_once "footer.php";
?>