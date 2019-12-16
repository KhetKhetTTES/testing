<?php
session_start();
include('Connect.php');

if(isset($_SESSION['count']))
	{
		$count=$_SESSION['count'];
		if($count==3)
		{
			echo "<script>
					alert('3 Time Login Fail')
					window.location='LoginTimer.php'
				</script>";

		}
	}
if(isset($_POST['btnLogin']))
{
	$email=$_POST['txtEmail'];
	$password=$_POST['txtPassword'];

	$select="SELECT * 
			FROM Customer
			WHERE Email='$email'
			AND Customerpassword='$password'";
	$query=mysqli_query($connect,$select);
	$count=mysqli_num_rows($query);
	if($count>0)
	{
		$data=mysqli_fetch_array($query);
		$CustomerID=$data['CustomerID'];
		$CustomerName=$data['CustomerName'];
		$_SESSION['cid']=$CustomerID;
		$_SESSION['cname']=$CustomerName;
		
		echo "<script>
				window.alert('Login Successfully')
				window.location='Display.php'
		</script>";
	}
	else
	{
		if(isset($_SESSION['count']))
			{
				$_SESSION['count']++;
			}
			else
			{
				$_SESSION['count']=1;
			}
		echo "<script>
				window.alert('Login Fail')
				window.location='Login.php'
		</script>";
	}
}
?>
<html>
	<head>
		<title>Login Form</title>
	</head>
	<body>
		<form action="Login.php" method="post"/>
			<table>
				<tr>
					<td>Email</td>
					<td><input type="text" name="txtEmail" placeholder="Type Email"/>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="txtPassword" placeholder="Type Password"/>
				</tr>
				<tr>
					<td><input type="submit" name="btnLogin" value="Login"/></td>

				</tr>
			</table>
			
	</body>
</html>