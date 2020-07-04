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
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_GET['emailid']))
{
$email=$_GET['emailid'];

$query=mysqli_query($con,"DELETE FROM `serviceprovider` WHERE email='$email'");
if($query)
{
	echo "<script>alert('Service Provider $email has removed succesfully');</script>";
}
else{
echo "<script>alert('Not removed something went worng');</script>";
}
header('location:reg-service.php');
}

    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Manage Reg Students</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Register Service Providers</h4>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Register Services
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>Sr. no.</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Contact no. </th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Year of Exp.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
$sql="SELECT * FROM `serviceprovider`";
            $results=$con->query($sql);
$cnt=1;
if($results->num_rows > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
<td class="center"><?php echo htmlentities($result['name']);?></td>
                                            <td class="center"><?php echo htmlentities($result['email']);?></td>
                                            <td class="center"><?php echo htmlentities($result['contactno']);?></td>
                                            <td class="center"><?php echo htmlentities($result['category']);?></td>
                                             <td class="center"><?php echo htmlentities($result['subcategory']);?></td>
                                             <td class="center"><?php echo htmlentities($result['yearexp']);?></td>
                                           
                                            
                                            <td class="center">

                                                <a href="reg-service.php?emailid=<?php echo htmlentities($result['email']);?>" onclick="return confirm('Are you sure you want to remove this Service Provider?');" >  <button class="btn btn-danger"> Remove</button></a>
                                                <a href="edit-record.php?emailid=<?php echo htmlentities($result['email']);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>
                                          
                                            </td>
                                             
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>


            
    </div>
    </div>

     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>

    </body>
</html>
