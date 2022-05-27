<?php
  include_once "headeradmin.php";
?>

<?php
  include_once "sidebar.php";
?>


<?php 
$var = $this->session->userdata;
?>

<?php
$retailers = $this->db->get_where('wholesaleuser', array('id' => $var['retailer_id']))->result_array();
foreach($retailers as $retailer):
$bussinessName = $retailer['bussinessName'];
endforeach;
?>
</div><!-- az-content-left -->
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="az-content-breadcrumb">
        <span>My Profile</span>
        <span>View Sales</span>
    </div>
    <hr class="mg-y-30">


    <!-- <div class="az-header"> -->
    <!-- <div class="container"> -->
    <div class="az-content-label mg-b-5">Sales details for April 2021</div>
    <p class="mg-b-20">Hover over rows to view more details</p>


    <div class="table-responsive">
        <br>
        <button style="background-color: #1c5ca7; margin-bottom:20px; width:auto;" class="btn btn-primary delete_all"
            onclick="exportTableToCSV('Sales Details <?php echo date('M d, Y');?>.csv')">Download CSV</button>
        <table class="table table-hover mg-b-0">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Unit</th>
                    <th>Product Price Per Unit</th>
                    <th>Product Purchase Price</th>
                    <th>Date</th>
                    <th>Total Purchase Price</th>
                    <th>Buyer Contact</th>
                    <th>Buyer Address</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Update Delivery Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
              $sales = $this->db->get_where('sales', array('sellername' => $bussinessName))->result_array();
              foreach($sales as $sale):
              ?>
                <tr>
                    <td><?php echo $sale['products'];?></td>
                    <td><?php echo $sale['unit'];?></td>
                    <td><?php echo $sale['subprice'];?></td>
                    <td><?php echo $sale['price'];?></td>
                    <td><?php echo $sale['date'];?></td>
                    <td><?php echo $sale['totalprice'];?></td>
                    <td><?php echo $sale['buyercontact'];?></td>
                    <td><?php echo $sale['destination'];?></td>
                    <td><?php echo $sale['status'];?></td>
                    <form method="POST" action="<?php echo base_url();?>retailer/orderstatus"
                        enctype="multipart/form-data">
                        <input class="form-control" name="productid" value="<?php echo $sale['id'];?>" type="hidden">
                        <td>
                            <select required class="form-control" name="order_status"
                                aria-label=".form-select-lg example">
                                <option selected>Delivery Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Processing">Processing</option>
                                <option value="Dispached">Dispached</option>
                            </select>
                        </td>
                        <td>
                            <?php if($sale['status'] == "failed"){?>
                            Payment Not Made Yet
                            <?php }elseif($sale['status'] == "Pending"){?>
                              Payment Not Made Yet
                            <?php }elseif($sale['status'] == "successful"){?>
                              <button type="submit" class="btn btn-info">Update Delivery Status</button>
                              <?php } ?>
                        </td>
                    </form>
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
<br>
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