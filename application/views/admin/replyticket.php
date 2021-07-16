<?php
  include_once "headeradmin.php";
?>

<?php
  include_once "sidebar.php";
?>

</div><!-- az-content-left -->
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="az-content-breadcrumb">
        <span>Ticket</span>
        <span>Reply Ticket</span>
    </div>
    <hr class="mg-y-30">
        <?php
              $tickets = $this->db->get_where('ticket', array('id' => $ticketid))->result_array();
        foreach($tickets as $ticket):
        ?>
    <div class="az-content-label mg-b-5">Reply to <?php echo $ticket['accountName'];?>'s ticket</div>
    <br>
    <div class="col-lg mg-t-10 mg-lg-t-0">
        <form method="POST" action="<?php echo base_url();?>admin/replyticketFunction" enctype="multipart/form-data">

             <p class="mg-b-10">Subject:</p>
              <input class="form-control" placeholder="<?php echo $ticket['subject'];?>" readonly="" type="text">


              <input class="form-control" name="id" value="<?php echo $ticket['id'];?>" readonly="" type="hidden">

              <input class="form-control" name="accountType" value="<?php echo $ticket['userType'];?>" readonly="" type="hidden">

              <input class="form-control" name="name" value="<?php echo $ticket['accountName'];?>" readonly="" type="hidden">

              <input name='message' value="<?php echo $ticket['explanation'];?>" type="hidden">
              
              <br>
              <p class="mg-b-10"> Description:</p>
              <textarea rows="3" class="form-control" placeholder="<?php echo $ticket['explanation'];?>" readonly=""></textarea>
              <br>

            <br>
            <p class="mg-b-10">Reply:</p>
            <textarea rows="3" name="reply" class="form-control" placeholder="2000 characters max"></textarea>
    </div>
    <br>
    <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-success btn-block">Reply Ticket</button>
    </div>
    </form>
    </body>
    <?php endforeach;?>
</div>
</div>
<?php
  include_once "footer.php";
?>