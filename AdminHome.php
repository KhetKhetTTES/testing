<?php 	
		include('Connect.php');

 ?>
<html>
<head>
	<title>	</title>
</head>
<body>
		<form>	
				<table>	
						<tr>	
							<td><a href="AdminHome.php">Customer List</a></td>
							
						</tr>	
				</table>


				<table align="center" border="1px">	
					<tr>	
						<td>	Customer Name</td>
						<td>	Email Address</td>
						<td>	Action </td>
					</tr>	

						<?php 	
				$select="SELECT * FROM Customer";
				$query=mysqli_query($connect,$select);
				$count=mysqli_num_rows($query);
				if($count>0)
				{
					for ($i	=0; $i<$count ; $i++) 
					{ 
					$data=mysqli_fetch_array($query);
					$customerid=$data['CustomerID'];
					$custname=$data['Customername'];
					$email=$data['Email'];
					echo "<tr>
						<td>$custname</td>
						<td>$email</td>
						<td><a href='QuestionList.php?cid=$customerid'>Question</a></td>

					</tr>";

					}
					
				}

						?>
				</table>	
		</form>	
</body>
</html>