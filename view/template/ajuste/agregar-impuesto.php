</head>

<body class="<?php if($_SESSION['menu_side'] == 0){ echo "page-sidebar-closed page-sidebar-closed-hide-logo"; }elseif($_SESSION['menu_side'] == 1){ echo ""; } ?>">
<?php require(TEMPLATE.'comun/header.php'); ?>
<?php require(TEMPLATE.'comun/menu.php'); ?>
<div class="page-content-wrapper">
    <div class="page-content">
	    <form action="" method="post" enctype="multipart/form-data">
        <div class="page-bar sombra">
        	<ul class="page-breadcrumb">
                <li>
	                <a href="home/">
	                    <i class="fa fa-home"></i>
	                    Home
	                </a>
                </li>
                <li><i class="fa fa-angle-right"></i></li>
	            <li>
	                <a href="lista-categoria/">
	                    <i class="fa fa-tag"></i>
	                    Impuestos
	                </a>
                </li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>
                    <i class="fa fa-plus-circle"></i>
                    Agregar Impuesto
                </li>
            </ul>
            <div class="page-toolbar">               
	                <div class="form-actions right">
                 	<button type="submit" name="agregar_impuesto" class="btn btn-fit-height red-thunderbird"><i class="fa fa-check"></i> Guardar</button>  
	                </div>     
            </div>
        </div>

		<div class="row">
        	<div class="col-md-12">
				<div class="portlet box blue sombra">
					<div class="portlet-title">
					    <div class="caption">
					    	<i class="icon-equalizer font-sunglo"></i>
					    	<span class="caption-subject font-sunglo bold uppercase">Datos de Impuestos</span>
					    	<span class="caption-helper"></span>
					    </div>
					</div>
					<div class="portlet-body form">
						<div class="form-body">	
							<div class="row">
								<div class="col-md-6">
							    	<div class="form-group">
							    	    <label class="control-label">Nombre</label>
							    	    <div class="input-icon">
							    	        <i class="fa fa-tag"></i>
											<input type="hidden" class="form-control" name="ingresar-producto">
							    	        <input type="text" class="form-control" name="nombre" placeholder="Nombre" autocomplete="off">
							    	    </div>
							    	</div>
							    </div>
								<div class="col-md-6">
									<div class="form-group">
							    	    <label class="control-label">valor</label>
							    	    <div class="input-icon">
							    	        <i class="fa fa-barcode"></i>
							    	        <input type="text" class="form-control" name="valor" placeholder="Valor" autocomplete="off">
							    	    </div>
							    	</div>
							    </div><!-- COL-MD-6 -->
							</div><!-- COL-MD-6 -->
						</div>
					</div>
				</div>
			</div>
        </div>
	    </form>
    </div>
</div>

<?php require(TEMPLATE.'comun/footer.php'); ?>
<?php require(TEMPLATE.'comun/js.php'); ?>

<script type="text/javascript" src="js/ingresar-producto.js"></script>
</body>
</html>