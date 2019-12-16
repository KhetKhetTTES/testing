<?php  
	include ('Connect.php');
	if (isset($_POST['btnsubmit'])) {
	$Email=$_POST['txtemail'];
	$Password=$_POST['txtpassword'];
	$select ="SELECT*FROM Customer
			WHERE Email='$Email'
			AND Password='$Password'";


			$query=mysql_query($Connect,$select);
			$count=mysql_num_rows($query);
			if ($Connect>0) {
				echo "<script> alert('Customer Login Sucessfully.')
				window.location='Home.php' </script>"	;
			}
			else 
			{
				echo "<script> 
				alert('Customer Login Sucessfully.')
				window.location='Home.php' </script>"	;

			}
}
?>


<html>
<head>
	<title></title>
</head>
<body>
	<form action="Customer.php" method= "POST">
		<table border="1" width="300px" height="300px" align="center">
			<tr> <td colspan="2" align="center"><h2>Login Form</h2></td></tr>
			<tr>
				<td>Email</td>
			<td><input type= "text" name="txtemail" required placeholder="Enter email">
				</td>

			</tr>
			<tr>
				<td>Password</td>
			<td><input type= "password" name="txtpassword"required placeholder="Enter password"></td>

			</tr>

<tr>
				<td><input type= "Submit" name="btnsubmit" value="Customer Log in"
					<a href="Customer_register.php">Register</a>>
				</td>

			</tr>


		</table>


	</form>

</body>
</html>