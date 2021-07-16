</header>

<div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
    <div class="container">
        <div class="az-content-left az-content-left-components">
            <div class="component-item">
                <label>admin Management</label>
                <nav class="nav flex-column">
                    <a href="<?php echo base_url().'admin/index';?>" class="nav-link" style="text-align: left;">View All Users</a>
                    <a href="<?php echo base_url().'admin/deleteusers';?>" class="nav-link">Disable/Delete Retailer</a>
                    <a href="<?php echo base_url().'admin/deletewholesaleruser';?>" class="nav-link">Disable/Delete
                        Wholesaler</a>
                </nav>

                <label>Manage Store</label>
                <nav class="nav flex-column">
                    <a href="<?php echo base_url().'admin/viewproducts';?>" class="nav-link">View All Products</a>
                    <a href="<?php echo base_url().'admin/feature';?>" class="nav-link">Featured Products</a>
                    <a href="<?php echo base_url().'admin/disableDeleteProducts';?>" class="nav-link">Disable/Delete
                        Products</a>
                </nav>

                <label>Sales, Categories and Tickets</label>
                <nav class="nav flex-column">
                    <a href="<?php echo base_url().'admin/orders';?>" class="nav-link">Manage Orders</a>
                    <a href="<?php echo base_url().'admin/categories';?>" class="nav-link">Manage Categories</a>
                    <a href="<?php echo base_url().'admin/tickets';?>" class="nav-link">View Tickets</a>
                </nav>

                <label>Add News/Admin</label>
                <nav class="nav flex-column">
                    <a href="<?php echo base_url().'admin/addNews';?>" class="nav-link">Add News</a>
                    <a href="<?php echo base_url().'admin/addAdmin';?>" class="nav-link">Add admin</a>
                </nav>

                <label>Others</label>
                <nav class="nav flex-column">
                    <a href="<?php echo base_url().'admin/manageNews';?>" class="nav-link">Manage News</a>
                    <a href="<?php echo base_url().'admin/manageadmin';?>" class="nav-link">Manage Admins</a>
                </nav>
            </div>

            <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Click <a href="#" role="button" class="btn btn-danger" title="Popover title"
                                    data-content="Popover body content is set in this attribute.">HERE</a> if you are
                                sure you want to delete your account with us.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="deleterecords" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Records</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Click <a href="#" role="button" class="btn btn-danger" title="Popover title"
                                    data-content="Popover body content is set in this attribute.">HERE</a> if you are
                                sure you want to delete your all your records.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- </header> -->