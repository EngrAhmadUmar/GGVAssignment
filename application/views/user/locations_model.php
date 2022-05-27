<?php
require("db.php");


// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}
if(isset($_GET['confirm_location'])) {
    confirm_location();
}



function add_location(){
    $con=mysqli_connect ("localhost", 'root', '','ggv');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO locations " .
        " (id, latitude, longitude) " .
        " VALUES (NULL, '%s', '%s', '%s');",
        mysqli_real_escape_string($con,$latitude),
        mysqli_real_escape_string($con,$longitude));

    $result = mysqli_query($con,$query);
    echo"Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}
function confirm_location(){
    $con=mysqli_connect ("localhost", 'root', '','ggv');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $id =$_GET['id'];
    $confirmed =$_GET['confirmed'];
    // update location with confirm if admin confirm.
    $query = "update locations set status = $confirmed WHERE id = $id ";
    $result = mysqli_query($con,$query);
    echo "Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}
function get_confirmed_locations(){
    $con=mysqli_connect ("localhost", 'root', '','ggv');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with status if admin status.
    $sqldata = mysqli_query($con,"
select id ,latitude,longitude, radius,status as isconfirmed
from locations WHERE  status = 1
  ");

    $rows = array();

    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }

    $indexed = array_map('array_values', $rows);
    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
function get_all_locations(){
    $con=mysqli_connect ("localhost", 'root', '','ggv');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with status if admin status.
    $sqldata = mysqli_query($con,"
select id ,latitude,longitude, radius, status as isconfirmed
from locations
  ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
  $indexed = array_map('array_values', $rows);
  //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
function array_flatitudeten($array) {
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatitudeten($value));
        }
        else {
            $result[$key] = $value;
        }
    }
    return $result;
}

?>