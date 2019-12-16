<?php 	
		session_start();
		include('Connect.php');
	if(isset($_REQUEST['pid']))
	{
			$productid=$_REQUEST['pid'];	
			$select="SELECT * FROM Product where ProductID='$productid'";
			$ret=mysqli_query($connect,$select);
			$data=mysqli_fetch_array($ret);
			$productname=$data['ProductName'];
			$enginepower=$data['EnginePower'];
			$color=$data['Color'];
			$ProductType=$data['ProductType'];
			$price=$data['Price'];
			$quantity=$data['Quantity'];
			$description=$data['Description'];
			$productimage=$data['ProductImage'];
}

if(isset($_POST['btnorder']))
{
	$orderdate=date('d-M-Y');
	$discoutpercent=$_REQUEST['discount'];
	$discountamount=$_REQUEST['amount'];
	$originalprice=$_REQUEST['txtprice'];
	$customerid=$_SESSION['cid'];
	$custstatus="Old";
	$netamount=$originalprice-$discountamount;

	 $insert="Insert into Orders(OrderDate,DiscountPercent,DiscountAmount,Price,CustomerID)
	 values('$orderdate','$discoutpercent','$discountamount','$netamount','$customerid')";
	 $query=mysqli_query($connect,$insert);

	 $update="Update Customer set CustomerStatus='$custstatus' 
	 where CustomerID='$customerid'";
	 $query=mysqli_query($connect,$update);
	 if($query)
	 {
	 	echo "<script>
					window.alert('Successful Order')
					window.location='Display.php'
			</script>";
	 }

}

?>                           
<html>
<head>
	<title>	</title>
</head>
<body>
		<form action="ProductDetail.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="txtprice" value="<?php 	echo $price ?>">	
				<table>	
						<tr>	
								<td>
									<img src="<?php echo $productimage ?>" width="400px" height="400px">	
							
								</td>

								<td>	
										<table width="300px" height="300px">	
												<tr>	
														<td> Product Name	</td>
														<td>: <?php 	echo $productname ?></td>	
												</tr>	
												<tr>	
														<td> Engine Power	</td>
														<td>	:<?php 	echo $enginepower ?></td>
												</tr>
												<tr>	
														<td>	Color </td>
														<td>	:<?php 	echo $color ?></td>	
												</tr>
												<tr>	
														<td>	Product Type</td>
														<td>	:<?php 	echo $ProductType ?></td>	
												</tr>
												<tr>	
														<td>	Price </td>
														<td>	<?php 	echo $price ?></td>	
												</tr>
												<tr>	
														<td>	Quantity</td>
														<td>	<?php 	echo $quantity ?></td>	
												</tr>
												<tr>	
														<td>	Description</td>
														<td>	<?php 	echo $description	 ?></td>	
												</tr>	



										</table>

								</td>
						</tr>	
				</table>	
				<table align="center" width="400px" height="100px" border="1px">

						<tr>	
								<td>	Order Date</td>
								<td>	: <?php 	echo date('d-M-Y') ?></td>
						</tr>	
							<?php 	
								if(isset($_SESSION['cid']))
								{
										$cusid=$_SESSION['cid'];
										$select="SELECT * from Customer where CustomerID='$cusid'";
										$query=mysqli_query($connect,$select);
										$data=mysqli_fetch_array($query);
										$status=$data['CustomerStatus']	;
										if ($status=='New')
										{
											echo "<tr>";
											echo "<td>Discount</td>";
											echo "<td>:<span  style='font-weight:bold; font-size:30px;color:red;'>15%</span>
												<input type='hidden' name='discount' value='15%'>
											</td>";
											echo "</tr>";

											$amount=0;
											$amount=$price * 0.15;
											echo "<tr>";
											echo "<td>Discount Amount</td>";
											echo "<td>:$amount
												<input type='hidden' name='amount' value='$amount'>
											</td>";
											echo "</tr>";
										}
										else
										{
											echo "<tr>";
											
											echo "<td colspan='2' align='center'><span  style='font-weight:bold; font-size:30px;color:red;'>Not Available Discount</span>
												<input type='hidden' name='discount' value='0'>
											</td>";
											echo "</tr>";

										}
								}


							 ?>
						
						
							 	<tr>	
							 			<td>	</td>
							 			<td>
	<input type="submit" value="Order Confirm" name="btnorder">	
							 			</td>
							 	</tr>	
				</table>
		</form>
</body>
</html>