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

	    <title>Home Cleaning Service</title>

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
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">


	</head>
    <body class="cnt-home">
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
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
					<!-- /.checkout-steps -->
                                        <div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Sub Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
  
        <ul class="nav">
            <li class="dropdown menu-item">
              
                <a href="home-service.php?cid=1"  class="dropdown-toggle" >
                        Kitchen & Bathroom Cleaning</a>
                <a href="home-service.php?cid=2"  class="dropdown-toggle" >
                        Floor Scrubbing & Polishing</a>
                <a href="home-service.php?cid=3" class="dropdown-toggle" >
                        General Home Cleaning</a>
                
               
                        
</li>
</ul>
    </nav>
</div>
				</div>
                            <div class="col-xs-12 col-sm-12 col-md-9" >
			<?php
                        $cid=intval($_GET['cid']);
if($cid == 1){
    $subcat='Kitchen-and-Bathroom-Cleaning';
    ?><h3>Kitchen and Bathroom Cleaning</h3><br><?php
}
if($cid == 2){
    $subcat='Floor-Scrubbing-and-Polishing';
    ?><h3>Floor Scrubbing and Polishing</h3><br><?php
}
if($cid == 3){
    $subcat='General-Home-Cleaning';
    ?><h3>General Home Cleaning</h3><br><?php
}
   $sql=mysqli_query($con,"select * from serviceprovider where subcategory='$subcat' ");
while($row=mysqli_fetch_array($sql))
{
   
	?>
                            <div class="card" style="width:300px">
                                <a href="#"><img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode( $row['photo'] ); ?>" alt="Card image" height="150px" width="50px"style="width:100%"></a>
    <div class="card-body">
      <h4 class="card-title"><?php echo $row['name'];?></h4>
      <p>Contact No:<?php echo $row['contactno'];?><br>Year of Exp.:<?php echo $row['yearexp'];?><br><br>
      <a href="book-order.php?emailid=<?php echo htmlentities($row['email']);?>" class="btn btn-primary">Book a Appointment</a>
    </div>
  </div>
                                <br><br>
<?php } ?>
                            </div>   
			</div><!-- /.row -->
                        
		</div><!-- /.checkout-box -->
	
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
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
</body>
</html>
<?php ?>
    </body>
</html>
