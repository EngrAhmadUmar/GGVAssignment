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
            <span>Add News</span>
          </div>
          <hr class="mg-y-30">

          <div class="az-content-label mg-b-5">Product Information</div>
          <br>
          <form method="POST" action="<?php echo base_url();?>admin/addNewsFunction" enctype="multipart/form-data">
          <div class="col-lg mg-t-10 mg-lg-t-0">
            <p class="mg-b-10">News Title:</p>
              <input class="form-control" name="title" placeholder="Please input news title" type="text">

              <br>
              <p class="mg-b-10">Content:</p>
              <textarea rows="5" class="form-control" name="content" placeholder="Please input news content" type="text"></textarea>
              <br>


          <div class="row row-sm">
                <div class="col-sm-7 col-md-6 col-lg-4">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image">
                    <label class="custom-file-label" for="customFile">Choose Main Image</label>
                  </div>
                </div><!-- col -->
              </div>

            
            </div>

          <hr class="mg-y-30">

          
        
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
        <button type="submit" name="submit" class="btn btn-success btn-block">Add News</button>
        </div>
        </form>
        <br>

       

      </div>
    </div>


<?php
  include_once "footer.php";
?>