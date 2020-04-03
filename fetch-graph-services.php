<?php
// Set the JSON header
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "test_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, caller, callee FROM datamain"; // can edit query for fetch here
$result = mysqli_query($conn, $sql);
$arr=array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $obj = array('id'=> $row["id"] , 'caller'=> $row['caller'], 'callee'=> $row['callee']);
        print_r($obj);
        array_push($arr, $obj);
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

echo json_encode($arr);
?>