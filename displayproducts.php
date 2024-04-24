<!DocType>
<html>
<head>
<title>Display Products</title>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<script src="https://kit.fontawesome.com/767eb27502.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
	<h1 style="text-align:center;">Display Products</h1>
	<form name="searchform" action="displayproducts.php" method="GET" class="form-inline">
	<div class="form-group">
	<input type="text" name="txtsearch" value="" class="form-control" placeholder="Enter Text Here">
	</div>
	
	<div class="form-group">
	<input type="submit" name="btnsearch" value="Search" class="btn btn-success">
	<input type="submit" name="btnshowall" value="Show All" class="btn btn-success">
    </div>


	</form>


<div class="table-responsive">
<table border="1" cellspacing="0" cellpadding="0"
align="center" class="table table-striped table-hover table-bordered">

<?php
include'connection.php';
$qry="";

if(isset($_REQUEST["btnsearch"]))
{
$q=$_REQUEST["txtsearch"];
$qry="SELECT * FROM product_details WHERE pname LIKE '%$q%'";
}
else if(isset($_REQUEST["btnshowall"]))	
{
$q=$_REQUEST["txtsearch"];
$qry="SELECT * FROM product_details";
}
else
{
$qry="SELECT * FROM product_details";
}
	
$result=mysqli_query($con,$qry);
if(mysqli_affected_rows($con)>0)
{
echo"<tr>
<td>Product ID</td>
<td>Name</td>
<td>Image</td>
<td>Code</td>
<td>Price</td>
<td>Category</td>
<td>Quantity</td>
<td>Description</td>
<td>Edit</td>
<td>Remove</td>
</tr>";


while($record=mysqli_fetch_array($result))
{
	echo"<tr>
<td>".$record["pid"]."</td>
<td>".$record["pname"]."</td>
<td><img src='uploads/".$record["pimage"]."' class='img-fluid img-thumbnail'></td>
<td>".$record["pcode"]."</td>
<td>".$record["price"]."</td>
<td>".$record["pcat"]."</td>
<td>".$record["quantity"]."</td>
<td>".$record["pdesc"]."</td>
<td><a href='update.php?pid=".$record["pid"]."' style='color:#336699;'><i class='fas fa-edit'></i></a></td>
<td><a href='delete.php?pid=".$record["pid"]."' style='color:#ff0000;'><i class='fas fa-trash-alt'></i></a></td>
</tr>";
}
}

else
{
	echo"<h3>No Record Found!!</h3>";
}
?>

</table>
</div>

</div>
<div class="col-md-2"></div>
</div>
</div>




<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>
</html>