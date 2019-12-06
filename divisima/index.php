<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/dao/productoDAO.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/dao/sliderDAO.php');
	$sliders = sliderDAO::ObtenerTodosLosSlider();
	$listaProductos = productoDAO::ObtenerTodosLosProductosDestacados();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<?php
		include_once("header.php");
	?>
	<!-- Header section end -->

<!---->

	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
		<?php foreach($sliders as $s){?>
			<div class="hs-item set-bg" data-setbg="/divisima/img/slider/<?php echo $s->FotoSlider;?>">
			</div>
		<?php }?>
			<!--<div class="hs-item set-bg" data-setbg="img/notebook1.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-black">
							<span>New Arrivals</span>
							<h2>McBook Pro</h2>
							<p class="text-black">No coments</p>
							<a href="#" class="site-btn sb-line">Ver</a>
							<a href="#" class="site-btn sb-black">AÃ±adir al carrito</a>
						</div>
					</div>
					<div class="offer-card text-black">
						<span>from</span>
						<h4>$1500</h4>
					</div>
				</div>
			</div>-->
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->



	<!-- Features section -->
	
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>PRODUCTOS</h2>
			</div>
			<div class="product-slider owl-carousel">
			<?php foreach($listaProductos as $prod) {?>				
				<div class="product-item">
					<div class="pi-pic">
						<img src="/divisima/<?php echo $prod->DireccionFoto; ?>" alt="" />
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="product.php?id=<?php echo $prod->IdProducto;?>" class="wishlist-btn"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6><?php echo $prod->Precio; ?></h6>
						<p><?php echo $prod->NombreProducto; ?></p>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</section>
	<!-- letest product section end -->


	<!-- Footer section -->
	<?php 
		include_once("footer.php");
	?>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>