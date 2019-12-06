<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/usuario.php');
	
	class usuarioDAO{
		public static ObtenerTodasLosUsuarios(){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "select * from usuario";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$STH->execute();
			$vec = array();
			if ($STH->rowCount() > 0) {
				$a = 0;
				while($row = $STH->fetch()) {
					$usu = new usuario();
					$usu->id = $row['IdUsuario'];
					$usu->nombre = $row['NombreUsuario'];
					$usu->apellido = $row['ApellidoUsuario'];
					$usu->email = $row['Mail'];
					$vec[$a] = $usu;
					$a++;
				}
			}
			return $vec;
		}
		public static usuario Existe($id){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "select * from usuario where IdUsuario =:id";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(
				":id" => $id
			);
			$STH->execute($params);
			$vec = array();
			if ($STH->rowCount() > 0) {
				$usu = new usuario();
				$usu->id = $row['IdUsuario'];
				$usu->nombre = $row['NombreUsuario'];
				$usu->apellido = $row['ApellidoUsuario'];
				$usu->email = $row['Mail'];
				$vec[0] = $usu;
			}
			return $vec;
		}
		public static insertar($Usuario){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "insert into usuario (NombreUsuario, ApellidoUsuario, Mail) values (:NombreUsuario, :ApellidoUsuario, :Mail)";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":NombreUsuario" => $Usuario.NombreUsuario,
				":ApellidoUsuario" => $Usuario.ApellidoUsuario,
				":Mail" => $Usuario.Mail
				
			);
			$STH->execute($params);
			
			
		}
		public static eliminar($id)
		{
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query="delete from usuario where IdUsuario=:id"
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":IdUsuario" => $id
			);
		}
	}
?>
<!--$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema","root","");
		$query = "select * from Usuarios where Email=:email and Clave = :clave";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":email" => $mail,
			":clave" => $password
		);
		$STH->execute($params);
		$vec = array();
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
					$vec["nombre"] = $row['Nombre'];
					$vec["apellido"] = $row['Apellido'];
			}
		}
		else{
			$vec["nombre"] = "";
		}
		return $vec;-->