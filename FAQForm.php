<?php 	
		session_start();
		include('Connect.php');
		if(isset($_SESSION['cid']))
		{
			$customerid=$_SESSION['cid'];

			$select="SELECT * 
			FROM Customer
			WHERE  CustomerID='$customerid'";

		$query=mysqli_query($connect,$select);
		$data=mysqli_fetch_array($query);
		$CustomerName=$data['Customername'];
		$email=$data['Email'];
				}
		if(isset($_POST['btnQuestion']))
		{
				$txtquestion=$_POST['txtquestion'];
				$insert="INSERT INTO Question(CustomerID,QuestionName)
				values('$customerid','$txtquestion')";

				$query=mysqli_query($connect,$insert);
				if($query)
				{
					echo "<script>alert('Question Complete')
					window.location='FAQForm.php'</script>";
				}
		}

?>
<html>
<head>
	<title>	</title>
</head>
<body>
		<form action="FAQForm.php" method="POST">	
				<table  align="center" border="1px">	
						<tr>	
								<td>	User Name</td>
								<td>	
<input type="text" name="txtusername" value="<?php 	echo $CustomerName ?>" readonly>	
								</td>
						</tr>	
						<tr>	
								<td>	User Email</td>
								<td>	
<input type="text" name="txtemail" value="<?php 	echo $email ?>" readonly>	

								</td>
						</tr>	
						<tr>	
								<td>	Question</td>
								<td>
								<textarea name="txtquestion">	

								</textarea>

								</td>
						</tr>	
						<tr>	
								<td>	</td>
								<td>	
<input type="submit" value="Question" name="btnQuestion">	
								</td>	
						</tr>	
				</table>

				<table align="center" border="1px">	
					<tr>	
						<td>	Customer Name</td>
						<td>	Question Name</td>
						<td>	Action </td>
					</tr>	

						<?php 	
				$select="SELECT * FROM Question q,Customer c
				where q.CustomerID=c.CustomerID";
				$query=mysqli_query($connect,$select);
				$count=mysqli_num_rows($query);
				if($count>0)
				{
					for ($i	=0; $i<$count ; $i++) 
					{ 
					$data=mysqli_fetch_array($query);
					$questionid=$data['QuestionID'];
					$custname=$data['Customername'];
					$questioname=$data['QuestionName'];
					echo "<tr>
						<td>$custname</td>
						<td>$questioname</td>
						<td><a href='ViewReply.php?qid=$questionid'>View</a></td>

					</tr>";

					}
					
				}

						?>
				</table>	
		</form>
</body>
</html>