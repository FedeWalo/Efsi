<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/dao/categoriaDAO.php');
	$accion = (isset($_GET["accion"]) ? $_GET["accion"] : $_POST["accion"]);
	switch ($accion){
		case "listar":
			$listado = categoriaDAO::ObtenerTodasLasCategorias();
			echo json_encode($listado);
			break;
		case "nuevo":
			$nombre = $_POST["NombreCategoria"];
			$newid = categoriaDAO::nuevo($nombre);
			echo json_encode($newid);
			break;
		case "eliminar":
			$id = $_GET["id"];
			$resultado = categoriaDAO::eliminar($id);
			echo json_encode($resultado);
			break;
		case "editar":
			$item = new categoria();
			$item->IdCategoria = $_POST["id"];
			$item->NombreCategoria = $_POST["NombreCategoria"];
			$resultado = categoriaDAO::editar($item);
			echo $resultado;
			break;
		case "buscarPorId":
			$id = $_POST["id"];
			$resultado = categoriaDAO::ObtenerCategoriaPorId($id);
			echo json_encode($resultado);
			break;
	}
?>