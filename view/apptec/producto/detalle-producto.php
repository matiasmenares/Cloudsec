</head>
<body class="<?php if($_SESSION['menu_side'] == 0){ echo "page-sidebar-closed page-sidebar-closed-hide-logo"; }elseif($_SESSION['menu_side'] == 1){ echo ""; } ?>">
<?php require(TEMPLATE.'comun/header.php'); ?>
<?php require(TEMPLATE.'comun/menu.php'); ?>
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="modal-eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title"><i class="fa fa-warning"></i> Eliminar Producto</h4>
                    </div>
                    <div class="modal-body">
                        ¿Esta seguro que desea eliminar el producto?
                    </div>
                    <div class="modal-footer">
						<form action="producto/lista/" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']?>">
	                        <button type="submit" name="delProd" class="btn blue">Aceptar</button>
	                        <button type="button" class="btn default" data-dismiss="modal">Cancelar</button>
						</form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        
        
        <div class="modal fade" id="producto_precio_compra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content modal-sm">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		                <h4 class="modal-title">Editar Compra</h4>
		            </div>
		            <div class="modal-body">
						<div class="form-group">
							<label class="control-label">Cantidad Compra</label>
							<input type="hidden" class="form-control" id="id_producto_precio_compra" />
							<input type="text" class="form-control" id="stock_inicial_producto_precio_compra" />
						</div>
						<div class="form-group">
							<label class="control-label">Stock Disponible</label>
							<input type="text" class="form-control" id="stock_producto_precio_compra" />
							<input type="hidden" class="form-control" id="stock_producto_precio_compra_antiguo" />
						</div>
						<div class="form-group">
							<label class="control-label">Precio Compra</label>
							<input type="text" class="form-control" id="precio_producto_precio_compra" />
						</div>
						<div class="form-group">
							<label class="control-label">Fecha</label>
							<input type="text" class="form-control" id="fecha_producto_precio_compra" />
						</div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" id="editar_stock" class="btn blue">Guardar</button>
		                <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
		            </div>
		        </div>
		    </div>
		</div>

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
	                <a href="producto/lista/">
	                    <i class="fa fa-barcode"></i>
	                    Productos
	                </a>
                </li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>
                    <i class="fa fa-barcode"></i>
                    Detalle Producto
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height red-thunderbird dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Acciones <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
		              <li>
		               <a type="button" href="#" data-toggle="modal" data-target="#modal-eliminar" >Eliminar</a>
		              </li>
                    </ul>
                </div>
            </div>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
<form action="" method="POST" enctype="multipart/form-data">
        <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed" style="margin-bottom: 0;">
		<ul class="nav nav-tabs" role="tablist">
		 			<li role="presentation" class="active">
						<a href="#detalle" class="btn-tabs" id="1" data-nombre="Datos" aria-controls="detalle" role="tab" data-toggle="tab" aria-expanded="false">Dato</a>
					</li>
					<li role="presentation" id="tab_web">
						<a href="#web" class="btn-tabs" id="2" data-nombre="Ofertas" aria-controls="detalle2" role="tab" data-toggle="tab" aria-expanded="true">Web</a>
					</li>
					<li role="presentation" class="">
						<a href="#precio" class="btn-tabs" id="2" data-nombre="Ofertas" aria-controls="detalle2" role="tab" data-toggle="tab" aria-expanded="true">Precio</a>
					</li>
					<li role="presentation" class="">
						<a href="#preciocompra" class="btn-tabs" id="2" data-nombre="Ofertas" aria-controls="detalle2" role="tab" data-toggle="tab" aria-expanded="true">Compra</a>
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
					<input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
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
								    	        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $producto['nombre_producto']; ?>">
								    	    </div>
								    	</div>
								    	<div class="form-group">
								    	    <label class="control-label">Código</label>
								    	    <div class="input-icon">
								    	        <i class="fa fa-barcode"></i>
								    	        <input type="text" name="codigo" class="form-control" placeholder="Código" value="<?php echo $producto['codigo_producto']; ?>">
								    	    </div>
								    	</div>
								    	<input type="hidden" name="medida_producto" value="1">
										<!-- /input-group -->
										<div class="form-group">
									    	<label class="control-label">Plataforma</label>
									    	<div class="input-group">
									    		<span class="input-group-addon">
													<i class="fa fa-gamepad"></i>			
												</span>
												<select id="plataforma" class="form-control select2me" name="plataforma" data-placeholder="Selecciona Plataforma...">
													<?php 
			                                            if($plataforma>0)
			                                            {
				                                        	for($x=0;$x<count($plataforma);$x++)
				                                            {
				                                            ?>
			                                                <option <?php if($producto['plataforma_id_plataforma']==$plataforma[$x]['id_plataforma']){ echo "selected"; } ?> value="<?php echo $plataforma[$x]['id_plataforma']; ?>" ><?php echo $plataforma[$x]['descripcion_plataforma']; ?> </option>
			                                                <?php
			                                                 }
			                                             } ?>
												</select>
											</div>
								    	</div>
										<!-- /input-group -->
										<div class="form-group">
								    	    <label class="control-label">Reserva</label>
								    	    <div class="input-group">
											<span class="input-group-addon">
													<i class="fa fa-truck"></i>			
												</span>				
												<select class="form-control select2me" name="reserva">
									    	       <option <?php if($producto['reserva_producto']==0){ echo "selected"; } ?> value="0">No</option>
												   <option <?php if($producto['reserva_producto']==1){ echo "selected"; } ?> value="1">Si</option>
								    	       </select>
								    	    </div>
								    	</div>
								    </div><!-- COL-MD-6 -->
								    <div class="col-md-6">
								    	<label for="foto">Ingresar Imagen</label>
								    	<input type="hidden" name="foto_antigua" value="<?php echo $producto['imagen_producto'];?>">
								        <div class="fileinput fileinput-new" data-provides="fileinput">
								        	<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 250px; height: 200px;">
									        	<img src="<?php echo DIR_UPLOAD_OPENCART.$producto['imagen_producto'];?>">
									        	
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
									<!-- Descripcion -->
									<div class="col-xs-12">
			                            <div class="form-group">
			                                <label>Descripción</label>
			                                <textarea class="form-control" name="descripcion_producto" rows="5" placeholder=""><?php echo $producto['detalle_producto']; ?></textarea>
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
							    	<span class="caption-helper">Seleccione las categorías necesarias</span>
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
			                                            <div class="checkbox skin-check <?php if(is_array($categoria)){ if(in_array($fila[$x]['id_categoria'], $categoria)){ echo "checked"; } }  ?>" aria-checked="false" aria-disabled="false">
			                                            	<label>
				                                        		<input name="categoria[]" <?php if(is_array($categoria)){ if(in_array($fila[$x]['id_categoria'], $categoria)){ echo "checked"; } }  ?> type="checkbox" value="<?php echo $fila[$x]['id_categoria']; ?>"/>
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
							    	<span class="caption-subject font-hoki bold uppercase"><span class="nombre_medida"></span> en Sucursales</span>
							    	<span class="caption-helper">Ingrese stock actual y crítico de sucursales</span>
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
									 	<span class="input-group-addon bg-blue-hoki"><b><?php echo $sucursal[$x]['nombre_sucursal']; ?></b></span>
									 	<div class="input-icon">
								    	    <i class="fa fa-cubes"></i>
										 	<input readonly="" type="text" name="stock_<?php echo $sucursal[$x]['id_sucursal']; ?>" class="form-control" placeholder="Stock en Inventario" value="<?php echo $sucursal[$x]['stock_producto_precio_compra']; ?>"  >
									 	</div>
										 <div class="form-group has-warning">
										 	<div class="input-icon">
									    	        <i class="fa fa-warning"></i>
									    	        <input type="text" name="critico_<?php echo $sucursal[$x]['id_sucursal']; ?>" class="form-control" placeholder="Stock Crítico" value="<?php echo $sucursal[$x]['stock_critico_sucursal_producto']; ?>">
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
				</div>
		        <!-- END PAGE CONTENT-->
		    </div>
		    <!--END TAB DATOS-->
	<!--- TAB WEB-->
	<div id="web" class="tab-pane" role="tabpanel"> 
		<div class="row">
			<div class="col-md-6">
				<div class="portlet box blue sombra">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe font-casablanca"></i>
							<span class="caption-subject font-casablanca bold uppercase">Datos Web</span>
							<span class="caption-helper"> </span>
						</div>
						<div class="pull-right">
						    <div class="checkbox skin-check" aria-checked="false" aria-disabled="false">
			        	   	 <label>
				    	   	 	<input id="abrir_web" type="checkbox" name="habilitar_oc" value="1" <?php if($web["status"]==1) echo "checked"; ?> />
						   	 	E-commerce
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
						    	         <input type="hidden" name="product_id_oc" id="product_id_oc" value="<?php echo $producto['product_id_oc']; ?>" />
						    	        <input type="text" class="form-control" name="tag" placeholder="Meta Tag" value="<?php echo $web["tag"]; ?>">
						    	       
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Plataforma</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" id="modelo" class="form-control" name="model" placeholder="Plataforma" value="<?php echo $web["model"]; ?>">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Seo</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="keyword" placeholder="SEO" value="<?php echo $seo["keyword"]; ?>">						    	   
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Categorías</label>
						    	    <div class="input-icon">
							    	    <input class="form-control" id="categoria" placeholder="Selecciona Categoría">
						    	    </div>
						    	</div>
						    	<div id="respuesta_categoria">
							    	<?php 
								    	if(isset($category)){
								    	foreach($category as $clave=>$valor){ ?>
							    	<div id="categoria_<?php echo $valor[0]['category_id']; ?>"><?php echo $valor[0]['name']; ?> <input type="hidden" name="categoriaweb[]" value="<?php echo $valor[0]['category_id']; ?>"> <a href="javascript:;" id="borrar_<?php echo $valor[0]['category_id']; ?>" data-id="<?php echo $valor[0]['category_id']; ?>" class="borrar_categoria"><i class="fa fa-trash"></i></a></div>
							    	<?php }
								    	} ?>
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
						<div class="pull-right">
						    <div class="checkbox skin-check" aria-checked="false" aria-disabled="false">
			        	   	
			        	   	</div>
						</div>
					</div>
					
					<div class="portlet-body form">
						<div class="form-body">	
						<div class="row">
						    <div class="col-md-6">
						    	 <div class="form-group">
							    	    <label class="control-label">Clase Longitud</label>
							    	   
										<select class="form-control" name="length_class_id" data-placeholder="Selecciona longitud...">
													<?php 
			                                            if($longitud>0)
			                                            {
				                                        	for($x=0;$x<count($longitud);$x++)
				                                            {
				                                            ?>
			                                                <option <?php if($web['length_class_id']==$longitud[$x]['length_class_id']){ echo "selected"; } ?> value="<?php echo $longitud[$x]['length_class_id']; ?>" ><?php echo $longitud[$x]['title']; ?> </option>
			                                                <?php
			                                                 }
			                                             } ?>
										</select>
							    </div>					
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Largo</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="length" placeholder="Largo" value="<?php echo $web["length"]; ?>">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Ancho</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="width" placeholder="Ancho" value="<?php echo $web["width"]; ?>">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Alto</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="height" placeholder="Alto" value="<?php echo $web["height"]; ?>">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
						    	<div class="form-group">
						    	    <label class="control-label">Peso</label>
						    	    <div class="input-icon">
						    	        <i class="fa fa-tag"></i>
						    	        <input type="text" class="form-control" name="weight" placeholder="Peso" value="<?php echo $web["weight"]; ?>">
						    	    </div>
						    	</div>						
						    </div><!-- COL-MD-6 -->
						    <div class="col-md-6">
							    <div class="form-group">
							    	    <label class="control-label">Clase Peso</label>
							    	<select class="form-control" name="weight_class_id" data-placeholder="Selecciona Peso...">
													<?php 
			                                            if($peso>0)
			                                            {
				                                        	for($x=0;$x<count($peso);$x++)
				                                            {
				                                            ?>
			                                                <option <?php if($web['weight_class_id']==$peso[$x]['weight_class_id']){ echo "selected"; } ?> value="<?php echo $peso[$x]['weight_class_id']; ?>" ><?php echo $peso[$x]['title']; ?> </option>
			                                                <?php
			                                                 }
			                                             } ?>
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
						<div class="pull-right">
						    <div class="checkbox skin-check" aria-checked="false" aria-disabled="false">
			        	   	
			        	   	</div>
						</div>
					</div>
					<div class="portlet-body form">
						<div class="row">
							<div class="col-md-12">
								<textarea  class="summernote" name="description"><?php echo $web["description"]; ?></textarea>
							</div>
						</div>
					</div>
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
								    	<span class="caption-subject font-sunglo bold uppercase">Minorista</span>
								    	<span class="caption-helper">Precios del Producto</span>
								    </div>
								</div>
								
								<div class="portlet-body form">
									<div class="form-body">	
									<div class="row">
										<div class="col-md-12">
											<div class="col-xs-3">
				                            <div class="form-group">
				                            	<label>Precio de Redcompra</label>
				                            	<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
				                            	<input type="text" id="precio_venta_redcompra_neto"  name="precio_venta_redcompra" class="form-control" placeholder="Bruto" value="">
									    	    </div>
				                            </div>
										</div>
											
										<div class="col-xs-3">
				                            <div class="form-group">
												<label>Precio de Venta Minorista </label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="precio_venta_minorista_neto" name="precio_venta_minorista" class="form-control" placeholder="Bruto"  value="">
									    	    </div>
				                            </div>
										</div>
										</div>
									</div>
									</div>
								</div>
							</div>
							<!--<div class="portlet box blue sombra">
								<div class="portlet-title">
								    <div class="caption">
								    	<i class="fa fa-usd font-sunglo"></i>
								    	<span class="caption-subject font-sunglo bold uppercase">Mayorista</span>
								    	<span class="caption-helper">Precios del Producto</span>
								    </div>
								</div>
									<div class="portlet-body form">
										<div class="form-body">	
											<div class="row">
												<div class="col-md-12">
													<div class="col-xs-3">
														<label>Precio de Venta Mayorista </label>  
														<div class="input-icon">
											    	        <i class="fa fa-usd"></i>
														<input type="text" id="precio_mayorista_neto" name="precio_venta_mayorista" class="form-control" placeholder="Bruto"  value="">
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
								    	<span class="caption-subject font-sunglo bold uppercase">Descuento</span>
								    	<span class="caption-helper">Precios del Producto</span>
								    </div>
								</div>
								
								<div class="portlet-body form">
									<div class="form-body">	
									<div class="row">
										<div class="col-md-12">
											<div class="col-xs-3">
				                            <div class="form-group">
												<label>Precio de Venta Mayorista LISTA 1</label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="" name="precio_venta_mayorista_lista1" class="form-control" placeholder="Neto"  value="">
									    	    </div>
				                            </div>
										</div>
										<div class="col-xs-4">
				                            <div class="form-group">
												<label>Precio de Venta Mayorista LISTA 2</label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="" name="precio_venta_mayorista_lista2" class="form-control" placeholder="Neto"  value="">
									    	    </div>
				                            </div>
										</div>
										<div class="col-xs-4">
				                            <div class="form-group">
												<label>Precio de Venta Mayorista LISTA 3</label>  
												<div class="input-icon">
									    	        <i class="fa fa-usd"></i>
												<input type="text" id="" name="precio_venta_mayorista_lista3" class="form-control" placeholder="Neto"  value="">
									    	    </div>
				                            </div>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>-->
						<div class="portlet box blue sombra">
								<div class="portlet-title">
								    <div class="caption">
								    	<i class="fa fa-usd font-sharp"></i>
								    	<span class="caption-subject font-sharp bold uppercase">Precios de Ventas</span>
								    	<span class="caption-helper">Precios de ventas Activadas</span>
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
												
											</tr>
										<?php
											}
										}else{	
										?>
										<tr>
										<td class="" colspan="8">
												No Dispone de Ofertas
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
		<!--TAB DESCUENTOS-->

		<div id="preciocompra" class="tab-pane" role="tabpanel"> 
			<div class="row">
		        	<div class="col-md-12">
		        		<!-- PORTLET -->
						<div class="portlet box blue sombra">
							<div class="portlet-title">
							    <div class="caption">
							    	<i class="fa fa-truck font-sunglo"></i>
							    	<span class="caption-subject font-sunglo bold uppercase">Movimientos de Compra</span>
							    	<span class="caption-helper">Movimientos de compra del Producto</span>
							    </div>
							</div>
							<div class="portlet-body form">
								<div class="row">
									<div class="col-md-12">
										<div class="col-xs-12">
											<table class="table table-bordered">
										<thead>
											<tr>
												<th>Id Orden</th>
												<th>Proveedor</th>
												<th>Cantidad Compra</th>
												<th>Stock Disponible</th>
												<th>Precio Compra</th>
												<th>Fecha</th>
												<th>Sucursal</th>
												<th>Editar</th>											
											</tr>
										</thead>
									<tbody id="tabla-oferta">
									<?php
									
									if($precio_compra>0){

										foreach($precio_compra AS $clave => $valor){
									?>
										<tr>
											<?php
											if(!empty($valor['orden_compra_id_orden_compra'])){
														?>
											<td class="id">
												<input type="text" class="form-control descripcion id_orden_compra" readonly="" value="<?php echo $valor['orden_compra_id_orden_compra'];  ?>">
												<input type="hidden" class="form-control descripcion id_producto_precio_compra" readonly="" value="<?php echo $valor['id_producto_precio_compra'];  ?>">
												<input type="hidden" class="form-control descripcion producto_id_producto" readonly="" value="<?php echo $valor['producto_id_producto'];  ?>">
											</td>
											<td class="descripcion">
												<input type="text" class="form-control descripcion" readonly="" value="<?php echo $valor['nombre_proveedor']; ?>">
											</td>
														<?php
														
													}else{
													?>
													<input type="hidden" class="form-control descripcion id_producto_precio_compra" readonly="" value="<?php echo $valor['id_producto_precio_compra'];  ?>">
											<td class="descripcion">
												<input type="text" class="form-control descripcion" readonly="" value="Sin Orden">
											</td>
											<td class="descripcion">
												<input type="text" class="form-control descripcion" readonly="" value="Sin Orden">
											</td>
													<?php	
													}
													?>
																					
												
											<td class="descripcion">
												<input type="text" class="form-control stock_inicial_producto_precio_compra" readonly="" value="<?php echo $valor['stock_inicial_producto_precio_compra']; ?>">
											</td>
											<td class="stock">
												<input type="text" class="form-control stock_producto_precio_compra" readonly="" value="<?php echo $valor['stock_producto_precio_compra']; ?>">
											</td>
											<td >
												<div class="input-icon">
													<i class="fa fa-usd"></i>
													<input type="text" class="form-control precio_producto_precio_compra" name="" readonly="" value="<?php echo number_format($valor['precio_producto_precio_compra'],0,",","."); ?>">
												</div>
											</td>
											<td class="">
												<input type="text" class="form-control fecha_producto_precio_compra" readonly="" value="<?php echo date("d-m-Y", strtotime($valor['fecha_producto_precio_compra'])) ?>">
											</td>
											<td class="">
												<input type="text" class="form-control precio" readonly="" value="<?php echo  $valor['nombre_sucursal']; ?>">
											</td>
											<td class="">
											<button  type="button" class="btn green fileinput-button modal_producto_precio_compra" name="borrar_oferta" value=""><i class="fa fa-pencil"></i></button>	
											</td>
										</tr>
									<?php
										}
									}else{	
									?>
									<tr>
									<td class="" colspan="8">
											No Dispone de Compras
											</td>
										</tr>
									<?php 
									}
									?>
									</tbody>
									</table>
										</div>
								    </div><!-- COL-MD-6 -->
								</div>
							</div>
		        		<!-- /PORTLET -->
						</div>
		        	</div>
			</div>
		</div>
		<!-- FIN TAB PRECIO COMPRA-->

		<!--TAB DESCUENTOS-->

		<div id="detalle2" class="tab-pane" role="tabpanel"> 
			<div class="row">
		        	<div class="col-md-12">
		        		<!-- PORTLET -->
						<div class="portlet box blue">
							<div class="portlet-title">
							    <div class="caption">
							    	<i class="fa fa-cart-arrow-down font-sunglo"></i>
							    	<span class="caption-subject font-sunglo bold uppercase">Oferta</span>
							    	<span class="caption-helper">Oferta del Producto</span>
							    </div>
							</div>
							<div class="portlet-body form">
								<div class="form-body">	
								<div class="row">
									<div class="col-md-12">
										<div class="col-xs-6">
									    	<div class="form-group">
									    	    <label class="control-label">Fecha Inicio</label>
									    	    <div class="input-icon">
									    	        <i class="fa fa-calendar"></i>
													<input type="text" id="fecha-inicio-oferta" name="" class="form-control date date-picker pull-left">
									    	    </div>
									    	</div>
										</div>
										<div class="col-xs-6">
									    	<div class="form-group">
									    	    <label class="control-label">Fecha Termino</label>
									    	    <div class="input-icon">
									    	        <i class="fa fa-calendar"></i>
									    	        <input id="fecha-termino-oferta" type="text" name="" class="form-control date date-picker" >
									    	    </div>
									    	</div>
										</div>
										<!-- /input-group -->
										<div class="col-xs-6">
											<div class="form-group">
									    	    <label class="control-label">Cliente</label>
									    	    <div class="input-group">
												<span class="input-group-addon">
														<i class="fa fa-user"></i>			
													</span>				
													<select id="cliente-oferta" class="form-control select2me" >
										    	       <option value="0">Mayorista</option>
													   <option value="1">Minorista</option>
									    	       </select>
									    	    </div>
									    	</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
									    	    <label class="control-label">Cantidad</label>
									    	    <div class="input-icon">
									    	        <i class="fa fa-cubes"></i>
									    	        <input id="cantidad-oferta" type="text" name="" class="form-control" >
									    	    </div>
									    	</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
									    	    <label class="control-label">Precio Actual</label>
									    	    <div class="input-icon">
									    	        <i class="fa fa-usd"></i>
									    	        <input id="precio-actual-oferta" type="text" name="" class="form-control" disabled="" value="<?php echo number_format($precio_actual['precio_mayorista_producto_precio_venta'],0,",","."); ?>" >
									    	    </div>
									    	</div>
										</div>
										<div class="col-xs-12">
											<div class="form-group">
									    	    <label class="control-label">Precio Nuevo</label>
									    	    <div class="input-icon">
									    	        <i class="fa fa-usd"></i>
									    	        <input  id="precio-oferta"  type="text" name="" class="form-control" >
									    	    </div>
									    	</div>
										</div>
										<div class="col-xs-offset-10">
											<div class="form-group">
												<button id="agregar-oferta" type="button" class="btn red-thunderbird btn-block padding"><i class="fa fa-plus-circle"></i> Agregar</button>
											</div>
										</div>
								    </div><!-- COL-MD-6 -->
								</div>
								</div>
							</div>
		        		<!-- /PORTLET -->
						</div>
						<div class="portlet box blue sombra">
							<div class="portlet-title">
							    <div class="caption">
							    	<i class="fa fa-minus-square font-sharp"></i>
							    	<span class="caption-subject font-sharp bold uppercase">Ofertas</span>
							    	<span class="caption-helper">Ofertas Activadas</span>
							    </div>
							    <a tabindex="0" class="btn popovers" role="button" data-toggle="popover" data-trigger="hover" title="Ofertas" data-content="Acá se visualizan las ofertas activadas"><i class="fa fa-info-circle fa-2x"></i></a>
							</div>
							<div class="portlet-body form">
								
								<table class="table table-bordered">
										<thead>
											<tr>
												<th>Clientes</th>
												<th>Cantidad</th>
												<th>Precio</th>
												<th>Fecha Inicio</th>	
												<th>Fecha Término</th>											
												<th>Eliminar</th>											
											</tr>
										</thead>
									<tbody id="tabla-oferta">
									<?php
									
									if($oferta>0){

										foreach($oferta AS $clave => $valor){
									?>
										<tr>
											<td class="descripcion">
												<input type="text" class="form-control descripcion" readonly="" value="<?php if($valor['mayorista_minorista']==0){ echo "Mayorista"; }else{ echo "Minorista"; } ?>">
											</td>
											<td class="descripcion">
												<input type="text" class="form-control descripcion" readonly="" value="<?php echo $valor['stock_producto_oferta']; ?>">
											</td>
											<td class="id">
												<input type="text" class="form-control cantidad" name="" readonly="" value="$<?php echo number_format($valor['precio_producto_oferta'],0,",","."); ?>">
											</td>
											<td class="">
												<input type="text" class="form-control precio" readonly="" value="<?php echo  $valor['fecha_inicio_producto_oferta'] ?>">
											</td>
											<td class="">
												<input type="text" class="form-control precio" readonly="" value="<?php echo  $valor['fecha_termino_producto_oferta'] ?>">
											</td>
											<td class="">
											<button  class="btn red fileinput-button" name="borrar_oferta" value=""><i class="fa fa-trash-o"></i></button>	
											</td>
										</tr>
									<?php
										}
									}else{	
									?>
									<tr>
									<td class="" colspan="8">
											No Dispone de Ofertas
											</td>
										</tr>
									<?php 
									}
									?>
									</tbody>
									</table>
									<br />
							
						</div>
						<!--Descuentos-->
		        	</div>
		  		</div>
			</div>
		  	<!--FIN TAB DESCUENTOS-->
	</div>
</form>


	<!--FIN TAB-->
	<!--MODAL  Embalado-->
						<div class="modal fade seguimiento" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						    <div class="modal-dialog">
						        <div class="modal-content">
						            <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						                <h4 class="modal-title">Descuento</h4>
						            </div>
						            <form action="" method="POST">
						            <div class="modal-body">
						               <input type="hidden" name="medida_producto" value="1">
												    	<div class="form-group">
													    	<label class="control-label">Comentario de aprobación</label>
																<textarea name="comentario" class="form-control"></textarea>
												    	</div>
						            </div>
						            <div class="modal-footer">
						                <button type="submit" name="estado_pedido" value="5" id="btn-actualizar-stock" class="btn blue">Guardar</button>
						                <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
										</form>
						            </div>
						        </div>
						    </div>
						</div>
	<!--MODAL Embalado -->

<?php require(TEMPLATE.'comun/footer.php'); ?>
<?php require(TEMPLATE.'comun/js.php'); ?>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/mini-calendario.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/summernote/summernote.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/autocomplete/dist/jquery.autocomplete.js"></script>
<script>
		
		$('.summernote').summernote({
		  	height: 300,                 // set editor height
		  	minHeight: null,             // set minimum height of editor
		  	maxHeight: null,             // set maximum height of editor
		  	focus: true,                 // set focus to editable area after initializing summernote
		});
  		
  		$('#plataforma').on('change', function(e){
	  		$('#modelo').val(e.added.text);
  		});
  		
  		/* EDICIÓN PRECIO COMPRA */
  		
  		$('#preciocompra').on('click','.modal_producto_precio_compra', function(){
	  		$('#id_producto_precio_compra').val($(this).closest('tr').find('.id_producto_precio_compra').val());
	  		$('#stock_inicial_producto_precio_compra').val($(this).closest('tr').find('.stock_inicial_producto_precio_compra').val());
	  		$('#stock_producto_precio_compra').val($(this).closest('tr').find('.stock_producto_precio_compra').val());
	  		$('#stock_producto_precio_compra_antiguo').val($(this).closest('tr').find('.stock_producto_precio_compra').val());
	  		$('#precio_producto_precio_compra').val($(this).closest('tr').find('.precio_producto_precio_compra').val());
	  		$('#fecha_producto_precio_compra').val($(this).closest('tr').find('.fecha_producto_precio_compra').val());
	  		$('#producto_precio_compra').modal('show');
  		});
  		
  		$('#editar_stock').click( function(){
	  		var r = $.ajax({
				    url: "ajax_editarStock/",
					type: "POST",
					data: { id_producto_precio_compra: $('#id_producto_precio_compra').val(), 
							product_id_oc: $('#product_id_oc').val(), 
							stock_inicial_producto_precio_compra: $('#stock_inicial_producto_precio_compra').val(),
							stock_producto_precio_compra: $('#stock_producto_precio_compra').val(),
							stock_producto_precio_compra_antiguo: $('#stock_producto_precio_compra_antiguo').val(),
							precio_producto_precio_compra: $('#precio_producto_precio_compra').val(),
							fecha_producto_precio_compra: $('#fecha_producto_precio_compra').val() },
					dataType: "json"
				});
				r.done(function( msg ) {
					$('#producto_precio_compra').modal('hide');
					location.reload();
				});	
  		});
  		
  		/* EDICIÓN PRECIO COMPRA */
  		
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

$(document).ready(function($) {
	
		
		$("#precio_mayorista_neto").keyup(function(){ valorBruto("precio_mayorista_bruto","precio_mayorista_neto"); });
		
		$("#precio_venta_redcompra_neto").keyup(function(){ valorBruto("precio_venta_redcompra_bruto","precio_venta_redcompra_neto"); });

		$("#precio_venta_minorista_neto").keyup(function(){ valorBruto("precio_venta_minorista_bruto","precio_venta_minorista_neto"); });

		
		function valorBruto(bruto,neto){
			
		var valor = (parseInt($("#"+neto).val())*0.19)+parseInt($("#"+neto).val());
		
		$("#"+bruto).val(Math.round(valor));
	      
	     }
	    ComponentsPickers.init();
	    
	    $("#agregar-oferta").click(function(){
		    
			var fecha_ini = $("#fecha-inicio-oferta").val();
			var fecha_term = $("#fecha-termino-oferta").val();
			var precio =  $("#precio-oferta").val();
			var cantidad = $("#cantidad-oferta").val();
			var cliente = $("#cliente-oferta").val();
			var cliente_nomb = $("#cliente-oferta option:selected").text();
			
			$("#tabla-oferta").prepend('<tr><td class="descripcion"><input name="cliente_oferta[]" type="hidden" class="form-control descripcion"  readonly="" value="'+cliente+'"><input type="text" class="form-control descripcion"  readonly="" value="'+cliente_nomb+'"></td><td class="descripcion"><input name="cantidad_oferta[]" type="text" class="form-control descripcion" readonly="" value="'+cantidad+'"></td><td class="id"><input type="text" class="form-control cantidad" name="precio_oferta[]" readonly="" value="'+precio+'"></td><td class=""><input type="text" name="fecha_inicio_oferta[]" class="form-control precio" readonly="" value="'+fecha_ini+'"></td><td class=""><input type="text" class="form-control precio" name="fecha_termino_oferta[]"  readonly="" value="'+fecha_term+'"></td><td class=""><button  class="btn red fileinput-button" name="borrar_oferta" value=""><i class="fa fa-trash-o"></i></button></td></tr>');
		   
		   $("#precio-actual-oferta").val(precio);
		    
	    });
	    
	        $("#agregar-venta").click(function(){
		    
			var fecha_ini = $("#fecha-inicio-oferta").val();
			var fecha_term = $("#fecha-termino-oferta").val();
			var precio =  $("#precio-oferta").val();
			var cantidad = $("#cantidad-oferta").val();
			var cliente = $("#cliente-oferta").val();
			var cliente_nomb = $("#cliente-oferta option:selected").text();
			
			$("#tabla-oferta").prepend('<tr><td class="descripcion"><input name="cliente_oferta[]" type="hidden" class="form-control descripcion"  readonly="" value="'+cliente+'"><input type="text" class="form-control descripcion"  readonly="" value="'+cliente_nomb+'"></td><td class="descripcion"><input name="cantidad_oferta[]" type="text" class="form-control descripcion" readonly="" value="'+cantidad+'"></td><td class="id"><input type="text" class="form-control cantidad" name="precio_oferta[]" readonly="" value="'+precio+'"></td><td class=""><input type="text" name="fecha_inicio_oferta[]" class="form-control precio" readonly="" value="'+fecha_ini+'"></td><td class=""><input type="text" class="form-control precio" name="fecha_termino_oferta[]"  readonly="" value="'+fecha_term+'"></td><td class=""><button  class="btn red fileinput-button" name="borrar_oferta" value=""><i class="fa fa-trash-o"></i></button></td></tr>');
		   
		   $("#precio-actual-oferta").val(precio);
		    
	    });
	    
	    
	    
	  });
	  
</script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/ingresar-producto.js"></script>
</body>
<!-- END BODY -->


<!-- END BODY -->

</html>