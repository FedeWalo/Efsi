<?php
	include_once ($_SERVER["DOCUMENT_ROOT"].'/TP7-EFSI/Ecommerce/dao/productoDAO.php');	
 ?>	 
 
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

	<link rel="stylesheet" href="assets/css/clases.css">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <!-- control izq -->
	<?php
		include("control.php");
	?>
    <!-- fin control izq -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- header-->
		<?php
			include_once("header.php");
		?>
        <!-- fin header -->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!--tabla-->
		<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
								<a href="ABMProductos.php" style="float:right"><strong>Añadir producto</strong></a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered"></table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>
		<!--fin tabla-->
		<!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
	<script src="jquery-3.4.1.js" type="text/javascript"></script>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!--<script src="assets/js/init-scripts/data-table/datatables-init.js"></script>-->
	 

	
	
	<script>
    (function ($) {                
        $.ajax({
            async:true,
            type: "POST",
            url: "controller/productoController.php",                    
            data:"accion=listar",
            beforeSend:function(){
                //alert('comienzo a procesar');
            },
            success:function(resultado) {                
				//alert (resultado);

                var o = JSON.parse(resultado);//A la variable le asigno el json decodificado                
                $('#bootstrap-data-table-export').DataTable( {
                    data : o,
                    columns: [
                        {data : "NombreProducto", title: "NombreProducto"}, //data: propiedad del atributo, title:nombre de lo que se muestra
						{data : "Precio", title: "Precio"},
						{data : "StockActual", title: "StockActual"},
						{data : "IdCategoria", title: "IdCategoria"},
                        {
                            data: null,
                            title: 'Acciones',
                            className: "text-center",                            
                            render: function (data){
                                return '<input type="button" class="btn btn-outline-secondary btn-lg" onClick="javascript:editar('+ data.IdProducto +');" value="Editar" /> <input type="button" class="btn btn-outline-danger btn-lg" onClick="javascript:eliminar('+ data.IdProducto +');" value="Eliminar" />';
                            }
                        }                        
                    ],
                });
                return true;
            },
            timeout:8000,
            error:function(){
                alert('mensaje de error');
                return false;
            }
        });        
        
        
    })(jQuery);
	
	function eliminar(id){
		$.ajax({
			async:true,
			type:"POST",
			url:"controller/productoController.php?id="+id+"&accion=eliminar",
			beforeSend:function()
			{
				//alert('Comienzo a procesar los datos');
			},
			success:function(result)
			{
				window.location="productos.php";
				return true;
			},
			timeout:8000,
			error: function()
			{
				alert ('Error');
				return false;
			}
		});
	}
	function editar(id){
		window.location="ABMProductos.php?id="+id;
	}
    </script>

</body>

</html>
