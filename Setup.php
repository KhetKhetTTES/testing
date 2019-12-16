<?php
include('Connect.php');

$drop="Drop table Orders";
$query=mysqli_query($connect,$drop);
if ($query) 
{
	echo"<p> Order Drop Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}
/////////////////Drop Reply//////////////////////////

$drop="Drop table Reply";
$query=mysqli_query($connect,$drop);
if ($query) 
{
	echo"<p> Reply Drop Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}
/////////////////Drop Question//////////////////////////

$drop="Drop table Question";
$query=mysqli_query($connect,$drop);
if ($query) 
{
	echo"<p> Question Drop Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}

/////////////////Drop Admin//////////////////////////

$drop="Drop table Admin";
$query=mysqli_query($connect,$drop);
if ($query) 
{
	echo"<p> Admin Drop Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}
/////////////////Drop Customer//////////////////////////

$drop="Drop table Customer";
$query=mysqli_query($connect,$drop);
if ($query) 
{
	echo"<p> Customer Drop Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}


/////////////////Drop Product//////////////////////////

$drop="Drop table Product";
$query=mysqli_query($connect,$drop);
if ($query) 
{
	echo"<p> Product Drop Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}

//////////////////Create Admin////////////////////////////////

 $Create="Create table Admin
(
 AdminID int not null primary key Auto_Increment,
 AdminName varchar(30),
 Email varchar(30),
 Password varchar(30)
 )";
$query=mysqli_query($connect,$Create);
if ($query) 
{
	echo"<p> Admin Create Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}

$insert="insert into Admin
Values(1,'Aye Aye','ayeaye@gmail.com','ayeaye')

";
$query=mysqli_query($connect,$insert);
if ($query) 
{
	echo"<p> Admin insert Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}


//////////////////Create Customer////////////////////////////////

 $Create="Create table Customer
(
 CustomerID int not null primary key Auto_Increment,
 Customername varchar(30),
 Email varchar(30),
 Date_of_brith varchar(30),
 Customerpassword varchar(30),
 PostalAddress varchar(30),
 Phno varchar(30),
 CustomerStatus varchar(30)
 
 )";
$query=mysqli_query($connect,$Create);
if ($query) 
{
	echo"<p> Customer Create Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}

$insert="insert into Customer
Values(1,'Su Su','susu23@gmail.com','24/5/2000','123444445','1101','097862564','New')

";
$query=mysqli_query($connect,$insert);
if ($query) 
{
	echo"<p> Customer insert Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}


////////////////////////////////////////Product////////

$Create="Create table Product
(
 ProductID int not null primary key Auto_Increment,
 ProductName varchar(30),
 EnginePower varchar(30),
 Color varchar(30),
 ProductType varchar(30),
 Price int,
 Quantity int,
 Description varchar(50),
 ProductImage text
  )";
$query=mysqli_query($connect,$Create);
if ($query) 
{
	echo"<p> Product Create Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}

/////////////////////////////Insert Product///////////
$insert="insert into Product
Values(1,'Cycle','400','red','Electric','200000','5','Good','IMAGE/a.jpg')
,(2,'Bicycle','400','black','Electric1','100000','5','Good','IMAGE/b.jpg')
,(3,'Bicycle','400','black','Electric1','100000','5','Good','IMAGE/c.jpg')

";

$query=mysqli_query($connect,$insert);
if ($query) 
{
	echo"<p> Product insert Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}
//////////////////Create Quetion////////////////////////////////

 $Create="Create table Question
(
 QuestionID int not null primary key Auto_Increment,
 QuestionName varchar(30),
 CustomerID int,
 FOREIGN KEY(CustomerID) REFERENCES customer(CustomerID)
  )";
$query=mysqli_query($connect,$Create);
if ($query) 
{
	echo"<p> Question Create Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}




//////////////////Create Order////////////////////////////////

 $Create="Create table Orders
(
 OrderID int not null primary key Auto_Increment,
 OrderDate varchar(30),
 DiscountPercent varchar(20),
 DiscountAmount int,
 Price int,
 CustomerID int,
 FOREIGN KEY(CustomerID) REFERENCES customer(CustomerID)
 
 )";
$query=mysqli_query($connect,$Create);
if ($query) 
{
	echo"<p> Order Create Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}
//////////////////Create Reply////////////////////////////////

 $Create="Create table Reply
(
 ReplyID int not null primary key Auto_Increment,
 ReplyName varchar(30),
 AdminID int,
 QuestionID int,
 FOREIGN KEY(AdminID) REFERENCES Admin(AdminID),
 FOREIGN KEY(QuestionID) REFERENCES Question(QuestionID)
  )";
$query=mysqli_query($connect,$Create);
if ($query) 
{
	echo"<p> Reply Create Sucessfully</p>";
}
else
{
	 mysqli_error($connect);
}

?>
