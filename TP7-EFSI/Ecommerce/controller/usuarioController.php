<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/dao/usuarioDAO.php');
	$accion = (isset($_GET["accion"];) ? $_GET["accion"] : $_POST["accion"]);
	switch ($accion){
		case "obtenerTodos":
			$listado = usuarioDAO::ObtenerTodasLosUsuarios();
			echo json_encode($listado);
			break;
		case "insertar":
			$item = new usuario();
			$item->NombreUsuario = $_POST["nombreusuario"];
			$item->ApellidoUsuario = $_POST["apellidousuario"];
			$item->Mail = $_POST["mail"];
			$item->Contraseña = $_POST["contraseña"];
			$newid = usuarioDAO::insertar($item);
			$item->IdUsuario = $newid;
			echo json_encode($item);
			break;
		case "eliminar":
			$id = $_POST["idusuario"];
			$resultado = usuarioDAO::eliminar($id);
			echo $resultado;
			break;
		case "editar":
			$item = new usuario();
			$item->IdUsuario = $_POST["idusuario"];
			$item->NombreUsuario = $_POST["nombreusuario"];
			$item->ApellidoUsuario = $_POST["apellidousuario"];
			$item->Mail = $_POST["mail"];
			$item->Contraseña = $_POST["contraseña"];
			$resultado = usuarioDAO::editar($item);
			echo $resultado;
			break;
		case "buscarPorId":
			$id = $_POST["id"];
			$resultado = usuarioDAO::Existe($id);
			echo $resultado;
			break;
	}
?>