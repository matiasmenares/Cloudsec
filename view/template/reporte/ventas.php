
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
<script src="<?php echo TEMPLATE; ?>plugins/chartjs/Chart.js"></script>
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        Widget settings form goes here
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn blue">Save changes</button>
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title">
            Ventas POS 
        </h1>
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
                    <i class="fa fa-usd"></i>
                    Ventas POS
                </li>
            </ul>
   <!--     <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height red-thunderbird dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Actions <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="#">Action</a>
                        </li>
                        <li>
                            <a href="#">Another action</a>
                        </li>
                        <li>
                            <a href="#">Something else here</a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="#">Separated link</a>
                        </li>
                    </ul>
                </div>
            </div>-->
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
	          <div class="col-md-12">
                Porcentaje de Ventas POS Sucursales
            </div>
           
	       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-usd"></i>
						</div>
						<div class="details">
							<div class="number">
								 $<?php echo  number_format($total_ventas,0,",","."); ?>
								</div>
							<div class="desc">
								 Total Ventas Netas
							</div>
						</div>
						<a class="more" href="javascript:;">
						Ver más <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-usd"></i>
						</div>
						<div class="details">
							<div class="number">
								 $<?php echo  number_format($utilidad,0,",","."); ?>
								</div>
							<div class="desc">
								 Total Utilidad
							</div>
						</div>
						<a class="more" href="javascript:;">
						Ver más <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
        </div>
        <canvas id="pie" width="300" height="300"></canvas>
			<div class="">
		     		<canvas id="linea" width="1100" height="200"></canvas>
		</div>

        <!-- BEGIN PAGE CONTENT-->
        
        <!-- END PAGE CONTENT-->
    </div>
</div>
</body>

<?php require(TEMPLATE.'comun/footer.php'); ?>
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
		var dataPie = [
			
			<?php 
			if($venta_porcentaje_sucursal>0){
				$total = count($venta_porcentaje_sucursal);
				for($x=0;$x<$total;$x++){	
			?>
	    {
	        value: <?php echo round($venta_porcentaje_sucursal[$x]['total']); ?>,
	        color:"#<?php 
		        switch($x){
			        
			        case 0:
			        
			        	echo "F7464A";
		        
		        	break;
		        
		        	case 1:
		        	
		        		echo "46BFBD";
		        	
		        	break;
		        }
		        ?>",
	        highlight: "#<?php 
		        switch($x){
			        
			        case 0:
			        
			        	echo "FF5A5E";
		        
		        	break;
		        
		        	case 1:
		        	
		        		echo "5AD3D1";
		        	
		        	break;
		        }
		        ?>",
	        label: "<?php echo $venta_porcentaje_sucursal[$x]['nombre']; ?>"
	    },
	    <?php
		    	 }
		    }
	    ?>
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

var dataLinea = {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        },
        {
        
           label: "My 3 dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [30, 58, 50, 29, 96, 37, 70]
        }
    ]
};
var optionsLinea = {
    ///Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines : true,
     //String - Colour of the grid lines
    scaleGridLineColor : "rgba(0,0,0,.05)",

    //Number - Width of the grid lines
    scaleGridLineWidth : 1,

    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,

    //Boolean - Whether the line is curved between points
    bezierCurve : true,

    //Number - Tension of the bezier curve between points
    bezierCurveTension : 0.4,

    //Boolean - Whether to show a dot for each point
    pointDot : true,

    //Number - Radius of each point dot in pixels
    pointDotRadius : 4,

    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth : 1,

    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,

    //Boolean - Whether to show a stroke for datasets
    datasetStroke : true,

    //Number - Pixel width of dataset stroke
    datasetStrokeWidth : 2,

    //Boolean - Whether to fill the dataset with a colour
    datasetFill : true,

    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

};

	var ctx = document.getElementById("pie").getContext("2d");
	
	var myPieChart = new Chart(ctx).Pie(dataPie,optionsPie);
	
	var ctx2 = document.getElementById("linea").getContext("2d");

	var myLineChart = new Chart(ctx2).Line(dataLinea, optionsLinea);
	
</script>

<!-- END BODY -->

</html>