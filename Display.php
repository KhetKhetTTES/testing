<?php
	include('Connect.php');
	$select="SELECT * FROM Product";
	$ret=mysqli_query($connect,$select);
	$count=mysqli_num_rows($ret);
?>

<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<tr>
			<td>|</td>
			<td><a href="ChangePassword.php">Change Password</a></td>
			<td>|</td>
			<td><a href="EditCustomer.php">Edit Customer</a></td>
			<td>|<a href="FAQForm.php">FAQ</a></td>
			<td>|</td>
		</tr>
	</table>

	<form action="Display.php" method="post" enctype="multipart/form-data">
    <table align="center">

  <form action="#" method="get">
       Product Search:
       <input type="text" placeholder="Enter keyword here..." 
       value="<?php
				if(isset($_POST['btnsearch']))
				{
				$SearchData=$_POST['txtsearch'];
				echo $SearchData;
				}
		?>" name="txtsearch" size="10"  required/>
		<input type="submit" name="btnsearch" value="Search" alt="Search" id="searchbutton" title="Search" />
  </form>


 <?php
	if(isset($_POST['btnsearch']))
	{
		for ($i=0;$i<$count;$i+=4)
		{
			echo "<tr>";
			$subselect="SELECT * FROM Product 
						WHERE ProductName LIKE '%$SearchData%' LIMIT $i,4";
			$subret=mysqli_query($connect,$subselect);
			$subcount=mysqli_num_rows($subret);

			for($j=0;$j<$subcount;$j++)
			{
				$row=mysqli_fetch_array($subret);
				$image=$row['ProductImage'];
				echo "<td>";
				echo "<img src='$image'  width='200px' height='200px'/>";
				echo "<br/>Product Name :".$row['ProductName']."<br/><br/>
				<a href='ProductDetail.php?pid=".$row['ProductID']."'>View Detail</a>";
				echo "</td>";

			}
			echo "</tr>";
		}
	}


   if(!isset($_POST['btnsearch']))
	{
		for ($i=0;$i<$count;$i+=4)
		{
			echo "<tr>";
			$subselect="SELECT * FROM Product LIMIT $i,4";
			$subret=mysqli_query($connect,$subselect);
			$subcount=mysqli_num_rows($subret);

				for($j=0;$j<$subcount;$j++)
			{
				$row=mysqli_fetch_array($subret);
				$image=$row['ProductImage'];
        		
				echo "<td align='center'>";
				?>

				<img src="<?php echo $image ?>" width="200px" height="200px">
	<?php
				echo "<br/>Product Name :".$row['ProductName']."<br/><br/>
				<a href='ProductDetail.php?pid=".$row['ProductID']."'>View Detail</a>";
				echo "</td>";
			}
			echo "</tr>";
		}
	}
?>
    </table> 
</form>

</body>
</html>