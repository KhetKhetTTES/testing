<?php 	

include('connect.php');
if(isset($_REQUEST['cid']))
{
	$customerid=$_REQUEST['cid'];
}

 ?>

<html>
<head>
	<title>	</title>
</head>
<body>
	<form action="Reply.php" method="GET">	
		<table align="center" border="1px">	
					<tr>	
						<td>	Customer Name</td>
						<td>	Question Name</td>
						<td>	Action </td>
					</tr>	

						<?php 	
				$select="SELECT * FROM Question q,Customer c
				where q.CustomerID=c.CustomerID
				 and c.CustomerID='$customerid'";
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
						<td><a href='Reply.php?qid=$questionid&qname=$questioname'>Reply</a></td>

					</tr>";

					}
					
				}

						?>
				</table>
				</form>
</body>
</html>