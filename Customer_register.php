<?php 
	include('Connect.php');
	
	if(isset($_POST['btnregister']))
	{
	
		$customername=$_POST['txtcustomername'];
		$email=$_POST['txtemail'];
		$txtdate=$_POST['txtdate'];
		$password=$_POST['txtpassword'];
		$phonenumber=$_POST['txtphone'];
		$address=$_POST['txtaddress'];

		$insert="INSERT INTO Customer(Customername,Email,Customerpassword,Phno,PostalAddress) 
		values('$customername','$email',
			'$password','$phonenumber','$address')";

		$query=mysqli_query($connect,$insert);
		if($query)
		{
			echo "<script>alert('Customer Save Successful')
						window.location='Login.php'</script>";
		}
		else
		{
			echo mysqli_error($connect);
		}

	}

?>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="Customer_register.php" method="POST">
		<table>
			<tr>
				<td>Customer Name</td>
				<td>
					<input type="text" name="txtcustomername" required>
				</td>
			</tr>
			<tr>
				<td>Email Address</td>
				<td>
			<input type="email" name="txtemail" required>
				</td>
			</tr>
			<tr>
				<td>Date of Birth</td>
				<td>
					<input type="text" name="txtdate" required>
				</td>
			</tr>
			<tr>
				<td>Customer Password</td>
				<td>
			<input type="password" name="txtpassword" required>
				</td>
			</tr>
			<tr>
				<td>Postal Address</td>
				<td>
		<input type="text" name="txtaddress" required>
				</td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td>
					<input type="text" name="txtphone" required>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
			<input type="submit" name="btnregister" value="Register">
				</td>
			</tr>
			
		</table>
	</form>
</body>
</html>