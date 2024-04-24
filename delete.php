<?php
include'connection.php';
$pid=$_REQUEST["pid"];
$qry="DELETE FROM product_details WHERE pid=$pid";
mysqli_query($con,$qry);
header("Location:displayproducts.php");
?>






