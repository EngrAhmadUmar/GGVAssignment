</header>

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
      <div class="container">
        <div class="az-content-left az-content-left-components">
<div class="component-item">
<label>Profile</label>
            <nav class="nav flex-column">
              <a href="<?php echo base_url().'retailer/viewprofile';?>" class="nav-link">View Profile</a>
              <a href="<?php echo base_url().'retailer/profile';?>" class="nav-link">Edit Profile</a>
              <a href="<?php echo base_url().'retailer/changepassword';?>" class="nav-link">Change Password</a>
            </nav>

            <label>Manage Products</label>
            <nav class="nav flex-column">
              <a href="<?php echo base_url().'retailer/viewproduct';?>" class="nav-link">View Products</a>
              <a href="<?php echo base_url().'retailer/addproduct';?>" class="nav-link">Add Products</a>
              <a href="<?php echo base_url().'retailer/manageproduct';?>" class="nav-link">Manage Products</a>
            </nav>

            <label>Sales & Orders info</label>
            <nav class="nav flex-column">
              <a href="<?php echo base_url().'retailer/sales';?>" class="nav-link">View Sales</a>
              <a href="<?php echo base_url().'retailer/orders';?>" class="nav-link">View Orders</a>
            </nav>

            <label>Others</label>
            <nav class="nav flex-column">
              <a href="<?php echo base_url().'retailer/ticket';?>" class="nav-link">Submit a Ticket</a>
            </nav>
          </div>

