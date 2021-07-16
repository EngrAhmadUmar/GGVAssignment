<?php
  include_once "headeradmin.php";
?>

<?php
  include_once "sidebar.php";
?>

</div><!-- az-content-left -->
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
            <span>Profile</span>
            <span>View Products</span>
          </div>
          <hr class="mg-y-30">

  <div class="az-content-label mg-b-5">View Products Published To Your Store.</div>
          <p class="mg-b-20">Hover over rows to view more details</p>

          <div class="table-responsive">
          <button style="background-color: #1c5ca7; margin-bottom:20px; width:auto;" class="btn btn-primary delete_all"
            onclick="exportTableToCSV('All Products Sheet <?php echo date('M d, Y');?>.csv')">Download CSV</button>

            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Seller Name</th>
                  <th>Available Stock</th>
                  <th>Price</th>
                  <th>Date Added</th>
                </tr>
              </thead>
              <tbody>
              <?php
$products = $this->db->get('products')->result_array();
foreach($products as $product):
?>
                <tr>
                  <th scope="row"><?php echo $product['ID'];?></th>
                  <td><?php echo $product['name'];?></td>
                  <td><?php echo $product['sellername'];?></td>
                  <td><?php echo $product['availablestock'];?></td>
                  <td><?php echo $product['price'];?></td>
                  <td><?php echo $product['date'];?></td>
                </tr>
                <?php endforeach;?>
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