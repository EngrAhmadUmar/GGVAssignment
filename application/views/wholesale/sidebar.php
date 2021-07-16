</header>

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
      <div class="container">
        <div class="az-content-left az-content-left-components">
<div class="component-item">
            <label>Profile</label>
            <nav class="nav flex-column">
              <a href="<?php echo base_url().'wholesaler/viewprofile';?>" class="nav-link">View Profile</a>
              <a href="<?php echo base_url().'wholesaler/profile';?>" class="nav-link">Edit Profile</a>
              <a href="<?php echo base_url().'wholesaler/changepassword';?>" class="nav-link">Change Password</a>
            </nav>

            <label>Manage Store</label>
            <nav class="nav flex-column">
              <a href="<?php echo base_url().'wholesaler/viewproduct';?>" class="nav-link">View Products</a>
              <a href="<?php echo base_url().'wholesaler/addproduct';?>" class="nav-link">Add Products</a>
              <a href="<?php echo base_url().'wholesaler/manageproduct';?>" class="nav-link">Manage Products</a>
            </nav>

            <label>Sales & Orders info</label>
            <nav class="nav flex-column">
              <a href="<?php echo base_url().'wholesaler/sales';?>" class="nav-link">View Sales</a>
              <a href="<?php echo base_url().'wholesaler/orders';?>" class="nav-link">View Orders</a>
              <a href="a href="#" class="nav-link" data-toggle="modal" data-target="#deleterecords" class="nav-link">Delete Records</a>
            </nav>

            <label>Others</label>
            <nav class="nav flex-column">
              <a href="<?php echo base_url().'wholesaler/ticket';?>" class="nav-link">Submit a Ticket</a>
            </nav>
          </div>

<div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>Click <a href="#" role="button" class="btn btn-danger" title="Popover title" data-content="Popover body content is set in this attribute.">HERE</a> if you are sure you want to delete your account with us.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleterecords" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>Click <a href="#" role="button" class="btn btn-danger" title="Popover title" data-content="Popover body content is set in this attribute.">HERE</a> if you are sure you want to delete your all your records.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- </header> -->