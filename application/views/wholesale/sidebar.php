</header>

<div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
    <div class="container">
        <div class="az-content-left az-content-left-components">
            <div class="component-item">
                <label>Profile</label>
                <nav class="nav flex-column">
                    <a href="<?php echo base_url().'Auctioneer/viewprofile';?>" class="nav-link">View Profile</a>
                    <br>
                    <a href="<?php echo base_url().'Auctioneer/profile';?>" class="nav-link">Edit Profile</a>
                    <br>

                </nav>

                <label>Manage Products</label>
                <nav class="nav flex-column">
                    <a href="<?php echo base_url().'Auctioneer/manageproduct';?>" class="nav-link">Manage Products</a>
                    <!-- <a href="<?php echo base_url().'Auctioneer/viewproduct';?>" class="nav-link">View Products</a> -->
                    <br>
                    <a href="<?php echo base_url().'Auctioneer/addproduct';?>" class="nav-link">Add Products</a>
                    <br>
                </nav>

                <label>Bids & Change Password</label>
                <nav class="nav flex-column">
                    <a href="<?php echo base_url().'Auctioneer/sales';?>" class="nav-link">View Bids</a>
                    <br>
                    <a href="<?php echo base_url().'Auctioneer/changepassword';?>" class="nav-link">Change Password</a>
                    <!-- <a href="<?php echo base_url().'Auctioneer/orders';?>" class="nav-link">View Orders</a> -->
                </nav>

                <label>Others</label>
                <nav class="nav flex-column">
                    <a href="<?php echo base_url().'Auctioneer/ticket';?>" class="nav-link">Submit a Ticket</a>
                    <br>
                    <a href="<?php echo base_url().'Auctioneer/logout';?>" class="nav-link">Logout</a>
                </nav>
            </div>