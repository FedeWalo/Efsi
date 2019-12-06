<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/dao/productoDAO.php');
$accion = (isset($_GET["accion"]) ? $_GET["accion"] : $_POST["accion"]);
	switch ($accion){
		case "listar":
			$lista = productoDAO::ObtenerTodosLosProductos("NombreProducto_asc");
			echo json_encode($lista);
			break;
		case "insertar":
			$prod = new producto();
			$prod->NombreProducto = $_POST['NombreProducto'];
			$prod->CodigoProducto = $_POST['CodigoProducto'];
			$prod->Precio = $_POST['Precio'];
			$prod->Descuento = $_POST['Descuento'];
			$prod->StockMinimo = $_POST['StockMinimo'];
			$prod->StockActual = $_POST['StockActual'];
			$prod->IdCategoria = $_POST['IdCategoria'];
			$prod->NombreFoto = $_POST['NombreFoto'];
			$prod->DireccionFoto = "img/product/" . $_POST['NombreFoto'] . ".jpg";
			$prod->NombreVideo = $_POST['NombreVideo'];
			$prod->DireccionVideo = $_POST['NombreVideo'];
			$prod->DescripcionCorta = $_POST['DescripcionCorta'];
			$prod->DescripcionLarga = $_POST['DescripcionLarga'];
			$prod->Destacado=$_POST['Destacado'];
			$prod->OnSale = $_POST['OnSale'];
			$prod->MostrarHome = $_POST['MostrarHome'];
			$resultado = productoDAO::insertar($prod);
			$prod->IdProducto=$resultado;
			echo json_encode($prod);
			break;
		case "eliminar":
			$id = $_GET["id"];
			$resultado = productoDAO::eliminar($id);
			echo $resultado;
			break;
		case "editar":
			$prod = new producto();			
			$prod->IdProducto = $_POST['id'];
			$prod->NombreProducto = $_POST['NombreProducto'];
			$prod->CodigoProducto = $_POST['CodigoProducto'];
			$prod->Precio = $_POST['Precio'];
			$prod->Descuento = $_POST['Descuento'];
			$prod->StockMinimo = $_POST['StockMinimo'];
			$prod->StockActual = $_POST['StockActual'];
			$prod->IdCategoria = $_POST['IdCategoria'];
			$prod->NombreFoto = $_POST['NombreFoto'];
			$prod->DireccionFoto = "img/product/" . $_POST['NombreFoto'] . ".jpg";
			$prod->NombreVideo = $_POST['NombreVideo'];
			$prod->DireccionVideo = $_POST['NombreVideo'];
			$prod->DescripcionCorta = $_POST['DescripcionCorta'];
			$prod->DescripcionLarga = $_POST['DescripcionLarga'];
			$prod->Destacado=$_POST['Destacado'];
			$prod->OnSale = $_POST['OnSale'];
			$prod->MostrarHome = $_POST['MostrarHome'];
			$resultado = productoDAO::modificar($prod);
			echo json_encode($resultado);
			break;
		case "buscarPorId":
			$id = $_POST["id"];
			$resultado = productoDAO::ObtenerProductoPorId($id);
			echo json_encode($resultado);
			break;
}
?>