<?php
include_once "conn.php";
//$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM employeetable WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Data Deleted';
 }
}
?>