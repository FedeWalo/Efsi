<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/dao/categoriaDAO.php');
	$categorias = categoriaDAO::ObtenerTodasLasCategorias();
?>

<header class="header-section">
		<div class="header-top">
			<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.php" class="site-logo">
							<img src="img/e-Shop.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form" action="category.php?BuscarPalabra=">
							<input type="text" name="BuscarPalabra" id="BuscarPalabra" placeholder="Buscar producto">
							<button onclick="Buscar();"><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<a href="#">Iniciar sesión</a> o <a href="#">Crear cuenta</a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="#">Carrito</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="category.php?">Categorías</a>
						<ul class="sub-menu">
							<?php foreach($categorias as $cat){?>
								<li><a href="category.php?idcat=<?php echo $cat->IdCategoria; ?>"><?php echo $cat->NombreCategoria; ?></a></li>
							<?php }?>
						</ul>
					</li>
					<!--<li><a href="#">Pages</a>
						<ul class="sub-menu">
							<li><a href="./product.html">Product Page</a></li>
							<li><a href="./category.html">Category Page</a></li>
							<li><a href="./cart.html">Cart Page</a></li>
							<li><a href="./checkout.html">Checkout Page</a></li>
							<li><a href="./contact.html">Contact Page</a></li>
						</ul>
					</li>-->
					<li><a href="#">Nosotros</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<body>
		<script>
	
    function Buscar() {                      		
		$('#formularioBuscar').submit();
	}		
</script>
</body>