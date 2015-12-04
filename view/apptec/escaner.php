	<link href="<?php echo URL_VIEW; ?>plugins/animate/animate.css" rel="stylesheet" type="text/css"/>
</head>

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
	                    Escaner
	                </a>
                </li>

	        </ul>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light ">
					<div class="portlet-title">
						<div class="caption caption-md">
							<i class="fa fa-rocket font-red"></i>
							<span class="caption-subject font-red bold uppercase">Aplicación</span>
							<span class="caption-helper">Aplicaciones Corriendo</span>
            			</div>
        			</div>
					<div class="portlet-body">
						<div class="table-scrollable table-scrollable-borderless">
							<table class="table table-hover table-light">
								<thead>
									<tr class="uppercase">
										<th colspan="2"> Aplicaciones </th>
										<th> Servidor </th>
										<th> IP </th>
										<th> Estado </th>
										<th> Tasa </th>
                        			</tr>
                    			</thead>
								<tbody id="insertaEscaner">
								<?php for($x=10; $x>=1; $x--){ ?>
									<tr class="bg-gray">
										<td class="fit" colspan="2">
											<a href="javascript:;" class="primary-link"><?php echo $x; ?></a>
                        				</td>
										<td> aa </td>
										<td> aa</td>
										<td> Fine </td>
										<td>
											<span class="bold theme-font">98%</span>
                        				</td>
                    				</tr>
								<?php } ?>
                				</tbody>
                			</table>
            			</div>
        			</div>
    			</div>
			</div>
		</div>    			 
	</div>
</body>




<?php require(TEMPLATE.'comun/footer.php'); ?>
<!-- /.modal -->
<?php require(TEMPLATE.'comun/js.php'); ?>


<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/slimscroll/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/chartjs/Chart.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/app.js"></script>
<script>
	var x=11;
	setInterval(function(){ 
		$('.animated').addClass( 'bg-gray' );
		$('.animated').removeClass( 'animated' );
		$('#insertaEscaner').prepend('<tr class="fadeInRight animated"><td class="fit" colspan="2"><div><a href="javascript:;" class="primary-link">'+x+'</a></div></td><td> aa </td><td> aa</td><td> Fine </td><td><span class="bold theme-font">98%</span></td></tr>');
		x++;
	}, 5000);	
</script>


</body>
<!-- END BODY -->


</html>