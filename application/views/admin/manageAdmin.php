<?php
  include_once "headeradmin.php";
?>

<?php
  include_once "sidebar.php";
?>

</div><!-- az-content-left -->
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="az-content-breadcrumb">
        <span>Recievers</span>
        <span>Manage Recievers</span>
    </div>
    <hr class="mg-y-30">

    <div class="az-content-label mg-b-5">Manage Recievers</div>
    <!-- <p class="mg-b-20">Hover over rows to view more details</p> -->

    <div class="table-responsive">
        <table class="table table-hover mg-b-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reciever Longitude</th>
                    <th>Reciever Latitude</th>
                    <th>Reciever Coverage Radius</th>
                    <th>Status</th>
                    <th>Delete Reciever</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $admins = $this->db->get('locations')->result_array();
                    foreach($admins as $admin):
                      $i = 1;
                ?>
                <tr>
                    <th scope="row"><?php echo $i++;?></th>
                    <td><?php echo $admin['longitude'];?></td>
                    <td><?php echo $admin['latitude'];?></td>
                    <td><?php echo $admin['radius'];?></td>
                    <td>
                        <?php if($admin['status']==1){ ?>
                        <a href="<?php echo base_url().'admin/deactivateAdmin/'.$admin['id'];?>"><button
                                class="btn btn-secondary btn-sm" style="background-color:#e01e1e;">Deactivate
                                Reciever</button></a>
                        <?php }elseif($admin['status']==0) { ?>
                        <a href="<?php echo base_url().'admin/activateAdmin/'.$admin['id'];?>"><button
                                class="btn btn-secondary btn-sm">Activate Reciever</button></a>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/deleteAdmin/'.$admin['id'];?>"><img
                                src="https://img.icons8.com/flat-round/24/000000/delete-sign.png" /></a></td>
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