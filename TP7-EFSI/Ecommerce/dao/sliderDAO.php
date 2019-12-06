<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/models/slider.php');
	
	class sliderDAO{
		public static function ObtenerTodosLosSlider(){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "select * from slider ";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$STH->execute();
			$vec = array();
			if ($STH->rowCount() > 0) {
				$a = 0;
				while($row = $STH->fetch()) {
					$sli = new slider();
					$sli->IdSlider = $row['IdSlider'];
					$sli->NombreSlider = $row['NombreSlider'];
					$sli->FotoSlider=$row['FotoSlider'];
					$vec[$a] = $sli;
					$a++;
				}
			}
			return $vec;
		}
		public static function ObtenerSliderPorId($id){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "select * from slider where IdSlider=:id";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":id" => $id            
			);
			$STH->execute($params);
		
			$sli = new slider();
			if ($STH->rowCount() > 0) {
				$a = 0;
				while($row = $STH->fetch()) {
					$sli->IdSlider = $row['IdSlider'];
					$sli->NombreSlider = $row['NombreSlider'];
					$sli->FotoSlider=$row['FotoSlider'];
					$a++;
				}
			}
			return $sli;
		}
		
		public static function insertar($Slider){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "insert into slider (NombreSlider, FotoSlider) values (:NombreSlider, :FotoSlider)";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":NombreSlider" => $Slider->NombreSlider,
				":FotoSlider" => $Slider->FotoSlider
			);
			$STH->execute($params);
			$ultimoId=$DBH->lastInsertId();
			return $ultimoId;
		}

		public static function eliminar($id)
		{
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query="delete from slider where IdSlider=:id";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":id" => $id
			);
			$STH->execute($params);
		}

		public static function modificar($Slider)
		{
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query="update slider set NombreSlider = :NombreSlider, FotoSlider = :FotoSlider where IdSlider = :IdSlider";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":NombreSlider"=>$Slider->NombreSlider,
				":FotoSlider" => $Slider->FotoSlider,
				":IdSlider" => $Slider->IdSlider
			);
			return $STH->execute($params);
		}
	}
?>