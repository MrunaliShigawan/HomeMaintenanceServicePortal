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
        // put your code here
        ?>
        <?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code user Registration
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
    
if(isset($_POST['submit']))
{
    $address=$_POST['address'];
$date=$_POST['date'];
$timeslot=$_POST['timeslot'];

    if(isset($_GET['emailid']))
{
    
$email=$_GET['emailid'];
$query=mysqli_query($con,"select * from serviceprovider where email='$email'");
$row=mysqli_fetch_array($query);
//echo $row['name'];
$spname=$row['name'];
$category=$row['category'];
$subcategory=$row['subcategory'];
$spemail=$row['email'];
$query1=mysqli_query($con,"select * from users where email='".$_SESSION['login']."'");
$row1=mysqli_fetch_array($query1);

$username=$row1['name'];
$contactno=$row1['contactno'];
$useremail=$row1['email'];
}

$query2=mysqli_query($con,"INSERT INTO `bookservice`(`spname`, `spemail`,`category`, `subcategory`, `username`,`userEmail`, `userContactno`, `address`, `date`, `timeslot` ) VALUES ('$spname','$spemail','$category','$subcategory','$username','$useremail','$contactno','$address','$date','$timeslot')");
if($query2)
{
	echo "<script>alert('You have successfully book the service. Service Details.<br>Service Provider name:'$spname'<br>Service: '$category'->'$subcategory'<br>Date:'$date');</script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
}

header('location:book-order.php');
}




?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Service Registration</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
                <script type="text/javascript" src="newjavascript.js"></script>
<script type="text/javascript">
        //https://code.jquery.com/jquery-2.2.3.js
       function getAddress()
       {
        navigator.geolocation.getCurrentPosition(success, error);

        function success(position) {
 
            var GEOCODING = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&key=AIzaSyA3C4U7Z0cX1RKNGTZpEZ50uIq5wVFKtfc';
//document.write(GEOCODING);
            $.getJSON(GEOCODING).done(function(location) {
               //document.write(GEOCODING);
                //document.write(location.results[0].formatted_address);
                var add=location.results[0].formatted_address;
                
                var x=document.getElementById("address");
                 x.value = add;
                //$('#country').innerHTML(location.results[0].address_components[5].long_name);
                //$('#state').innerHTML(location.results[0].address_components[4].long_name);
                //$('#city').innerhtml(location.results[0].address_components[2].long_name);
                //$('#address').innerHTML(location.results[0].formatted_address);
                //$('#latitude').html(position.coords.latitude);
                //$('#longitude').innerhtml(position.coords.longitude);
            });

        } function error(err) {
           document.write(err);
        }
       }
    </script>


	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->

	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->
<?php include('includes/main-header.php');?>
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- Sign-in -->			

<!-- Sign-in -->
<?php 

 ?>
<!-- create a new account -->

	<h4 class="checkout-subtitle">Book Service</h4>
	<p class="text title-tag-line"></p>
        <form enctype="multipart/form-data" class="register-form outer-top-xs" role="form" method="post"  action="book-order.php?emailid=<?php echo htmlentities($_GET['emailid']);?>">
<div class="form-group">
	    	
            
<div class="form-group">
    <label class="info-title" for="address">Workplace Address <span>*</span></label><br>
                <button  class="btn-upper btn btn-primary" onclick="getAddress()">GET MY LOCATION</button><br><br>
                <input type="text" class="form-control unicase-form-control text-input"  id="address" name="address" required>
                
</div>
                <div class="form-group">
	    	<label class="info-title" for="date">Select date. <span>*</span></label>
	 
                <input type="date" class="form-control unicase-form-control" name="date" required>

	  	</div>
<div class="form-group">
	    	<label class="info-title" for="timeslot">Select Time Slot. <span>*</span></label>
	 
                <div class="category_div" id="category_div">
        <select id="category" class="form-control unicase-form-control" name="timeslot" onchange="dynamicdropdown(this.options[this.selectedIndex].value)">
        <option value="">Select... </option>
        <option value="Morning(9am-12pm)">Morning Slot(9am to 12pm)</option>
        <option value="Afternoon(12pm-4pm)">Afternoon Slot(12pm to 4pm)</option>
        <option value="Evening(4pm-8pm)">Evening Slot(4pm to 8pm)</option>
        </select>
    </div>
</div>


	  	<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit">Book a Appointment</button>
</div>
	</form>
	
	
<!-- create a new account -->			<!-- /.row -->
		</div>

</div>
</div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	
	<!-- For demo purposes – can be removed on production : End -->

<?php } ?>

    </body>
</html>
