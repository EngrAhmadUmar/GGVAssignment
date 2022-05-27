<?php
  include_once "headeradmin.php";
?>

<?php
  include_once "sidebar.php";
?>

</div><!-- az-content-left -->
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
            <span>Users</span>
            <span>View All Users</span>
          </div>
          <hr class="mg-y-30">

  <div class="az-content-label mg-b-5">All Users</div>
          <p class="mg-b-20">Hover over rows to view more details</p>

          <div class="table-responsive">
          <!-- <button style="background-color: #1c5ca7; margin-bottom:20px; width:auto;" class="btn btn-primary delete_all"
            onclick="exportTableToCSV('All Users Sheet <?php echo date('M d, Y');?>.csv')">Download CSV</button> -->
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                  <th>Bussiness Name</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <!-- <th>Account Type</th> -->
                  <!-- <th>Bussiness Type</th> -->
                  <th>Address</th>
                  <th>Account Status</th>
                  <th>Date Joined</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $wholesaleusers = $this->db->get_where('wholesaleuser')->result_array();
foreach($wholesaleusers as $wholesaleuser):
?>
                <tr>
                  <td><?php echo $wholesaleuser['bussinessName'];?></td>
                  <td><?php echo $wholesaleuser['phoneNumber'];?></td>
                  <td><?php echo $wholesaleuser['email'];?></td>
                  <!-- <td>Auctioneer</td> -->
                  <!-- <td><?php echo $wholesaleuser['bussinessType'];?></td> -->
                  <td><?php echo $wholesaleuser['bussinessaddr1'];?></td>
                  <td><?php echo $wholesaleuser['status'];?></td>
                  <td><?php echo $wholesaleuser['date'];?></td>
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


<script>
function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {
        type: "text/csv"
    });

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}

function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");

    for (var i = 0; i < rows.length; i++) {
        var row = [],
            cols = rows[i].querySelectorAll("td, th");

        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);

        csv.push(row.join(","));
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
</script>