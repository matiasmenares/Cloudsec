</head>

<body class="<?php if($_SESSION['menu_side'] == 0){ echo "page-sidebar-closed page-sidebar-closed-hide-logo"; }elseif($_SESSION['menu_side'] == 1){ echo ""; } ?>">
<?php require(TEMPLATE.'comun/header.php'); ?>
<?php require(TEMPLATE.'comun/menu.php'); ?>
<script src="<?php echo TEMPLATE; ?>plugins/chartjs/Chart.js"></script>
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
                
	        </ul>
        </div>
   	<div class="row">
		<div class="col-md-12">	
			<div class="portlet light sombra" >
				<div class="portlet-title tabbable-line">
					  <h3><i class="fa fa-times-circle fa-lg"></i> Error 404 </h3>
				</div>
				<br/>
				<?php 
				if(!empty($error)){
					?>
					<h4>Debug Trace</h4>
					<ul>
					<?php
					foreach($error as $key=>$value){ ?>
						<li>
					 <?php echo $value;?>
						</li>
				<?php 
					}
				} ?>
				<div class="clearfix">
					
				</div>
			</div>
		</div>
		 <canvas id="pie" width="150" height="150"></canvas>

	</div>
    </div>
</div>


  

<?php require(TEMPLATE.'comun/footer.php'); ?>
<!-- /.modal -->
<?php require(TEMPLATE.'comun/js.php'); ?>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>


</body>
<!-- END BODY -->
<script>
</script>
</html>