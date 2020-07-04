<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_POST['change']))
  {
$email=$_GET['emailid'];
$name=$_POST['name'];
$emailid=$_POST['email'];
$contactno=$_POST['contactno'];
$query=mysqli_query($con,"UPDATE `serviceprovider` SET `name`='$name',`email`='$emailid',`contactno`='$contactno' where email='$email'");
if($query)
{
	echo "<script>alert('Details change successfully');</script>";
}
else{
echo "<script>alert('Couldn't proceed something went worng');</script>";
}
header('location:edit-record.php');
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>

            
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">Edit Service Provider Details</h4>
</div>
</div>
 <?php 
 if(isset($_GET['emailid']))
{
$email=$_GET['emailid'];
$query=mysqli_query($con,"select * from serviceprovider where email='$email'");
while($result=mysqli_fetch_array($query))
{
//$query=mysqli_query($con,"select * from serviceprovider where email='$email' ");


?> 
<!--LOGIN PANEL START-->           
<div class="row">


</div>

<form role="form" method="post"  name="chngpwd" action="edit-record.php?emailid=<?php echo $result['email'];?>">

<div class="form-group">
<label>Full name</label>
<input class="form-control" type="text" name="name" value="<?php echo $result['name'];?>" required  />
</div>

<div class="form-group">
<label>Email ID</label>
<input class="form-control" type="email" name="email" value="<?php echo $result['email'];?>" required  />
</div>

<div class="form-group">
    <label>Contact No.</label>
    <input class="form-control" type="text"  name="contactno" value="<?php echo $result['contactno'];?>" required  />
</div>

    
 <button type="submit" name="change" class="btn btn-info">Change </button> 
</form>
 </div>
<?php } }?>
<!---LOGIN PABNEL END-->            
             
 
    
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>

    </body>
</html>
