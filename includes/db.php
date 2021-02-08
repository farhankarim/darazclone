<?php 

//connect to mysql
$conn = mysqli_connect("localhost", "root", "");
//connect to database
$db = mysqli_select_db($conn, "navttc");
if ($db) {
    echo "<script>console.log('Connection succesful');</script>";
} else {
    echo "<script>console.log('Connection failed');</script>";
    
}
?>