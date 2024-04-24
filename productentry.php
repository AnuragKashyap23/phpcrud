<!DocType>
<html>
<head>
<title>Product Entry</title>
</head>
<body>
<h1 style="text-align:center;">Product Entry Page</h1>
<form name="productform" method="POST" action="productentry.php" enctype="multipart/form-data">
<table cellspacing="0" cellpadding="5px" align="center">
<tr>
<td>Product Name</td>
<td>
<input type="text" name="txtname" value="" placeholder="Product Name" required>
</td>
</tr>

<tr>
<td>Product Code</td>
<td>
<input type="text" name="txtcode" value="" placeholder="Product Code" required>
</td>
</tr>

<tr>
<td>Product Price</td>
<td>
<input type="text" name="txtprice" value="" placeholder="Product Price" required>
</td>
</tr>


<tr>
<td>Product Category</td>
<td>
<select name="pcat" required>
<option value="">--Select--</option>
<?php
include'connection.php';
$qry="SELECT * FROM category ORDER BY catname";
$res=mysqli_query($con,$qry);
while($row=mysqli_fetch_array($res))
{
echo"<option value='".$row["catname"]."'>".$row["catname"]."</option>";	
}
?>
</select>
</td>
</tr>

<tr>
<td>Product Quantity</td>
<td>
<input type="text" name="txtquantity" value="" placeholder="Product Quantity">
</td>
</tr>


<tr>
<td>Product Description</td>
<td>
<textarea cols="20" rows="6" name="txtdesc" placeholder="Product Description"></textarea>
</td>
</tr>

<tr>
<td>Product Image</td>
<td>
<input type="file" name="upload" value="" accept="image/png, image/jpeg, image/jpg">
</td>
</tr>

<tr>
<td align="right">
<input type="submit" name="btnsave" value="Save">
</td>
<td align="left">
<input type="reset" name="btnclear" value="Clear">
</td>
</tr>
</table>
</form>
<?php
if(isset($_REQUEST["btnsave"]))
{
$pname=$_REQUEST["txtname"];
$pcode=$_REQUEST["txtcode"];
$quantity=$_REQUEST["txtquantity"];
$category=$_REQUEST["pcat"];
$price=$_REQUEST["txtprice"];
$description=$_REQUEST["txtdesc"];

$source=$_FILES["upload"]["tmp_name"];
$target="uploads/".$_FILES["upload"]["name"];

if(move_uploaded_file($source,$target))
{
include'connection.php';
$image=$_FILES["upload"]["name"];
$qry="INSERT INTO product_details (pname,pcode,price,pcat,quantity,pdesc,pimage)
VALUES ('$pname','$pcode','$price','$category','$quantity','$description','$image')";
if(mysqli_query($con,$qry))
{
echo"<h1>Record Saved Successfully!!!!</h1>";
}
else
{
	echo"Error Occurred ".mysqli_error($con);
}
}
else
{
	echo"File Uploading Error";
}


}
?>

</body>
</html>

