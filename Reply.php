
<?php 	
		include('Connect.php');
		if(isset($_REQUEST['qid']))
		{
			$questionid=$_REQUEST['qid'];
			$questionname=$_GET['qname'];
		}
		if(isset($_POST['btnreply']))
		{

				$quesid=$_POST['txtquestionid'];
				$reply=$_POST['txtreply'];

				$select="SELECT * FROM Admin";
				$query=mysqli_query($connect,$select);
				$data=mysqli_fetch_array($query);
				$adminid=$data['AdminID'];

				$insert="INSERT INTO Reply(ReplyName,QuestionID,AdminID)
				values('$reply','$quesid','$adminid')";
				$query=mysqli_query($connect,$insert);

				if($query)
				{
					echo "<script>
						window.alert('Reply Successfully')
						window.location='AdminHome.php'
						</script>";
				}

		}
?>
<html>
<head>
	<title>	</title>
</head>
<body>
		<form action="Reply.php" method="POST">
			<input type="hidden" name="txtquestionid" value="<?php 	echo $questionid ?>">	
				<table>	
						<tr>	
								<td>	Question </td>
								<td>	<?php 	echo $questionname ?></td>
						</tr>
						<tr>	
								<td>	Reply		</td>
								<td>
										<textarea name="txtreply">	

										</textarea>

								</td>
						</tr>	
						<tr>	
								<td>	</td>
								<td>	

							<input type="submit" value="Reply" name="btnreply">	
								</td>	
						</tr>		
				</table>	
		</form>
</body>
</html>