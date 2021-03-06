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
                    Agregar Producto
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
	                <a class="btn btn-fit-height red-thunderbird" href="producto/agregar/"><i class="fa fa-plus-circle"></i> Agregar Producto</a>
                </div>
            </div>
            
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                	<!-- BEGIN PAGE CONTENT INNER -->
		<div class="portlet box blue sombra">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cubes"></i>Productos
							</div>
							<div class="tools">
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
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
											Código
										</th>
										<th>
											Nombre
										</th>
										<th>
											Plataforma
										
										</th>
										<th width="50px">
										
										
										</th>
									</tr>																
								</thead>
							<tbody>
							</tbody>
							</table>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->	
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
</body>
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
   $('#cliente').DataTable( {
        "processing": true,
		//"sDom": 'lf<"col-md-12 no-rigth-padding"p>t<"row"<"col-md-6"i><"col-md-6"p>>',
        "stateSave": true,
        "responsive": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo URL_VIEW; ?>/datatable/producto/producto.php",
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
            { "data": 3 },
			{ "data": 4 },

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
        ]
        
        });

});
</script>
</html>