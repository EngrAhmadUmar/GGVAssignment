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
            <span>Submit Ticket</span>
          </div>
          <hr class="mg-y-30">

          <div class="col-lg mg-t-10 mg-lg-t-0">
        <form method="POST" action="<?php echo base_url();?>retailer/ticketsend" enctype="multipart/form-data">

            <p class="mg-b-10">Subject</p>
            <input class="form-control" name="subject" placeholder="Please ticket subject" type="text">

            <br>
            <p class="mg-b-10">Explanation</p>
            <textarea rows="3" name="explanation" class="form-control" placeholder="2000 characters max"></textarea>

    </div>
    <br>
    <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-success btn-block">Submit Ticket</button>
    </div>
    </form>
    <br>


       

      </div>
    </div>


<?php
  include_once "footer.php";
?>