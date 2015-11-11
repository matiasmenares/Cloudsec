
<link rel="stylesheet" href ="<?php echo TEMPLATE; ?>plugins/autocomplete/content/styles.css" />

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
        <div class="page-bar">
            <ul class="page-breadcrumb">
	            <li>
	                <a href="home/">
	                    <i class="fa fa-home"></i>
	                    Home
	                </a>
                </li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>
	                <a href="producto/lista/">
	                    <i class="fa fa-cubes"></i>
	                    Productos
	                </a>
                </li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>
                    <i class="fa fa-plus-circle"></i>
                    Agregar Producto
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height red-thunderbird dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Configuración <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                       
                        <li>
                            <a href="#" data-toggle="modal" data-target=".modal">Configurar Impuesto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
         <!-- TAB -->
<form action="" method="post" enctype="multipart/form-data">
	<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed" style="margin-bottom: 0;">
		<ul class="nav nav-tabs" role="tablist">
		 			<li role="presentation" class="active">
						<a href="#detalle" class="btn-tabs" id="1" data-nombre="Datos" aria-controls="detalle" role="tab" data-toggle="tab" aria-expanded="false">Dato</a>
					</li>
					<li role="presentation" class="" id="tab_web">
						<a href="#web" class="btn-tabs" id="3" data-nombre="Datos" aria-controls="detalle" role="tab" data-toggle="tab" aria-expanded="false">Web</a>
					</li>
					<li role="presentation" class="">
						<a href="#precio" class="btn-tabs" id="2" data-nombre="Ofertas" aria-controls="detalle2" role="tab" data-toggle="tab" aria-expanded="true">Precio</a>
					</li>
					<li role="presentation" class="disabled">
						<a>Compra</a>
					</li>
					<li role="presentation" class="disabled">
						<a>Oferta</a>
					</li>
					<li  class="pull-right">
					        <button type="submit" class="btn red-thunderbird"> Guardar </button>
					</li>
					
		</ul>
	
		<!-- TAB -->
         <!-- BEGIN PAGE CONTENT-->
<div class="tab-content">
	<div id="detalle" class="tab-pane active" role="tabpanel">
        <div class="row">
        	<div class="col-md-6">
        		<!-- PORTLET -->
				<div class="portlet box blue sombra">
					<div class="portlet-title">
					    <div class="caption">
					    	<i class="icon-equalizer font-sunglo"></i>
					    	<span class="caption-subject font-sunglo bold uppercase">Datos del Producto</span>
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
						    	        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
						    	    </div>
						    	</div>
						    	<div class="form-group">
						    	    <label class="control-label">Código</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-barcode"></i>
						    	        <input type="text" name="codigo" class="form-control" placeholder="Código">
						    	    </div>
						    	</div>
						    	<input type="hidden" name="medida_producto" value="1">
						    	
								<!-- /input-group -->
								<div class="form-group">
							    	<label class="control-label">Plataforma</label>
							    	<div class="input-group">
							    		<span class="input-group-addon">
											<i class="fa fa-truck"></i>			
										</span>
										<select id="plataforma" class="form-control select2me" name="plataforma" data-placeholder="Selecciona Plataforma...">
											<?php 
	                                            if($plataforma>0)
	                                            {
		                                        	$cuenta=count($plataforma);
		                                        	for($x=0;$x<$cuenta;$x++)
		                                            {
		                                            ?>
	                                                <option value="<?php echo $plataforma[$x]['id_plataforma']; ?>" ><?php echo $plataforma[$x]['descripcion_plataforma']; ?> </option>
	                                                <?php
	                                                 }
	                                             } ?>
										</select>
									</div>
						    	</div>
						    		<div class="form-group">
						    	    <label class="control-label">Reserva</label>
						    	    <div class="input-group">
									<span class="input-group-addon">
											<i class="fa fa-truck"></i>			
										</span>				
										<select class="form-control select2me" name="reserva" >
							    	       <option value="0">No</option>
										   <option value="1">Si</option>
						    	       </select>
						    	    </div>
						    	</div>
								<!-- /input-group -->

						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<label for="foto">Ingresar Imagen</label>
						    	
						        <div class="fileinput fileinput-new" data-provides="fileinput">
						        	<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 150px; height: 150px;">
						        	</div>
						        	<div>
						        		<span class="btn btn-apptec btn-file">
						        		<span class="fileinput-new">
						        		Buscar </span>
						        		<span class="fileinput-exists">
						        		Cambiar </span>
						        		<input type="file" name="foto">
						        		</span>
						        		<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
						        		Borrar </a>
						        	</div>
						        </div>
							
						    </div><!-- COL-MD-6 -->
						</div>
						</div>
					</div>
				</div>
        		<!-- /PORTLET -->
        	</div>
        	<div class="col-md-6">
        		<!-- PORTLET -->
				<div class="portlet box blue sombra">
					<div class="portlet-title">
					    <div class="caption">
					    	<i class="fa fa-list-alt font-casablanca"></i>
					    	<span class="caption-subject font-casablanca bold uppercase">Detalle Producto</span>
					    	<span class="caption-helper"></span>
					    </div>
					</div>
					<div class="portlet-body form">
						<div class="form-body">	
						<div class="row">
							<div class="col-xs-12">
	                            <div class="form-group">
	                                <label>Descripción</label>
	                                <textarea class="form-control" name="descripcion_producto" rows="5" placeholder=""></textarea>
	                            </div>
							</div>
						</div>
						</div>
					</div>
				</div>
        		<!-- /PORTLET -->
        	</div>
        	<div class="col-md-12">
        		<!-- PORTLET -->
				<div class="portlet box blue sombra">
					<div class="portlet-title">
					    <div class="caption">
					    	<i class="fa fa-check-square-o font-sharp"></i>
					    	<span class="caption-subject font-sharp bold uppercase">Categorías</span>
					    	<span class="caption-helper"><font color="white"> Seleccione las categorías necesarias</font></span>
					    </div>
					</div>
					<div class="portlet-body form">
						<div class="form-body">	
						<div class="row">
										 	<?php
										 	
                                            if($fila>0)
                                            {
	                                            $fam=null;
	                                            
	                                            for($x=0;$x<count($fila);$x++)
	                                            {
		                                            /*
													if($fam!=$fila[$x]['familia_categoria_id_familia_categoria'])
													{
														$fam=$fila[$x]['familia_categoria_id_familia_categoria'];
														$color = $fila[$x]['color_familia'];
														$font = "#FFFF";
														//getContrastYIQ($color);
														?>
														<p />
														<div class="col-md-12">
															<span class="tag" style="background: <?php echo $fila[$x]['color_familia']; ?>; color: <?php echo $font; ?>;">
																<?php echo $fila[$x]['nombre_familia']; ?>
																<span class="punta pull-right" style="background: #FFF;border-left-color: <?php echo $fila[$x]['color_familia']; ?>;"></span>
															</span>
														</div>
														<?php
													}
													*/
										 	 ?>
										 	 <div class="col-md-3 col-xs-6">
	                                            <div class="checkbox skin-check" aria-checked="false" aria-disabled="false">
	                                            	<label>
		                                        		<input name="categoria[]" type="checkbox" value="<?php echo $fila[$x]['id_categoria']; ?>"/>
														<?php echo $fila[$x]['nombre_categoria']; ?>
													</label>
	                                            </div>
										 	 </div>
											<?php
												}
											}
											?>
                                         </div>
					</div>
					</div>
				</div>
        		<!-- /PORTLET -->
        	</div>
        	<div class="col-md-12">
        		<!-- PORTLET -->
				<div class="portlet box blue sombra">
					<div class="portlet-title">
					    <div class="caption">
					    	<i class="fa fa-cubes font-hoki"></i>
					    	<span class="caption-subject font-hoki bold uppercase">Stock Inicial en Sucursales</span>
					    	<span class="caption-helper"><font color="white"> Ingrese stock inicial y crítico de sucursales</font></span>
					    </div>
					</div>
					<div class="portlet-body form">
						<div class="form-body">	
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<span class="input-group-addon bg-green" style="border-radius:10px"><b>Precio Compra</b></span>
									<div class="input-icon">
						    	  <i class="fa fa-usd"></i>
										<input type="text" name="precio_compra" class="form-control" placeholder="Precio Compra">
							 		</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					<div class="portlet-body form">
						<div class="form-body">	
						<div class="row">
							 <?php
							    if($sucursal>0)
							    {
							        for($x=0;$x<count($sucursal);$x++)
							        {	                                            
							        ?>
							<div class="col-md-3">
							 <div class="form-group">
							 	<span class="input-group-addon bg-blue-hoki" style="border-radius:10px"><b><?php echo $sucursal[$x]['nombre_sucursal']; ?></b></span>
							 	<div class="input-icon">
						    	    <i class="fa fa-cubes"></i>
								 	<input type="text" name="stock_<?php echo $sucursal[$x]['id_sucursal']; ?>" class="form-control" placeholder="Stock en Inventario">
							 	</div>
								 <div class="form-group has-warning">
								 	<div class="input-icon">
							    	        <i class="fa fa-warning"></i>
							    	        <input type="text" name="critico_<?php echo $sucursal[$x]['id_sucursal']; ?>" class="form-control" placeholder="Stock Crítico">
									</div>
								 </div>
							 	</div>
							 <br />
							</div>
							<?php
							
							 	}
							 }
							 	 ?>	
            </div>
					</div>
					</div>
				</div>
        		<!-- /PORTLET -->
        	</div>
        	<div class="col-md-offset-3 col-md-6">
        		<!-- PORTLET -->
				
        		<!-- /PORTLET -->
        	</div>
        </div>
	</div>	
	<!--- TAB WEB-->
	<div id="web" class="tab-pane" role="tabpanel"> 
		<div class="row">
			<div class="col-md-6">
				<div class="portlet box blue sombra">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe font-casablanca"></i>
							<span class="caption-subject font-casablanca bold uppercase">Datos Web</span>
							<span class="caption-helper"><font color="white"> Datos Básicos </font> </span>
						</div>
						<div class="pull-right">
							    <div class="checkbox skin-check" aria-checked="false" aria-disabled="false">
	                           	 <label>
		                       	 	<input id="abrir_web" type="checkbox" name="habilitar_oc" />
							   	 	Habilitar en E-commerce
							   	 </label>
	                           	</div>
						    </div>
					</div>
					
					<div class="portlet-body form">
						<div class="form-body">	
						<div class="row">
							<div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Meta Tag Titulo</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="tag" placeholder="Meta" >
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Plataforma</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" id="modelo" class="form-control" name="modelo" placeholder="Plataforma">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->						
							<div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">SEO</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="keyword" placeholder="Seo" value="">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->	
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Categorías</label>						    	  
							    	    <input class="form-control" id="categoria" placeholder="Selecciona Categoría">					    	  
						    	</div>
						    	<div id="respuesta_categoria">
						    	
						    	</div>						
						    </div><!-- COL-MD-6 -->									    
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="portlet box blue sombra">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe font-casablanca"></i>
							<span class="caption-subject font-casablanca bold uppercase">Dimensiones</span>
							<span class="caption-helper"> </span>
						</div>
					</div>
					
					<div class="portlet-body form">
						<div class="form-body">	
						<div class="row">			
						    <div class="col-md-6">
							    <div class="form-group">
							    	    <label class="control-label">Clase Longitud</label>
							    	   
										<select class="form-control" name="title">
							    	<?php 
								    
								    foreach($longitud as $clave=>$valor){
								    	
								    ?>
							    		<option value="<?php echo $valor['length_class_id']; ?>"><?php echo $valor['title']; ?></option>
							    	<?php
								    }	
								    ?>
										</select>
							    </div>
						    </div>
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Largo</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="length" placeholder="Largo" value="">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Ancho</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="width" placeholder="Ancho" value="">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Alto</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="height" placeholder="Alto" value="">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Peso</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="weight" placeholder="Peso" value="">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
							    <div class="form-group">
							    	    <label class="control-label">Clase Peso</label>
							    	   
										<select class="form-control" name="weight_class_id">
							    	<?php 
								    
								    foreach($peso as $clave=>$valor){
								    	
								    ?>
							    		<option value="<?php echo $valor['weight_class_id']; ?>"><?php echo $valor['title']; ?></option>
							    	<?php
								    }	
								    ?>
										</select>
							    </div>
						    </div>					
						    
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="portlet box blue sombra">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe font-casablanca"></i>
							<span class="caption-subject font-casablanca bold uppercase">Descripción</span>
							<span class="caption-helper"> </span>
						</div>
					</div>
					
					<div class="portlet-body form">
						<div class="form-body">	
					
						</div>
					</div>
					
						<textarea class="summernote" name="descripcion_web"></textarea>
					
				</div>
			</div>
		</div>
	</div>
		<!--TAB PRECIOS-->
		<div id="precio" class="tab-pane" role="tabpanel">
			<div class="row">
				<div class="col-md-12">
			        		<!-- PORTLET -->
							<div class="portlet box blue sombra">
								<div class="portlet-title">
								    <div class="caption">
								    	<i class="fa fa-usd font-sunglo"></i>
								    	<span class="caption-subject font-sunglo bold uppercase">Minoristas</span>
								    	<span class="caption-helper"><font color="white">Precios del Producto</font></span>
								    </div>
								</div>
								
								<div class="portlet-body form">
									<div class="form-body">	
										
									<div class="row">
										
										<div class="col-xs-3">
				                            <div class="form-group">
				                            	<label>Precio de Redcompra</label>
				                            	<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
				                            	<input type="text" id="precio_venta_redcompra_neto"  name="precio_venta_redcompra" class="form-control" placeholder="" value="">
									    	    </div>
				                            </div>
										</div>
<!--
											<div class="col-xs-3">
				                            <div class="form-group">
												<label>Precio de Redcompra Bruto </label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="precio_venta_redcompra_bruto" name="" class="form-control" placeholder="Bruto"  value="" disabled="">
									    	    </div>
				                            </div>
										</div>
-->
										<div class="col-xs-3">
				                            <div class="form-group">
												<label>Precio de Venta Minorista </label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="precio_venta_minorista_neto" name="precio_venta_minorista" class="form-control" placeholder=""  value="">
									    	    </div>
				                            </div>
										</div>
<!--
	<div class="col-xs-3">
				                            <div class="form-group">
												<label>Precio de Venta Minorista Bruto </label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="precio_venta_minorista_bruto" name="precio_venta_minorista" class="form-control" placeholder=""  value="" disabled="">
									    	    </div>
				                            </div>
										</div>
-->
									
									</div>
									</div>
								</div>
							</div>
										
						<!--<div class="portlet box blue sombra">
								<div class="portlet-title">
								    <div class="caption">
								    	<i class="fa fa-usd font-sunglo"></i>
								    	<span class="caption-subject font-sunglo bold uppercase">Mayorista</span>
								    	<span class="caption-helper"><font color="white">Precios del Producto</font></span>
								    </div>
								</div>
								
								<div class="portlet-body form">
									<div class="form-body">	
									<div class="row">
										<div class="col-xs-4">
				                            <div class="form-group">
												<label>Precio de Venta Mayorista</label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="precio_mayorista_neto" name="precio_venta_mayorista" class="form-control" placeholder=""  value="">
									    	    </div>
				                            </div>
										</div>
<!--
											<div class="col-xs-4">
				                            <div class="form-group">
												<label>Precio de Venta Mayorista Bruto</label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="precio_mayorista_bruto" name="" class="form-control" placeholder=""  value="" disabled=""> 
									    	    </div>
				                            </div>
										</div>
									</div>
									</div>
								</div>
						</div>
						<div class="portlet box blue sombra">
								<div class="portlet-title">
								    <div class="caption">
								    	<i class="fa fa-usd font-sunglo"></i>
								    	<span class="caption-subject font-sunglo bold uppercase"><font color="white">Descuento</font></span>
								    
								    </div>
								</div>
								
								<div class="portlet-body form">
									<div class="form-body">	
									<div class="row">

										<div class="col-xs-4">
				                            <div class="form-group">
												<label>Precio de Venta Mayorista LISTA 1</label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="" name="precio_venta_mayorista_lista1" class="form-control" placeholder=""  value="">
									    	    </div>
				                            </div>
										</div>
										<div class="col-xs-4">
				                            <div class="form-group">
												<label>Precio de Venta Mayorista LISTA 2</label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="" name="precio_venta_mayorista_lista2" class="form-control" placeholder=""  value="">
									    	    </div>
				                            </div>
										</div>
										<div class="col-xs-4">
				                            <div class="form-group">
												<label>Precio de Venta Mayorista LISTA 3</label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="" name="precio_venta_mayorista_lista3" class="form-control" placeholder=""  value="">
									    	    </div>
				                            </div>
										</div>
									</div>
									</div>
								</div>
						</div>
						-->
						<div class="portlet box blue sombra">
								<div class="portlet-title">
								    <div class="caption">
								    	<i class="fa fa-usd font-sharp"></i>
								    	<span class="caption-subject font-sharp bold uppercase">Precios de Ventas</span>
								    	<span class="caption-helper"><font color="white">Precios de ventas Activadas</font></span>
								    </div>
								    <a tabindex="0" class="btn popovers" role="button" data-toggle="popover" data-trigger="hover" title="Precio" data-content="Precios de ventas asociados al producto"><i class="fa fa-info-circle fa-2x"></i></a>
								</div>
								<div class="portlet-body form">
								
									<table class="table table-bordered">
											<thead>
												<tr>
													<th>Minorista</th>
													<th>RedCompra</th>
													<th>Mayorista</th>
													<th>Descuento 1</th>
													<th>Descuento 2</th>
													<th>Descuento 3</th>
													<th>Fecha</th>
													<th>Activar</th>											
													<th>Eliminar</th>											
												</tr>
											</thead>
										<tbody id="tabla-precio">
										<?php
										
										if(!empty($precio)){
											
											foreach($precio AS $clave => $valor){
												
										?>
										<tr>
												<td class="<?php if($valor['activado_producto_precio_venta']==1){ echo "success"; } ?>">
													<input type="text" class="form-control descripcion" readonly="" value="$<?php echo number_format($valor['precio_minorista_producto_precio_venta'],0,",","."); ?>">
												</td>
												<td class="<?php if($valor['activado_producto_precio_venta']==1){ echo "success"; } ?>">
													<input type="text" class="form-control cantidad" name="" readonly="" value="$<?php echo number_format($valor['precio_redcompra_producto_precio_venta'],0,",","."); ?>">
												</td>
												<td class="<?php if($valor['activado_producto_precio_venta']==1){ echo "success"; } ?>">
													<input type="text" class="form-control descripcion" readonly="" value="$<?php echo number_format($valor['precio_mayorista_producto_precio_venta'],0,",","."); ?>">
												</td>
												<td class="<?php if($valor['activado_producto_precio_venta']==1){ echo "success"; } ?>">
													<input type="text" class="form-control descripcion" readonly="" value="$<?php echo number_format($valor['precio_lista1_producto_precio_venta'],0,",","."); ?>">
												</td><td class="<?php if($valor['activado_producto_precio_venta']==1){ echo "success"; } ?>">
													<input type="text" class="form-control descripcion" readonly="" value="$<?php echo number_format($valor['precio_lista2_producto_precio_venta'],0,",","."); ?>">
												</td><td class="<?php if($valor['activado_producto_precio_venta']==1){ echo "success"; } ?>">
													<input type="text" class="form-control descripcion" readonly="" value="$<?php echo number_format($valor['precio_lista3_producto_precio_venta'],0,",","."); ?>">
												</td>
												<td class="<?php if($valor['activado_producto_precio_venta']==1){ echo "success"; } ?>">
													<input type="text" class="form-control precio" readonly="" value="<?php echo date("d-m-Y H:i:s",strtotime($valor['fecha_producto_precio_venta'])); ?>">
												</td>
												<td class="<?php if($valor['activado_producto_precio_venta']==1){ echo "success"; } ?>">
												</td>
												<td class="<?php if($valor['activado_producto_precio_venta']==1){ echo "success"; } ?>">
												<button  class="btn red fileinput-button" name="borrar_oferta" value=""><i class="fa fa-trash-o"></i></button>	
												</td>
											</tr>
										<?php
											}
										}else{	
										?>
										<tr>
										<td class="" colspan="9">
												No Dispone de Precio
												</td>
											</tr>
										<?php 
										}
										?>
										</tbody>
									</table>
								<br />
							</div>
						</div>
							<!--OFERTAS-->
				</div>
			</div>
		</div>
		<!--FIN  TAB PRECIO-->
</div>
    </div>	
</div>
<!--MODAL -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Seleccionar Impuesto</h4>
            </div>
            <div class="modal-body">
               <input type="hidden" name="medida_producto" value="1">
						    	<div class="form-group">
							    	<label class="control-label">Impuesto</label>
							    	<div class="input-group">
							    		<span class="input-group-addon">
											<i class="fa fa-truck"></i>			
										</span>
										<select class="form-control select2me" name="impuesto" data-placeholder="Selecciona Impuesto...">
											<?php 
	                                            if($impuesto>0)
	                                            {
		                                        	for($x=0;$x<count($impuesto);$x++)
		                                            {
		                                            ?>
	                                                <option value="<?php echo $impuesto[$x]['id_impuesto']; ?>" ><?php echo $impuesto[$x]['nombre_impuesto']; ?> </option>
	                                                <?php
	                                                 }
	                                             } ?>
										</select>
									</div>
						    	</div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-actualizar-stock" class="btn blue">Guardar</button>
                <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</form>

    <!-- /.modal-dialog -->
</div>
</body>

<?php require(TEMPLATE.'comun/footer.php'); ?>
<?php require(TEMPLATE.'comun/js.php'); ?>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/summernote/summernote.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/autocomplete/dist/jquery.autocomplete.js"></script>
<script>
		
		  $('.summernote').summernote({
		  	height: 300,                 // set editor height
		  	minHeight: null,             // set minimum height of editor
		  	maxHeight: null,             // set maximum height of editor
		  	focus: true, 
		                  // set focus to editable area after initializing summernote
			});
  		
  		$('#plataforma').on("change",function(target){
	  	  	$('#modelo').val(target.added.text);
	  		
  		});

	
		$("#precio_mayorista_neto").keyup(function(){ valorBruto("precio_mayorista_bruto","precio_mayorista_neto"); });
		
		$("#precio_venta_redcompra_neto").keyup(function(){ valorBruto("precio_venta_redcompra_bruto","precio_venta_redcompra_neto"); });

		$("#precio_venta_minorista_neto").keyup(function(){ valorBruto("precio_venta_minorista_bruto","precio_venta_minorista_neto"); });

		
		function valorBruto(bruto,neto){
			
		var valor = (parseInt($("#"+neto).val())*0.19)+parseInt($("#"+neto).val());
		
		$("#"+bruto).val(Math.round(valor));
	      
	     }
	     
	     $('#categoria').autocomplete({
		    serviceUrl: '<?php echo URL_FRONTEND; ?>ajax_categoriasop/',
		    onSelect: function (suggestion) {
			    $('#respuesta_categoria').append('<div id="categoria_'+suggestion.data+'" >'+suggestion.value+' <input type="hidden" name="categoriaweb[]" value="'+suggestion.data+'" /> <a href="javascript:;" id="borrar_'+suggestion.data+'" data-id="'+suggestion.data+'" class="borrar_categoria" ><i class="fa fa-trash"></i></a></div>');

			    $("#categoria").val('');
		    }
		});
		$('#respuesta_categoria').on('click','.borrar_categoria', function(){
			$('#categoria_'+$(this).data('id')).remove();
		});
		
		
		

	function stopRKey(evt) {
var evt = (evt) ? evt : ((event) ? event : null);
var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
if ((evt.keyCode == 13) && (node.type=="text")) {return false;}
}
document.onkeypress = stopRKey;



	
</script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/ingresar-producto.js"></script>
</body>
<!-- END BODY -->


<!-- END BODY -->

</html>