</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
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
	                <a href="lista-impuesto/">
	                    <i class="fa fa-tag"></i>
	                    Impuesto
	                </a>
                </li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>
                    <i class="fa fa-cog"></i>
                    Modificar Impuesto
                </li>
            </ul>
            <div class="page-toolbar">               
	                <div class="form-actions right">
                 	<button type="submit" name="mod_impuesto" class="btn btn-fit-height red-thunderbird"><i class="fa fa-check"></i> Modificar</button>  
	                </div>     
            </div>
          
        </div>
        <!-- END PAGE HEADER-->
         <!-- BEGIN PAGE CONTENT-->
        <div class="row">
        	<div class="col-md-12">
        		<!-- PORTLET -->
				<div class="portlet box blue sombra">
					<div class="portlet-title">
					    <div class="caption">
					    	<i class="icon-equalizer font-sunglo"></i>
					    	<span class="caption-subject font-sunglo bold uppercase">Datos de Impuesto</span>
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
										<input type="hidden" class="form-control" name="id_impuesto" value="<?php echo $categoria['id_impuesto']; ?>">
						    	        <input type="text" class="form-control" autocomplete="off" name="nombre" placeholder="Nombre" value="<?php echo $impuesto['nombre_impuesto']; ?>">
						    	    </div>
						    	</div>
						    	
						    </div>

						    <div class="col-md-6">
								<div class="form-group">
						    	    <label class="control-label">Valor</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-barcode"></i>
						    	        <input type="text" name="valor" class="form-control" autocomplete="off" placeholder="Valor" value="<?php echo $impuesto['valor_impuesto']; ?>">
						    	    </div>
						    	</div>
						    </div><!-- COL-MD-6 -->
							</div><!-- COL-MD-6 -->
						    
						</div>
					</div>
					</div>
				</div>
        	</div>
        		<!-- /PORTLET -->
        	</div>
        	
</body>

<?php require(TEMPLATE.'comun/footer.php'); ?>
<?php require(TEMPLATE.'comun/js.php'); ?>

<script type="text/javascript" src="js/ingresar-producto.js"></script>
</body>
<!-- END BODY -->


<!-- END BODY -->

</html>