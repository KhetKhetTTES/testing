<?php 
	session_start();
	include('Connect.php');
	if(isset($_SESSION['cid']))
	{
		$customerid=$_SESSION['cid'];

		$select="SELECT * FROM Customer 
		where CustomerID='$customerid'";

		$query=mysqli_query($connect,$select);
		$data=mysqli_fetch_array($query);
		$customerid=$data['CustomerID'];
		$Customername=$data['Customername'];
		$Email=$data['Email'];
		$Date_of_brith=$data['Date_of_brith'];
		$Customerpassword=$data['Customerpassword'];
		$PostalAddress=$data['PostalAddress'];
		$Phno=$data['Phno'];

	}
	else
	{
		echo "<script>
				window.alert('Login Again')
				window.location='Login.php'
		</script>";
	}
if(isset($_POST['btnupdate']))
{
	$txtcustomerid=$_POST['txtcustomerid'];
	$txtcustomername=$_POST['txtcustomername'];
	$txtemail=$_POST['txtemail'];
	$txtdate=$_POST['txtdate'];
	$txtpassword=$_POST['txtpassword'];
	$txtaddress=$_POST['txtaddress'];
	$txtphone=$_POST['txtphone'];

$update=''


}
?>

<html>
<head>
	<title></title>
</head>
<body>
	<form action="EditCustomer.php" method="POST">
		<input type="hidden" name="txtcustomerid" value="<?php echo $customerid ?>">
		<table>
			<tr>
				<td>Customer Name</td>
				<td>
					<input type="text" name="txtcustomername" value="<?php echo $Customername ?>" required>
				</td>
			</tr>
			<tr>
				<td>Email Address</td>
				<td>
			<input type="email" name="txtemail" value="<?php echo $Email ?>" required>
				</td>
			</tr>
			<tr>
				<td>Date of Birth</td>
				<td>
					<input type="text" name="txtdate" value="<?php echo $Date_of_brith ?>" required>
				</td>
			</tr>
			<tr>
				<td>Customer Password</td>
				<td>
			<input type="password" name="txtpassword" value="<?php echo $Customerpassword ?>" required>
				</td>
			</tr>
			<tr>
				<td>Postal Address</td>
				<td>
		<input type="text" name="txtaddress" value="<?php echo $PostalAddress ?>" required>
				</td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td>
					<input type="text" name="txtphone" value="<?php echo $Phno ?>" required>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
			<input type="submit" name="btnupdate" value="Update">
				</td>
			</tr>
			
		</table>
	</form>
</body>
</html>