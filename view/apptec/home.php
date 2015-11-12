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
<div class="col-md-6 col-sm-6">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="fa fa-rocket font-red"></i>
                                        <span class="caption-subject font-red bold uppercase">App</span>
                                        <span class="caption-helper">Apps Running</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent green btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Today</label>
                                            <label class="btn btn-transparent green btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Week</label>
                                            <label class="btn btn-transparent green btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Month</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row number-stats margin-bottom-30">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="stat-left">
                                                <div class="stat-chart">
                                                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                    <div id="sparkline_bar"><canvas width="113" height="55" style="display: inline-block; width: 113px; height: 55px; vertical-align: top;"></canvas></div>
                                                </div>
                                                <div class="stat-number">
                                                    <div class="title"> Total </div>
                                                    <div class="number"> 2460 </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="stat-right">
                                                <div class="stat-chart">
                                                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                    <div id="sparkline_bar2"><canvas width="107" height="55" style="display: inline-block; width: 107px; height: 55px; vertical-align: top;"></canvas></div>
                                                </div>
                                                <div class="stat-number">
                                                    <div class="title"> New </div>
                                                    <div class="number"> 719 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover table-light">
                                            <thead>
                                                <tr class="uppercase">
                                                    <th colspan="2"> Apps </th>
                                                    <th> Server </th>
                                                    <th> IP </th>
                                                    <th> Status </th>
                                                    <th> RATE </th>
                                                </tr>
                                            </thead>
                                            <tbody><tr>
                                                <td class="fit">
                                                <td>
                                                    <a href="javascript:;" class="primary-link">Banco Chile</a>
                                                </td>
                                                <td> Amazon AWS </td>
                                                <td> 52.70.30.2 </td>
                                                <td> Fine </td>
                                                <td>
                                                    <span class="bold theme-font">80%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fit">
                                                <td>
                                                    <a href="javascript:;" class="primary-link">Falabella</a>
                                                </td>
                                                <td> Heroku </td>
                                                <td> 10.40.22.1 </td>
                                                <td> Fine </td>
                                                <td>
                                                    <span class="bold theme-font">67%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fit">
                                                <td>
                                                    <a href="javascript:;" class="primary-link">Sonda</a>
                                                </td>
                                                <td> Digital Ocean </td>
                                                <td> 50.2.101.24 </td>
                                                <td> Fine </td>
                                                <td>
                                                    <span class="bold theme-font">98%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fit">
                                                <td>
                                                    <a href="javascript:;" class="primary-link">Woocomerce</a>
                                                </td>
                                                <td> BlueHost </td>
                                                <td> 10.33.20.1 </td>
                                                <td> Fine </td>
                                                <td>
                                                    <span class="bold theme-font">58%</span>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                </div>
                            </div>
                        </div>
             			 <div class="col-md-6">
                            <!-- BEGIN WORLD PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-bug font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Attack Method</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
									<canvas id="myChart" width="400" height="300"></canvas>
                                </div>
                            </div>
							<!-- END WORLD PORTLET-->
             </div>
             <div class="col-md-6 col-sm-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-blue"></i>
                                        <span class="caption-subject font-blue bold uppercase">Recent Activities</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn btn-sm blue btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true"> Filter By
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                                <label>
                                                    <div class="checker"><span class=""><input type="checkbox"></span></div> Finance</label>
                                                <label>
                                                    <div class="checker"><span class="checked"><input type="checkbox" checked=""></span></div> Membership</label>
                                                <label>
                                                    <div class="checker"><span><input type="checkbox"></span></div> Customer Support</label>
                                                <label>
                                                    <div class="checker"><span class="checked"><input type="checkbox" checked=""></span></div> HR</label>
                                                <label>
                                                    <div class="checker"><span><input type="checkbox"></span></div> System</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="scroller" style="height: 300px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
                                        <ul class="feeds">
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 4 pending tasks.
                                                                <span class="label label-sm label-warning "> Take action
                                                                    <i class="fa fa-share"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> Just now </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bar-chart-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 20 mins </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-danger">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 24 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received with
                                                                <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 30 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 24 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-bell-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Web server hardware needs to be upgraded.
                                                                <span class="label label-sm label-default "> Overdue </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 2 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-briefcase"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 20 mins </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 4 pending tasks.
                                                                <span class="label label-sm label-warning "> Take action
                                                                    <i class="fa fa-share"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> Just now </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-danger">
                                                                    <i class="fa fa-bar-chart-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 20 mins </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 24 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received with
                                                                <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 30 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 24 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-warning">
                                                                <i class="fa fa-bell-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Web server hardware needs to be upgraded.
                                                                <span class="label label-sm label-default "> Overdue </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 2 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-briefcase"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 20 mins </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 6px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 161.002px; background: rgb(187, 187, 187);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
                                    <div class="scroller-footer">
                                        <div class="btn-arrow-link pull-right">
                                            <a href="javascript:;">See All Records</a>
                                            <i class="icon-arrow-right"></i>
                                        </div>
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

<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/mapa.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/world.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/map-vector.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/chartjs/Chart.js"></script>


</body>
<!-- END BODY -->
<script>
	var ctx = document.getElementById("myChart").getContext("2d");
	var data = {
	    labels: ["Brute Force", "XSS", "LFI", "RFI", "CSRF", "Session Hijack", "Sqli"],
	    datasets: [
	        {
	            label: "My Second dataset",
	            fillColor: "rgba(151,187,205,0.2)",
	            strokeColor: "rgba(151,187,205,1)",
	            pointColor: "rgba(151,187,205,1)",
	            pointStrokeColor: "#fff",
	            pointHighlightFill: "#fff",
	            pointHighlightStroke: "rgba(151,187,205,1)",
	            data: [28, 48, 40, 19, 96, 27, 100]
	        }
	    ]
	};
	var myRadarChart = new Chart(ctx).Radar(data);
	
</script>
</html>