<link href ="<?php echo TEMPLATE; ?>plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
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
                    <i class="fa fa-cubes"></i>
                    Stock Productos
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
	                <a class="btn btn-fit-height red-thunderbird" href="agregar-producto/"><i class="fa fa-plus-circle"></i> Agregar Producto </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
	        	<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed" style="margin-bottom: 0;">
					<ul class="nav nav-tabs" role="tablist">
					<?php
					$cuenta=count($sucursal);
					for($x=0; $x<$cuenta; $x++)
					{
					?>
					<li role="presentation" <?php if($x==0){ echo "class='active'"; $tab0=$sucursal[$x]['id_sucursal']; } ?> >
					<a href="#tab" class="btn-tabs" id="<?php echo $sucursal[$x]['id_sucursal']; ?>" data-nombre="<?php echo $sucursal[$x]['nombre_sucursal']; ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $sucursal[$x]['nombre_sucursal']; ?>
					</a>
					</li>
					<?php
					}	
					?>
					</ul>
				

				<div class="portlet box blue">
					<div class="portlet box blue sombra">
						<div class="portlet-title">
						    <div class="caption">
						    	<i class="icon-equalizer font-sunglo"></i>
						    	<span class="caption-subject font-sunglo bold uppercase">Stock de los Productos</span>
						    	<span class="caption-helper"></span>
						    </div>
						</div>		
						<div class="portlet-body">
							<div class="tab-content">
								<div class=" tab-pane fade in active" role="tabpanel" id="tab">
									<table class="table table-striped table-bordered table-hover" id="cliente">
									<thead>
									<tr>
										<th>
											ID
										</th>
										<th>
											Foto
										</th>
										<th>
											Nombre
										</th>
										<th>
											Código
										</th>
										<th>
											Plataforma
										</th>
										<th>
											Stock
										</th>
										<th width="50px">
										</th>
										<th width="50px">
										</th>
									</tr>	
									</thead>
									<tbody>
									</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- END BODY -->

<?php require(TEMPLATE.'comun/footer.php'); ?>
<?php require(TEMPLATE.'comun/js.php'); ?>


<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script>
$(document).ready(function() {
		var tabla=$('#cliente').DataTable( {
		        "processing": true,
		        "stateSave": true,
		        "responsive": true,
		        "serverSide": true,
				//"sDom": 'lf<"col-md-12 no-rigth-padding"p>t<"row"<"col-md-6"i><"col-md-6"p>>',
		        "ajax": {
		            "url": "<?php echo URL_VIEW; ?>/datatable/stock/stock-sucursal.php",
		            "type": "GET"
		        },
		        "columns": [
		            { "data": 0 },
		            { 
						"class":          "details-control",
		                "orderable":      false,
		                "data":           1,
		                "defaultContent": "",
		                "render": function (data)
		                {
							return '<img class="" src="<?php echo DIR_UPLOAD_OPENCART; ?>/'+data+'" style="width:80px;">';
						}
			        },
			        { "data": 2 },
					{ "data": 7 },
		            { "data": 3 },

			        { "class":          "details-control",
		                "orderable":      false,
						"data":           {"stock_sucursal_producto":5, "stock_critico_sucursal_producto":6},
		                "defaultContent": "",
		                "render": function (data)
		                {			            
			                if(parseInt(data[5]) == 0){
								return '<span class="badge bg-red">'+data[5]+'</span>';
							}else if(parseInt(data[5]) <= parseInt(data[6])){
								return '<span class="badge bg-yellow">'+data[5]+'</span>';
							}else{
								return '<span class="badge bg-green">'+data[5]+'</span>';
							}
							
						}
					},
		            {
		            	"class":          "details-control",
		                "orderable":      false,
		                "data":           0,
		                "defaultContent": "",
		                "render": function (data)
		                {
							return '<a class="btn green fileinput-button" href="producto/detalle/'+data+'/">Ver Detalle</a>';
						}
		            },
		            { "data": 4}
		        ]
		        
        	});  
        	tabla.column(7).visible(false);
        	tabla.column(7).search( <?php echo $tab0; ?> ).draw();
	$('.btn-tabs').on( 'click', function () {
		var suc = this.id;
		tabla.column(7).search( suc ).draw();
		console.log('pum');
} );



});
</script>
</body>
</html>