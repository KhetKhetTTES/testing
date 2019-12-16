<?php 	

include('Connect.php');
if(isset($_REQUEST['qid']))
{
	$questionid=$_REQUEST['qid'];
	$select="SELECT * FROM Reply where QuestionID='$questionid'";
	$query=mysqli_query($connect,$select);
	$data=mysqli_fetch_array($query);
	$replyname=$data['ReplyName'];

}
?>

<html>
<head>
	<title>	</title>
</head>
<body>
		<table>	
				<tr>	
						<td>	Reply Name</td>
						<td>	<?php 	echo $replyname ?></td>
				</tr>	

		</table>	
</body>
</html>