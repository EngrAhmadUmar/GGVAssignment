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
            <span>Manage Admin</span>
          </div>
          <hr class="mg-y-30">

  <div class="az-content-label mg-b-5">Manage Accounts with Admin Abilities</div>
          <p class="mg-b-20">Hover over rows to view more details</p>

          <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Delete News</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $news = $this->db->get('news')->result_array();
                    foreach($news as $new):
                ?>
                <tr>
                  <th scope="row"><?php echo $new['id'];?></th>
                  <td><?php echo $new['title'];?></td>
                  <td><?php echo $new['content'];?></td>
                  <td><a href="<?php echo base_url().'admin/deleteNewsFunction/'.$new['id'];?>"><img src="https://img.icons8.com/flat-round/24/000000/delete-sign.png"/></a></td>
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
