<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7-EFSI/Ecommerce/models/producto.php');
	
	class productoDAO{
		public static function ObtenerTodosLosProductos($orden){
			$orden = str_replace('_',' ',$orden);
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "select * from producto order by " . $orden;
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$STH->execute();
			$vec = array();
			if ($STH->rowCount() > 0) {
				$a = 0;
				while($row = $STH->fetch()) {
					$prod = new producto();
					$prod->IdProducto = $row['IdProducto'];
					$prod->NombreProducto = $row['NombreProducto'];
					$prod->CodigoProducto = $row['CodigoProducto'];
					$prod->Precio = $row['Precio'];
					$prod->Descuento = $row['Descuento'];
					$prod->StockMinimo = $row['StockMinimo'];
					$prod->StockActual = $row['StockActual'];
					$prod->IdCategoria = $row['IdCategoria'];
					$prod->NombreFoto = $row['NombreFoto'];
					$prod->DireccionFoto = $row['DireccionFoto'];
					$prod->NombreVideo = $row['NombreVideo'];
					$prod->DireccionVideo = $row['DireccionVideo'];
					$prod->DescripcionCorta = $row['DescripcionCorta'];
					$prod->DescripcionLarga = $row['DescripcionLarga'];
					$prod->Destacado = $row['Destacado'];
					$prod->OnSale = $row['OnSale'];
					$prod->MostrarHome = $row['MostrarHome'];
					$vec[$a] = $prod;
					$a++;
				}
			}
			$DBH = null;
			return $vec;
		}
		
		public static function ObtenerTodosLosProductosPalabra($palabra,$orden){
			$orden = str_replace('_',' ',$orden);
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = 'select * from producto where NombreProducto like "%":palabra"%" order by '.$orden;			
			var_dump($query);
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":palabra" => $palabra
			);
			$STH->execute($params);
			$vec = array();
			if ($STH->rowCount() > 0) {
				$a = 0;
				while($row = $STH->fetch()) {
					$prod = new producto();
					$prod->IdProducto = $row['IdProducto'];
					$prod->NombreProducto = $row['NombreProducto'];
					$prod->CodigoProducto = $row['CodigoProducto'];
					$prod->Precio = $row['Precio'];
					$prod->Descuento = $row['Descuento'];
					$prod->StockMinimo = $row['StockMinimo'];
					$prod->StockActual = $row['StockActual'];
					$prod->IdCategoria = $row['IdCategoria'];
					$prod->NombreFoto = $row['NombreFoto'];
					$prod->DireccionFoto = $row['DireccionFoto'];
					$prod->NombreVideo = $row['NombreVideo'];
					$prod->DireccionVideo = $row['DireccionVideo'];
					$prod->DescripcionCorta = $row['DescripcionCorta'];
					$prod->DescripcionLarga = $row['DescripcionLarga'];
					$prod->Destacado = $row['Destacado'];
					$prod->OnSale = $row['OnSale'];
					$prod->MostrarHome = $row['MostrarHome'];
					$vec[$a] = $prod;
					$a++;
				}
			}
			$DBH = null;
			return $vec;
		}
		
		public static function ObtenerTodosLosProductosDestacados(){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "select * from producto where Destacado=1";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$STH->execute();
			$vec = array();
			if ($STH->rowCount() > 0) {
				$a = 0;
				while($row = $STH->fetch()) {
					$prod = new producto();
					$prod->IdProducto = $row['IdProducto'];
					$prod->NombreProducto = $row['NombreProducto'];
					$prod->CodigoProducto = $row['CodigoProducto'];
					$prod->Precio = $row['Precio'];
					$prod->Descuento = $row['Descuento'];
					$prod->StockMinimo = $row['StockMinimo'];
					$prod->StockActual = $row['StockActual'];
					$prod->IdCategoria = $row['IdCategoria'];
					$prod->NombreFoto = $row['NombreFoto'];
					$prod->DireccionFoto = $row['DireccionFoto'];
					$prod->NombreVideo = $row['NombreVideo'];
					$prod->DireccionVideo = $row['DireccionVideo'];
					$prod->DescripcionCorta = $row['DescripcionCorta'];
					$prod->DescripcionLarga = $row['DescripcionLarga'];
					$prod->Destacado = $row['Destacado'];
					$prod->OnSale = $row['OnSale'];
					$prod->MostrarHome = $row['MostrarHome'];
					$vec[$a] = $prod;
					$a++;
				}
			}
			$DBH = null;
			return $vec;
		}
		public static function ObtenerTodosLosProductosPorCat($id, $orden){
			$orden = str_replace('_',' ',$orden);
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "select * from producto where IdCategoria=:id order by " . $orden;
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":id" => $id
			);
			$STH->execute($params);
			$vec = array();
			if ($STH->rowCount() > 0) {
				$a = 0;
				while($row = $STH->fetch()) {
					$prod = new producto();
					$prod->IdProducto = $row['IdProducto'];
					$prod->NombreProducto = $row['NombreProducto'];
					$prod->CodigoProducto = $row['CodigoProducto'];
					$prod->Precio = $row['Precio'];
					$prod->Descuento = $row['Descuento'];
					$prod->StockMinimo = $row['StockMinimo'];
					$prod->StockActual = $row['StockActual'];
					$prod->IdCategoria = $row['IdCategoria'];
					$prod->NombreFoto = $row['NombreFoto'];
					$prod->DireccionFoto = $row['DireccionFoto'];
					$prod->NombreVideo = $row['NombreVideo'];
					$prod->DireccionVideo = $row['DireccionVideo'];
					$prod->DescripcionCorta = $row['DescripcionCorta'];
					$prod->DescripcionLarga = $row['DescripcionLarga'];
					$prod->Destacado = $row['Destacado'];
					$prod->OnSale = $row['OnSale'];
					$prod->MostrarHome = $row['MostrarHome'];
					$vec[$a] = $prod;
					$a++;
				}
			}
			$DBH = null;
			return $vec;
		}
		public static function ObtenerProductoPorId($id){
			$prod = new producto();
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "select * from producto where IdProducto=:id";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":id" => $id
			);
			$STH->execute($params);
			if ($STH->rowCount() > 0) {
					$a=0;
				while($row = $STH->fetch()) {
					
					$prod->IdProducto = $row['IdProducto'];
					$prod->NombreProducto = $row['NombreProducto'];
					$prod->CodigoProducto = $row['CodigoProducto'];
					$prod->Precio = $row['Precio'];
					$prod->Descuento = $row['Descuento'];
					$prod->StockMinimo = $row['StockMinimo'];
					$prod->StockActual = $row['StockActual'];
					$prod->IdCategoria = $row['IdCategoria'];
					$prod->NombreFoto = $row['NombreFoto'];
					$prod->DireccionFoto = $row['DireccionFoto'];
					$prod->NombreVideo = $row['NombreVideo'];
					$prod->DireccionVideo = $row['DireccionVideo'];
					$prod->DescripcionCorta = $row['DescripcionCorta'];
					$prod->DescripcionLarga = $row['DescripcionLarga'];
					$prod->Destacado = $row['Destacado'];
					$prod->OnSale = $row['OnSale'];
					$prod->MostrarHome = $row['MostrarHome'];
					$a++;
				}
			}
			return $prod;
		}
		public static function insertar($Producto){
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query = "insert into producto (NombreProducto, CodigoProducto,Precio, Descuento, StockMinimo, StockActual, IdCategoria, NombreFoto, DireccionFoto, NombreVideo, DireccionVideo, DescripcionCorta,  DescripcionLarga, Destacado, OnSale, MostrarHome) values (:NombreProducto, :CodigoProducto, :Precio, :Descuento, :StockMinimo, :StockActual, :IdCategoria, :NombreFoto, :DireccionFoto, :NombreVideo, :DireccionVideo, :DescripcionCorta, :DescripcionLarga, :Destacado, :OnSale, :MostrarHome)";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":NombreProducto" => $Producto->NombreProducto,
				":CodigoProducto"=> $Producto->CodigoProducto,
				":Precio"=> $Producto->Precio,
				":Descuento"=> $Producto->Descuento,
				":StockMinimo"=>$Producto->StockMinimo,
				":StockActual"=>$Producto->StockActual,
				":IdCategoria"=>$Producto->IdCategoria,
				":NombreFoto"=>$Producto->NombreFoto,
				":DireccionFoto"=>$Producto->DireccionFoto,
				":NombreVideo"=>$Producto->NombreVideo,
				":DireccionVideo"=>$Producto->DireccionVideo,
				":DescripcionCorta"=>$Producto->DescripcionCorta,
				":DescripcionLarga"=>$Producto->DescripcionLarga,
				":Destacado"=>$Producto->Destacado,
				":OnSale"=>$Producto->OnSale,
				":MostrarHome"=>$Producto->MostrarHome
			);
			$STH->execute($params);
			return $DBH->lastInsertId();
		}
		public static function eliminar($id)
		{
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce","root","");
			$query="delete from producto where IdProducto=:id";
			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$params = array(                                
				":id" => $id
			);
			$STH->execute($params);
		}
		
		public static function modificar($Producto)
		{
			$arrPersona = array();
        $BaseDeDatos = new PDO("mysql:host=127.0.0.1;dbname=sistema-ecommerce", "root","");
        $query = 'UPDATE producto SET NombreProducto=:nombre , CodigoProducto=:codigoproducto , Precio=:precio , Descuento=:descuento , StockMinimo=:stockminimo , StockActual=:stockactual , IdCategoria=:idcategoria , NombreFoto=:nombrefoto , DireccionFoto=:direccionfoto , NombreVideo=:nombrevideo , DireccionVideo=:direccionvideo , DescripcionCorta=:descripcioncorta , DescripcionLarga=:descripcionlarga , Destacado=:destacado , OnSale=:onsale , MostrarHome=:mostrarhome WHERE IdProducto=:id';    
        $Resul = $BaseDeDatos->prepare($query);
        $Resul->setFetchMode(PDO::FETCH_ASSOC);     
        $params = array(                   
				":nombre" => $Producto->NombreProducto,
				":codigoproducto"=> $Producto->CodigoProducto,
				":precio"=> $Producto->Precio,
				":descuento"=> $Producto->Descuento,
				":stockminimo"=>$Producto->StockMinimo,
				":stockactual"=>$Producto->StockActual,
				":idcategoria"=>$Producto->IdCategoria,
				":nombrefoto"=>$Producto->NombreFoto,
				":direccionfoto"=>$Producto->DireccionFoto,
				":nombrevideo"=>$Producto->NombreVideo,
				":direccionvideo"=>$Producto->DireccionVideo,
				":descripcioncorta"=>$Producto->DescripcionCorta,
				":descripcionlarga"=>$Producto->DescripcionLarga,
				":destacado"=>$Producto->Destacado,
				":onsale"=>$Producto->OnSale,
				":mostrarhome"=>$Producto->MostrarHome,
				":id" =>$Producto->IdProducto
		);   
        $Resul->execute($params);   
		}
	}
?>