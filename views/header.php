<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Header | Shoes Shop</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<!--theme-style-->
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--//theme-style-->
	<link rel="stylesheet" href="../css/etalage.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Sport Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> 
		addEventListener("load", function() { 
			setTimeout(hideURLbar, 0); 
		}, false); 
		function hideURLbar(){
			window.scrollTo(0,1);
		}
	</script>
	<!--fonts-->
	<link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<style type="text/css" media="screen">
	#title-product{
		border-bottom: 5px double #d2232a;
	}
	#content-8{
		border-right: 2px solid  #d2232a;
	}
	.jumbotron1{
		background:white;
		width: 400px;
	}
	.jumbotron img{
		padding: 0px;
	}
	.jumbotron #jum1{
		padding:3px 0px;
	}
</style>
</head>
<body> 
	<!--header-->
	<div class="line">

	</div>
	<div class="header">
		<div class="logo">
			<a href="../index.php">
				<img src="../images/logo.png" alt="" class="img-circle" height="100px" width="150px">
			</a>
		</div>
		<div  class="header-top">
			<div class="header-grid">
				<ul class="header-in">
					<?php 
					if(isset($_SESSION['name']) && isset($_SESSION['id']) && isset($_SESSION['role']))
					{
						?>
						<li><a href='profile.php'><?=$_SESSION['name']?></a></li>
						<li><a href='logout.php'>Đăng xuất</a></li>
						<?php
					}else{
						?>
						<li ><a href='account.php'>Đăng nhập</a> </li>
						<li ><a href='register.php'>Đăng ký</a> </li>
						<?php
					}
					?>		
				</ul>
				<div class="search-box">
					<div id="sb-search" class="sb-search">
						<form>
							<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"> </span>
						</form>
					</div>
				</div>
				<!-- search-scripts -->
				<script src="../js/classie.js"></script>
				<script src="../js/uisearch.js"></script>
				<script>
					new UISearch(document.getElementById( 'sb-search' ));
				</script>
				<!-- //search-scripts -->

				<div class="online">
					<?php
					if(isset($_SESSION['role']) && ($_SESSION['role'] == '1')){
						?>
						<a href="admin.php">ADMIN</a>
						<?php
					}else{
						?>
						<a href="product.php">Sản Phẩm</a>
						<?php
					}
					?>
				</div>

				<div class="clearfix"> </div>
			</div>
			<div class="header-bottom">
				<div class="h_menu4"><!-- start h_menu4 -->
					<a class="toggleMenu" href="#">Menu</a>
					<ul class="nav">
						<li class="nav">
							<a href="">ADMIN</a>
							<ul>
								<li><a href="admin.php">Products</a></li>
								<li><a href="">Users</a></li>
							</ul>
						</li>	
						<li><a href="abouts.php">Giới thiệu</a></li>
						<li><a href="contact.php">Liên hệ</a></li>
					</ul>
					<script type="text/javascript" src="../js/nav.js"></script>
				</div><!-- end h_menu4 -->
				<!-- cart -->
				<div class="col-md-2 col-md-offset-6 h_menu4">
					<ul class="nav">
						<li><a href="checkout.php" title=""><span class="glyphicon glyphicon-shopping-cart"></span > Giỏ hàng <span id="sumCart">0</span></a></li>
					</ul>
				</div>
				<!-- end cart -->
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!---->