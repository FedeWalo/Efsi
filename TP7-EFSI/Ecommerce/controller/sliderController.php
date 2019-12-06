<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/dao/sliderDAO.php');
	$accion = (isset($_GET["accion"]) ? $_GET["accion"] : $_POST["accion"]);
	switch ($accion){
		case "obtenerTodos":
			$lista = sliderDAO::ObtenerTodosLosSlider();
			echo json_encode($lista);
			break;
		case "insertar":
			$item = new slider();
			$item->NombreSlider = $_POST["nombre"];
			$item->FotoSlider = $_POST["foto"];
			$resultado = sliderDAO::insertar($item);
			echo json_encode($resultado);
			break;
		case "eliminar":
			$id = $_GET["id"];
			$resultado = sliderDAO::eliminar($id);
			echo $resultado;
			break;
		case "editar":
			$item = new slider();
			$item->IdSlider = $_POST["id"];
			$item->NombreSlider = $_POST["nombre"];
			$item->FotoSlider = $_POST["foto"];
			$resultado = sliderDAO::modificar($item);
			echo json_encode($resultado);
			break;
		case "buscarPorId":
			$id = $_POST["id"];
			$resultado = sliderDAO::ObtenerSliderPorId($id);
			echo $resultado;
			break;
	}
?>