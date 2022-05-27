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
$Auctioneers = $this->db->get_where('wholesaleuser', array('id' => $var['Auctioneer_id']))->result_array();
foreach($Auctioneers as $Auctioneer):
$bussinessName = $Auctioneer['bussinessName'];
endforeach;
?>
</div><!-- az-content-left -->
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="az-content-breadcrumb">
        <span>My Profile</span>
        <span>View Bids</span>
    </div>
    <hr class="mg-y-30">


    <!-- <div class="az-header"> -->
    <!-- <div class="container"> -->
    <div class="az-content-label mg-b-5">Bid details</div>
    <p class="mg-b-20">Hover over rows to view more details</p>


    <div class="table-responsive">
        <br>
        <!-- <button style="background-color: #1c5ca7; margin-bottom:20px; width:auto;" class="btn btn-primary delete_all"
            onclick="exportTableToCSV('Sales Details <?php echo date('M d, Y');?>.csv')">Download CSV</button> -->
        <table class="table table-hover mg-b-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Bid</th>
                    <th>Product Name</th>
                    <th>Bid Status</th>
                    <!-- <th>Date</th> -->
                    <th>Accept Bid</th>
                    <th>Reject Bid</th>
                </tr>
            </thead>
            <tbody>
                <?php
              $sales = $this->db->get_where('bids', array('bussinessname' => $bussinessName))->result_array();
              foreach($sales as $sale):
              ?>
                <tr>
                    <td><?php echo $sale['name'];?></td>
                    <td><?php echo $sale['email'];?></td>
                    <td><?php echo $sale['phone'];?></td>
                    <td>RWF <?php echo $sale['bid'];?></td>
                    <td><?php echo $sale['productname'];?></td>
                    <td><?php if($sale['status'] == 1 ){echo "Bid Accepted"; } elseif ($sale['status'] == 0){echo "Bid Pending"; } else { echo "Bid Rejected"; }?></td>
                    <!-- <td><?php echo $sale['date'];?></td> -->
                    <td><a href="<?php echo base_url().'Auctioneer/acceptBid/'.$sale['id'];?>">Accept Bid</a></td>
                    <td><a href="<?php echo base_url().'Auctioneer/rejectBid/'.$sale['id'];?>">Reject Bid</a></td>
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