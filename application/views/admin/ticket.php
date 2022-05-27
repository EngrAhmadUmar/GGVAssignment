<?php
  include_once "headeradmin.php";
?>

<?php
  include_once "sidebar.php";
?>

</div><!-- az-content-left -->
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
            <span>Admin</span>
            <span>View Tickets</span>
          </div>
          <hr class="mg-y-30">

  <div class="az-content-label mg-b-5">Tickets</div>
          <p class="mg-b-20">Hover over rows to highlight</p>

          <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                  <th>Account Name</th>
                  <!-- <th>Account Email</th> -->
                  <th>Subject</th>
                  <th>Explanation</th>
                  <th>Date</th>
                  <!-- <th>Query Status</th>
                  <th>Query Reply</th>
                  <th>Reply Date</th>
                  <th>Reply Query</th> -->
                </tr>
              </thead>
              <tbody>
              <?php
              $tickets = $this->db->get('ticket')->result_array();
              foreach($tickets as $ticket):
              ?>
                <tr>
                  <td><?php echo $ticket['accountName'];?></td>
                  <!-- <td><?php echo $ticket['email'];?></td> -->
                  <td><?php echo $ticket['subject'];?></td>
                  <td><?php echo $ticket['explanation'];?></td>
                  <td><?php echo $ticket['date'];?></td>
                  <!-- <td><?php echo $ticket['status'];?></td>
                  <td><?php echo $ticket['reply'];?></td>
                  <td><?php echo $ticket['replydate'];?></td> -->
                  <!-- <?php if($ticket['status'] == "Attended"){?>
                  <td><button type="button" class="btn btn-dark">Replied</button></td>
                  <?php }else{?>
                    <td> <a href="<?php echo base_url().'admin/replyticket/'.$ticket['id'];?>"><button type="button" class="btn btn-info">Reply</button></a></td>
                  <?php } ?> -->
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <br>
        <br>
      </div>
    </body>
  <?php
  include_once "footer.php";
?>