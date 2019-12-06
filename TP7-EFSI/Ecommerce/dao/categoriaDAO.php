<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/models/categoria.php');
	
	class categoriaDAO{
		public static function ObtenerTodasLasCategorias(){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "select * from categoria";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$STH->execute();
			$vec = array();
			if ($STH->rowCount() > 0) {
				$a = 0;
				while($row = $STH->fetch()) {
					$cat = new categoria();
					$cat->IdCategoria = $row['IdCategoria'];
					$cat->NombreCategoria = $row['NombreCategoria'];
					$vec[$a] = $cat;
					$a++;
				}
			}
			return $vec;
		}
		public static function ObtenerCategoriaPorId($id){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "select * from categoria where IdCategoria=:id";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":id" => $id
			);
			$STH->execute($params);
			$vec = new categoria();
			if ($STH->rowCount() > 0) {
				while($row = $STH->fetch()){
					$vec->IdCategoria = $row['IdCategoria'];
					$vec->NombreCategoria = $row['NombreCategoria'];					
				}
			}
			return $vec;
		}
		public static function nuevo($Categoria){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "INSERT INTO categoria (NombreCategoria) values (:NombreCategoria)";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":NombreCategoria" => $Categoria
			);
			$STH->execute($params);
			return $DBH->lastInsertId();
		}
		public static function eliminar($id)
		{
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query="delete from categoria where IdCategoria=:id";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":id" => $id
			);
			return $STH->execute($params);
		}
		public static function editar($item)
		{
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query="update categoria set NombreCategoria = :nombre where IdCategoria=:id";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(         
				":nombre" => $item->NombreCategoria, 
				":id" => $item->IdCategoria
			);
			$STH->execute($params);
		}
	}
?>