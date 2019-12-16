<?php
session_start();
include('Connect.php');
include('header.php');

if(isset($_POST['btnLogin']))
{
	$email=$_POST['txtEmail'];
	$password=$_POST['txtPassword'];

	$select="SELECT * 
			FROM Admin
			WHERE Email='$email'
			AND Password='$password'";
	$query=mysqli_query($connect,$select);
	$count=mysqli_num_rows($query);
	if($count>0)
	{
		$data=mysqli_fetch_array($query);
		$AdminID=$data['AdminID'];
		$AdminName=$data['AdminName'];
		$_SESSION['aid']=$AdminID;
		$_SESSION['aname']=$AdminName;
		
		echo "<script>
				window.alert('Admin Login Successfully')
				window.location='AdminHome.php'
		</script>";
	}
	else
	{
		echo "<script>
				window.alert('Admin Login Fail')
				window.location='AdminLogin.php'
		</script>";
	}
}
?>
<html>
	<head>
		<title>Login Form</title>
	</head>
	<body>
		<form action="AdminLogin.php" method="post"/>
			<table>
				<tr>
					<td>Email</td>
					<td><input type="email" name="txtEmail" placeholder="Type Email"/>
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
<?php 	

include('footer.php');
 ?>