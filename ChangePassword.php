<?php 
	session_start();
	include('Connect.php');
	if(isset($_SESSION['cid']))
	{
		$customerid=$_SESSION['cid'];
	}
	else
	{
		echo "<script>
				window.alert('Login Again')
				window.location='Login.php'
		</script>";
	}
	if(isset($_POST['btnchange']))
	{
		$oldpassword=$_POST['txtold'];
		$newpassword=$_POST['txtnew'];
		$select="SELECT * FROM Customer
		 where CustomerID='$customerid'";
		 $query=mysqli_query($connect,$select);
		$count=mysqli_num_rows($query);
		if($count>0)
		{
			$data=mysqli_fetch_array($query);
			$Customerpassword=$data['Customerpassword'];
			if($Customerpassword!=$oldpassword)
			{
				echo "<script>
					window.alert('Not match Old Password')
				</script>";
			}
			else 
			{
				$update="UPDATE Customer set Customerpassword='$newpassword'
				where CustomerID='$customerid'";
				$query=mysqli_query($connect,$update);
				if($query)
				{
					echo "<script>
					window.alert('Password Update')
					</script>";
				}
			}
		}
	}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="ChangePassword.php" method="POST">
	<table>
		<tr>
			<td>Old Password</td>
			<td>
				<input type="password" name="txtold" placeholder="Enter Old Password" required>
			</td>
		</tr>
		<tr>
			<td>New Password</td>
			<td>
				<input type="password" name="txtnew" placeholder="Enter New Password" required>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" value="Change" name="btnchange">
			</td>
		</tr>
	</table>
	</form>
</body>
</html>