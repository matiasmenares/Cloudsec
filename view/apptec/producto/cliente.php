
 <!-- DATA TABLE -->
		<link rel="stylesheet" type="text/css" href ="<?php echo TEMPLATE; ?>plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
		<link rel="stylesheet" type="text/css" href ="<?php echo TEMPLATE; ?>plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
		<link rel="stylesheet" type="text/css" href ="<?php echo TEMPLATE; ?>plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>


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
<body class="page-header-fixed page-sidebar-closed-hide-logo ">
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
						<div class="portlet light bordered sombra">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-blue-hoki"></i>
											<span class="caption-subject font-blue-hoki bold uppercase">Agregar Cliente</span>
											<span class="caption-helper">demo form...</span>
										</div>
										<div class="tools">
											<a href="" class="collapse" data-original-title="" title="">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
											</a>
											<a href="" class="reload" data-original-title="" title="">
											</a>
											<a href="" class="remove" data-original-title="" title="">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="#" class="horizontal-form">
											<div class="form-body">
												<h3 class="form-section">Información</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Nombre</label>
															<input type="text" name="nombre_cliente" id="firstName" class="form-control" placeholder="">
															<span class="help-block">
															Nombre de Empresa </span>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group ">
															<label class="control-label">Rut</label>
															<input type="text" name="rut_cliente" id="lastName" class="form-control" placeholder="">
															
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Giro</label>
															<input type="text" name="giro_cliente"  id="lastName" class="form-control" placeholder="">

															<span class="help-block">
															Giro de cliente </span>
														</div>
													</div>
													<!--/span-->
													
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Contacto</label>
																<select class="form-control" name="id_cliente_entrada" id="form_control_1">

															<?php 
											if($total_entrada>0){
											?>
												<?php 
													for($x=0;$x<$total_entrada;$x++){
												?>
												<option value="<?php echo $entrada[$x]['id_cliente_entrada']; ?>"><?php echo $entrada[$x]['descripcion_cliente_entrada']; ?></option>
												<?php
													 } 
												?>
											<?php
											}else{
												
												if($_SESSION['perfil_id_perfil'] == 1){
											?>
											<option >Debes Crear un Contacto de Cliente Nuevo</option>
											<?php 
												}else{
											?>
											Pide al administrador que cree contacto nuevo
											<?php
												}
											}
											
											?>
																						</select>

														</div>
													</div>
													
												</div>
												<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Descripción</label>
															<textarea class="form-control" name="detalle_cliente" ></textarea>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<h3 class="form-section">Dirección</h3>
												<div class="row">
													<div class="col-md-12 ">
														<div class="form-group">
															<label>Dirección</label>
															<input type="text"  name="direccion_cliente" class="form-control">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Región</label>
															<input type="text" class="form-control">
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Comuna</label>
															<select name="comuna_id_comuna"  class="form-control">
															<?php 
													for($x=0;$x<$total_comunas;$x++){
												?>
												<option value="<?php echo $comuna[$x]['id_comuna'] ?>"><?php echo $comuna[$x]['descripcion_comuna'] ?></option>
												<?php } ?>			
															</select>
															</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Teléfono</label>
															<input type="text" name="telefono_cliente" class="form-control">
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label>Country</label>
															<select class="form-control">
															</select>
														</div>
													</div>
													<!--/span-->
												</div>
											</div>
											<div class="form-actions right">
												<button type="reset" class="btn default">Limpiar</button>
												<button type="submit" class="btn blue"><i class="fa fa-check"></i> Guardar</button>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
	<!-- END CONTENT -->
			</div>
		</div>
<!-- END CONTAINER -->
<?php require(TEMPLATE.'comun/footer.php'); ?>
<?php require(TEMPLATE.'comun/js.php'); ?>
<script type="text/javascript" src="js/home.js"></script>

<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

</body>
<!-- END BODY -->
<script>
$(document).ready(function() {    
   $('#cliente').DataTable( {
        "processing": true,
        "stateSave": true,
        "responsive": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo URL_VIEW; ?>/datatable/cliente/cliente.php",
            "type": "GET"
        },
        "columns": [
            { "data": 0 },
            { "data": 1 },
            { "data": 2 },
            {
            	"class":          "details-control",
                "orderable":      false,
                "data":           0,
                "defaultContent": "",
                "render": function (data)
                {
					return '<a class="btn green fileinput-button" href="cliente/'+data+'/">Ver Detalle</a>';
				}
            },
        ]
        
        });

});
</script>

</html>