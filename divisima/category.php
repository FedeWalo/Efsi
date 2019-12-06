<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/dao/productoDAO.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/dao/categoriaDAO.php');
	$vista = isset($_GET['vista']) ? $_GET['vista'] : "true"; //true = lista; false = grilla
	$idcat = isset($_GET['idcat']) ? $_GET['idcat'] : 0;
	$listaProductos = null;
	$buscar = "";
	$buscar = isset($_GET['BuscarPalabra']) ? $_GET['BuscarPalabra'] : "";
	$orden = isset($_GET['orden']) ? $_GET['orden'] : "NombreProducto_asc";
	$buscar=str_replace("%20", " ", $buscar);
	if($idcat != 0){
		$listaProductos = productoDAO::ObtenerTodosLosProductosPorCat($idcat,$orden);
	}
	else if($buscar != ""){
		$listaProductos = productoDAO::ObtenerTodosLosProductosPalabra($buscar,$orden);
	}
	else{
		$listaProductos = productoDAO::ObtenerTodosLosProductos($orden);
	}	
	$categorias = categoriaDAO::ObtenerTodasLasCategorias();
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


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Category Page</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row" style="float:left">
				<div class="col-lg-8 order-2 order-lg-1">
					<h2 class="fw-title">Categorias</h2>
					<div class="filter-widget">
						<ul class="category-menu">
							<?php foreach($categorias as $cat){?>
								<li><a href="category.php?idcat=<?php echo $cat->IdCategoria; ?>"><?php echo $cat->NombreCategoria; ?></a></li>
							<?php }?>
						</ul>
					</div>
					
				</div>
				<div class="col-lg-8 order-2 order-lg-1">
				<h2 class="fw-title">Filtros</h2>
					<ul class="category-menu">			
					<li><a href="category.php?idcat=<?php echo $idcat; ?>&BuscarPalabra=<?php echo $buscar;?>&orden=NombreProducto_asc">Nombre Asc</a>
					<li><a href="category.php?idcat=<?php echo $idcat; ?>&BuscarPalabra=<?php echo $buscar;?>&orden=NombreProducto_desc">Nombre Desc</a>
					<li><a href="category.php?idcat=<?php echo $idcat; ?>&BuscarPalabra=<?php echo $buscar;?>&orden=precio_asc">Precio Asc</a>
					<li><a href="category.php?idcat=<?php echo $idcat; ?>&BuscarPalabra=<?php echo $buscar;?>&orden=precio_desc">Precio Desc</a>
					</ul>
				</div>
			</div>
			
			<div class="row">
			<div>
			<a href="category.php?idcat=<?php echo $idcat; ?>&BuscarPalabra=<?php echo $buscar;?>&orden=<?php echo $orden?>&vista=true" class="wishlist-btn"><img src="https://img.icons8.com/metro/26/000000/activity-grid-2.png"></a>
			<a href="category.php?idcat=<?php echo $idcat; ?>&BuscarPalabra=<?php echo $buscar;?>&orden=<?php echo $orden?>&vista=false" class="wishlist-btn"><img src="https://img.icons8.com/material/30/000000/list--v1.png"></a>
			</div>
			</br></br>
			<?php if($vista=="true"){ ?>
				<?php foreach($listaProductos as $prod) { ?>
					<div class="col-lg-4" style="margin:5%">
						<div class="product-item" >
							<div class="pi-pic" >
								<img src="/divisima/<?php echo $prod->DireccionFoto; ?>" alt="">
								<div class="pi-links">
									<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD AL CARRITO</span></a>
									<a href="product.php?id=<?php echo $prod->IdProducto; ?>"" class="wishlist-btn"><i class="fa fa-plus"></i></a>
								</div>
							</div>
							<div class="pi-text">
								<h6><?php echo $prod->Precio; ?></h6>
								<p><?php echo $prod->NombreProducto; ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } 
			 else { ?>
				<table>
					<tr>
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Descripción</th>
						<th>Ver</th>
					</tr>	
					<?php foreach($listaProductos as $prod){ ?>
						<tr>
							<td style="width:40%"><img src="/divisima/<?php echo $prod->DireccionFoto; ?>" alt=""></td>
							<td><?php echo $prod->NombreProducto; ?></td>
							<td><?php echo $prod->Precio; ?></td>
							<td><?php echo $prod->DescripcionCorta; ?></td>
							<td><a href="product.php?id=<?php echo $prod->IdProducto; ?>"" class="wishlist-btn"><i class="fa fa-plus"></i></a></td>
						</tr>
					<?php } ?>
				</table>
			<?php } ?>
			</div>
	</section>
	<!-- Category section end -->


	<!-- Footer section -->
	<?php 
		include_once("footer.php");
	?>
	<!-- Footer section -->



		</div>



	</section>
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
