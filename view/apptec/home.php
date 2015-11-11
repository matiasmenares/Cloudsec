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
		<div class="col-md-6">		
			<div class="portlet light sombra" style="padding:12px 20px 125px 20px">
				<div class="portlet-title tabbable-line">
					  <h3>Pedidos Pendientes</h3>
				</div>
				<?php
				if(!empty($total_pendiente_sucursal)){
					foreach($total_pendiente_sucursal AS $clave => $valor){	
				 ?>
				<div class="col-md-4">
					<div class="dashboard-stat <?php echo $color[$clave]; ?> circle sombra" >
						<div class="visual">
						<font color="white"><i class="fa fa-cube fa-lg"></i></font>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $valor; ?>
							</div>
							<div class="desc">	
							<?php echo $nombre_sucursal[$clave]; ?>
							</div>
						</div>
					</div>
				</div>
			<?php
					}
				}
			?>
			</div>
		</div>
		
		<div class="col-md-6">	
			<div class="portlet light sombra" style="padding:12px 20px 125px 20px">
				<div class="portlet-title tabbable-line">
					  <h3>Stock Critico</h3>
				</div>
				<?php
				if(!empty($stock_critico_sucursal)){
					foreach($stock_critico_sucursal AS $clave => $valor){	
				 ?>
				<div class="col-md-4">
					<div class="dashboard-stat <?php echo $color[$clave]; ?> circle sombra">
						<div class="visual">
						<font color="white"><i class="fa fa-shopping-cart"></i></font>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $valor; ?>
							</div>
							<div class="desc">	
							<?php echo $nombre_sucursal[$clave]; ?>
							</div>
						</div>
					</div>
				</div>
			<?php
					}
				}
			?>			
			</div>
		</div>
				
		<!--<div class="col-md-6">			
			<div class="portlet light sombra" style="padding:12px 20px 125px 10px">
				<div class="portlet-title tabbable-line">
					  <h3>Disbribución de Producto (Por Sucursales)</h3>
				</div>
				<?php
					foreach($total_pendiente_sucursal AS $clave => $valor){	
				 ?>
				<div class="col-md-4">
					<div class="dashboard-stat <?php echo $color[$clave]; ?> circle sombra">
						<div class="visual">
						<font color="white"><i class="fa fa-truck"></i></font>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $valor; ?>
							</div>
							<div class="desc">	
							<?php echo $nombre_sucursal[$clave]; ?>
							</div>
						</div>
					</div>
				</div>
			<?php
				}
			?>
			
			</div>	
		</div>	-->
		
		<!--<div class="col-md-6">	
			<div class="portlet light sombra" style="padding:12px 20px 125px 20px">
				<div class="portlet-title tabbable-line">
					  <h3>Stock Cero (Por Sucursales)</h3>
				</div>
				<?php
					foreach($stock_cero_sucursal AS $clave => $valor){	
				 ?>
				<div class="col-md-4">
					<div class="dashboard-stat <?php echo $color[$clave]; ?> circle sombra">
						<div class="visual">
						<font color="white"><i class="fa fa-cubes"></i></font>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $valor; ?>
							</div>
							<div class="desc">	
							<?php echo $nombre_sucursal[$clave]; ?>
							</div>
						</div>
					</div>
				</div>
			<?php
				}
			?>
			</div>
		</div>-->
		<div class="col-md-6">	
			<div class="portlet light sombra" >
				<div class="portlet-title tabbable-line">
					  <h3>Stock Cero</h3>
				</div>
				<?php
				if(!empty($stock_critico_sucursal)){
					$x = 0;
					foreach($stock_cero_sucursal AS $clave => $valor){	
				 ?>
				<div class="col-md-4">
					<center>
						<canvas id="<?php echo $x; ?>" width="120" height="120"></canvas>
						<p><b><?php echo $nombre_sucursal[$clave];?></b><br/>
						 <?php echo $valor; ?> de <?php  echo $total_stock_sucursal[$clave]+$valor; ?> </p>
					</center>
				</div>
				<?php
					$x++;
					}
				}
				?>
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
Chart.defaults.global = {
    // Boolean - Whether to animate the chart
    animation: true,

    // Number - Number of animation steps
    animationSteps: 60,

    // String - Animation easing effect
    // Possible effects are:
    // [easeInOutQuart, linear, easeOutBounce, easeInBack, easeInOutQuad,
    //  easeOutQuart, easeOutQuad, easeInOutBounce, easeOutSine, easeInOutCubic,
    //  easeInExpo, easeInOutBack, easeInCirc, easeInOutElastic, easeOutBack,
    //  easeInQuad, easeInOutExpo, easeInQuart, easeOutQuint, easeInOutCirc,
    //  easeInSine, easeOutExpo, easeOutCirc, easeOutCubic, easeInQuint,
    //  easeInElastic, easeInOutSine, easeInOutQuint, easeInBounce,
    //  easeOutElastic, easeInCubic]
    animationEasing: "easeOutQuart",

    // Boolean - If we should show the scale at all
    showScale: true,

    // Boolean - If we want to override with a hard coded scale
    scaleOverride: false,

    // ** Required if scaleOverride is true **
    // Number - The number of steps in a hard coded scale
    scaleSteps: null,
    // Number - The value jump in the hard coded scale
    scaleStepWidth: null,
    // Number - The scale starting value
    scaleStartValue: null,

    // String - Colour of the scale line
    scaleLineColor: "rgba(0,0,0,.1)",

    // Number - Pixel width of the scale line
    scaleLineWidth: 1,

    // Boolean - Whether to show labels on the scale
    scaleShowLabels: true,

    // Interpolated JS string - can access value
    scaleLabel: "<%=value%>",

    // Boolean - Whether the scale should stick to integers, not floats even if drawing space is there
    scaleIntegersOnly: true,

    // Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero: false,

    // String - Scale label font declaration for the scale label
    scaleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Scale label font size in pixels
    scaleFontSize: 12,

    // String - Scale label font weight style
    scaleFontStyle: "normal",

    // String - Scale label font colour
    scaleFontColor: "#666",

    // Boolean - whether or not the chart should be responsive and resize when the browser does.
    responsive: false,

    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,

    // Boolean - Determines whether to draw tooltips on the canvas or not
    showTooltips: true,

    // Function - Determines whether to execute the customTooltips function instead of drawing the built in tooltips (See [Advanced - External Tooltips](#advanced-usage-custom-tooltips))
    customTooltips: false,

    // Array - Array of string names to attach tooltip events
    tooltipEvents: ["mousemove", "touchstart", "touchmove"],

    // String - Tooltip background colour
    tooltipFillColor: "rgba(0,0,0,0.8)",

    // String - Tooltip label font declaration for the scale label
    tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Tooltip label font size in pixels
    tooltipFontSize: 14,

    // String - Tooltip font weight style
    tooltipFontStyle: "normal",

    // String - Tooltip label font colour
    tooltipFontColor: "#fff",

    // String - Tooltip title font declaration for the scale label
    tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Tooltip title font size in pixels
    tooltipTitleFontSize: 14,

    // String - Tooltip title font weight style
    tooltipTitleFontStyle: "bold",

    // String - Tooltip title font colour
    tooltipTitleFontColor: "#fff",

    // Number - pixel width of padding around tooltip text
    tooltipYPadding: 6,

    // Number - pixel width of padding around tooltip text
    tooltipXPadding: 6,

    // Number - Size of the caret on the tooltip
    tooltipCaretSize: 8,

    // Number - Pixel radius of the tooltip border
    tooltipCornerRadius: 6,

    // Number - Pixel offset from point x to tooltip edge
    tooltipXOffset: 10,

    // String - Template string for single tooltips
    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",

    // String - Template string for multiple tooltips
    multiTooltipTemplate: "<%= value %>",

    // Function - Will fire on animation progression.
    onAnimationProgress: function(){},

    // Function - Will fire on animation completion.
    onAnimationComplete: function(){}
}

	<?php
		$x = 0;
		foreach($stock_cero_sucursal AS $clave => $valor){	
	?>
	
			var dataPie = [
					    	
	    {
	        value: "<?php echo $total_stock_sucursal[$clave]; ?>",
	        color:"#<?php  echo "35aa47"; ?>",
	        highlight: "#<?php 	echo "4b8df8"; ?>",
	        label: "<?php echo $nombre_sucursal[$clave]; ?>"
	    },
			
	    {
	        value: "<?php echo $valor; ?>",
	        color:"#<?php  echo "F7464A"; ?>",
	        highlight: "#<?php 	echo "4b8df8"; ?>",
	        label: "<?php echo $nombre_sucursal[$clave]; ?>"
	    },

	 
	]
	
	
		var optionsPie = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke : true,

    //String - The colour of each segment stroke
    segmentStrokeColor : "#fff",

    //Number - The width of each segment stroke
    segmentStrokeWidth : 2,

    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout : 50, // This is 0 for Pie charts

    //Number - Amount of animation steps
    animationSteps : 100,

    //String - Animation easing effect
    animationEasing : "easeOutBounce",

    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate : true,

    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale : false,

    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

}


	var ctx = document.getElementById("<?php echo $x; ?>").getContext("2d");	
	var myPieChart = new Chart(ctx).Pie(dataPie,optionsPie);
		 
	<?php
			$x++;
		}
	?>

	
</script>
</html>