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
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php require(TEMPLATE.'comun/menu.php'); ?>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<!--
				<div class="page-title">
					<h1>Dashboard <small>statistics & reports</small></h1>
				</div>
				-->
				<!-- END PAGE TITLE -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->
			<!--
			<ul class="page-breadcrumb breadcrumb hide">
				<li>
					<a href="javascript:;">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Dashboard
				</li>
			</ul> -->
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
		<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-green-haze">
								<i class="fa fa-user font-green-haze"></i>
								<span class="caption-subject bold uppercase"> Agregar Contacto</span>
							</div>
							<div class="actions">
								<a class="btn btn-circle btn-icon-only blue" href="javascript:;">
								<i class="icon-cloud-upload"></i>
								</a>
								<a class="btn btn-circle btn-icon-only green" href="javascript:;">
								<i class="icon-wrench"></i>
								</a>
								<a class="btn btn-circle btn-icon-only red" href="javascript:;">
								<i class="icon-trash"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<form role="form" method="post" action="" class="form-horizontal">
								<div class="form-body">
									
									<div class="form-group form-md-line-input has-success">
										<label class="col-md-2 control-label" for="form_control_1">Nombre</label>
										<div class="col-md-10">
											<div class="input-icon right">
												<input type="text" class="form-control" name="nombre_contacto" placeholder="">
												<div class="form-control-focus">
												</div>
												
											</div>
										</div>
									</div>
									
									<div class="form-group form-md-line-input has-success">
										<label class="col-md-2 control-label" for="form_control_1">Apellido Paterno</label>
										<div class="col-md-10">
											<div class="input-icon right">
												<input type="text" class="form-control" name="apellido_paterno_contacto" placeholder="">
												<div class="form-control-focus">
												</div>
												
											</div>
										</div>
									</div>
									
									<div class="form-group form-md-line-input has-success">
										<label class="col-md-2 control-label" for="form_control_1">Apellido materno</label>
										<div class="col-md-10">
											<div class="input-icon right">
												<input type="text" class="form-control" name="apellido_materno_contacto" placeholder="">
												<div class="form-control-focus">
												</div>
												
											</div>
										</div>
									</div>
													
										<div class="form-group form-md-line-input has-success">
										<label class="col-md-2 control-label" for="form_control_1">Email Cliente</label>
										<div class="col-md-10">
											<div class="input-icon right">
												<input type="email" class="form-control" name="email_contacto" placeholder="">
												<div class="form-control-focus">
												</div>
												
											</div>
										</div>
									</div>
									
									<div class="form-group form-md-line-input has-success">
										<label class="col-md-2 control-label" for="form_control_1">Teléfono Cliente</label>	
											<div class="col-md-10">
												<input type="tel" class="form-control" name="telefono_contacto" placeholder="">
												<div class="form-control-focus">
											</div>
										</div>
									</div>
									
																									
									<div class="form-group form-md-line-input  has-success">
										<label class="col-md-2 control-label" for="form_control_1">Sexo</label>
										<div class="col-md-10">
											<select class="form-control" name="sexo" id="form_control_1">
												<?php
												if($total_sexo>0){ 
													for($x=0;$x<$total_sexo;$x++){
												?>
												<option value="<?php echo $sexo[$x]['id_sexo'] ?>"><?php echo $sexo[$x]['descripcion_sexo']; ?></option>
												<?php
													 } 
												}else{
												?>
												<option value="NULL">Sin Clientes</option>
												<?php
													 }
												?>
											</select>
											<div class="form-control-focus">
											</div>
										</div>
									</div>
																									
									<div class="form-group form-md-line-input  has-success">
										<label class="col-md-2 control-label" for="form_control_1">Cliente</label>
										<div class="col-md-10">
											<select class="form-control" name="cliente" id="form_control_1">
												<?php
												if($total_clientes>0){ 
													for($x=0;$x<$total_clientes;$x++){
												?>
												<option value="<?php echo $cliente[$x]['id_cliente'] ?>"><?php echo $cliente[$x]['nombre_cliente']; ?></option>
												<?php
													 } 
												}else{
												?>
												<option value="NULL">Sin Clientes</option>
												<?php
													 }
												?>
											</select>
											<div class="form-control-focus">
											</div>
										</div>
									</div>
									
										
									
								<div class="form-actions margin-top-10">
									<div class="row">
										<div class="col-md-offset-2 col-md-10">
											<button type="reset" class="btn default">Cancelar</button>
											<button name="guardar_cliente" type="submit" class="btn blue">Guardar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php require(TEMPLATE.'comun/footer.php'); ?>
<?php require(TEMPLATE.'comun/js.php'); ?>
<script type="text/javascript" src="js/home.js"></script>
</body>
<!-- END BODY -->
</html>