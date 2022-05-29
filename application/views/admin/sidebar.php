</header>

<div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
    <div class="container">
        <div class="az-content-left az-content-left-components">
            <div class="component-item">
                <label>Reciever Management</label>
                <nav class="nav flex-column">
                    <a href="<?php echo base_url().'admin/manageadmin';?>" class="nav-link">Manage Recievers</a>
                    <br>
                    <a href="<?php echo base_url().'admin/addAdmin';?>" class="nav-link">Add Reciever</a>
                </nav>


                <!-- <label>Others</label>
                <nav class="nav flex-column">
                    <!-- <a href="<?php echo base_url().'admin/manageNews';?>" class="nav-link">Manage News</a> -->

                <!-- <br> -->
                <!-- <a href="<?php echo base_url().'Auctioneer/logout';?>" class="nav-link">Logout</a>
                </nav> -->
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