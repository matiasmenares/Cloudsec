
</head>
<link rel="stylesheet" href ="<?php echo TEMPLATE; ?>/css/profile.css" />
<link rel="stylesheet" href ="<?php echo TEMPLATE; ?>plugins/bootstrap-switch/css/bootstrap-switch.css" />

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
        <div class="page-bar sombra">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    Home
                </li>
                	<i class="fa fa-angle-right"></i>
                <li>
                    <i class="fa fa-rocket"></i>
                    App
                </li>
					<i class="fa fa-angle-right"></i>
				<li>
                    <i class="fa fa-rocket"></i>
                   Detalle App
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height red-thunderbird dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Configuración <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="#">Detener</a>
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
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
	            <div class="col-md-3">
	            	<div class="portlet light profile-sidebar-portlet ">
                                    <!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">
							<img src="image/img-app/app.png" class="img-responsive" alt=""> </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
							<div class="profile-usertitle-name"> AppTest  </div>
							<div class="profile-usertitle-job"> Opencart </div>
						</div>
						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR MENU -->
						<div class="profile-usermenu">
                                        <ul class="nav">
                                            <li class="active">
                                                <a href="page_user_profile_1.html">
                                                    <i class="icon-home"></i> Dashboard </a>
                                            </li>
                                            <li>
                                                <a href="page_user_profile_1_account.html">
                                                    <i class="icon-settings"></i> Ajustes </a>
                                            </li>
											<li>
                                                <a href="page_user_profile_1_account.html">
                                                    <i class="fa fa-search"></i> Scanner </a>
                                            </li>
											<li>
                                                <a href="page_user_profile_1_help.html">
                                                    <i class="icon-info"></i> Ayuda </a>
                                            </li>
                                        </ul>
						</div>
						<!-- END MENU -->
					</div>
					<div class="portlet light ">
                                    <!-- STAT -->
                                    <div class="row list-separated profile-stat">
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="uppercase profile-stat-title"> 37 </div>
                                            <div class="uppercase profile-stat-text"> Reportes </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="uppercase profile-stat-title"> 51 </div>
                                            <div class="uppercase profile-stat-text"> Mitigado </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="uppercase profile-stat-title"> 61 </div>
                                            <div class="uppercase profile-stat-text"> Detectado </div>
                                        </div>
                                    </div>
                                    <!-- END STAT -->
                                        <h4 class="profile-desc-title">Detalle</h4>
                                        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-globe"></i>
                                            <a href="http://www.keenthemes.com">www.cloudsec.com</a>
                                        </div>
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-envelope"></i>
                                            <a href="http://www.twitter.com/keenthemes/">admin@cloudsec</a>
                                        </div>
                                    </div>
                                </div>
						<div class="col-md-9">
<div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">General</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Servicios</a>
                                                    </li>
													<li>
                                                        <a href="#tab_1_3" data-toggle="tab">Logs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_4" data-toggle="tab">Configuración</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- GENERAL QUESTION TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <div id="accordion1" class="panel-group">
                                                            <div class="panel">
                                                                <div class="">
	                                                                <div class="col-md-12">
		                                                                <div class="col-md-4">
																		<!-- BEGIN WIDGET THUMB -->
											                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
											                                <h4 class="widget-thumb-heading">Vulnerabilidades</h4>
											                                <div class="widget-thumb-wrap">
											                                    <i class="widget-thumb-icon bg-red fa fa-bug"></i>
											                                    <div class="widget-thumb-body">
											                                        <span class="widget-thumb-subtitle"></span>
											                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">3</span>
											                                    </div>
											                                </div>
											                            </div>
										                            <!-- END WIDGET THUMB -->
		                                                                </div>
		                                                                <div class="col-md-4">
																		<!-- BEGIN WIDGET THUMB -->
											                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
											                                <h4 class="widget-thumb-heading">Request</h4>
											                                <div class="widget-thumb-wrap">
																			<i class="widget-thumb-icon bg-blue icon-layers"></i>											                                  									  <div class="widget-thumb-body">
											                                        <span class="widget-thumb-subtitle"></span>
											                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">7.644</span>
											                                    </div>
											                                </div>
											                            </div>
										                            <!-- END WIDGET THUMB -->
		                                                                </div>
		                                                                <div class="col-md-4">
																		<!-- BEGIN WIDGET THUMB -->
											                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
											                                <h4 class="widget-thumb-heading">Bloqueos</h4>
											                                <div class="widget-thumb-wrap">
											                                    <i class="widget-thumb-icon bg-green fa fa-shield"></i>
											                                    <div class="widget-thumb-body">
											                                        <span class="widget-thumb-subtitle"></span>
											                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">20</span>
											                                    </div>
											                                </div>
											                            </div>
										                            <!-- END WIDGET THUMB -->
		                                                                </div>
	                                                                </div>
	                                                            	<div class="col-md-6">
		                                                            	 <div class="portlet-body">
																		 	<canvas id="myChart" width="400" height="280"></canvas>
																		</div>
	                                                            	</div>
																	<div class="col-md-6">
		                                                            	 <div class="portlet-body">
																		 	<canvas id="myChart2" width="400" height="280"></canvas>
																		</div>
	                                                            	</div>
	                                                                <div id="site_statistics_loading" style="display: none;">
																		<img src="../assets/global/img/loading.gif" alt="loading">
																	 </div>
																	<div id="site_statistics_content" class="display-none" style="display: block;">
																		<div id="site_statistics" class="chart" style="padding: 0px; position: relative;">                                                                																		</div>
																	</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END GENERAL QUESTION TAB -->
                                                    <!-- SERVICIOS TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                        <div id="accordion2" class="panel-group">
															<table class="table table-hover table-light">
						                                            <thead>
						                                                <tr class="uppercase">
						                                                    <th> # </th>
						                                                    <th> Servicio </th>
						                                                    <th> Carpeta </th>
						                                                    <th> Status </th>
						                                                    <th> Acción </th>
						                                                </tr>
						                                            </thead>
						                                            <tbody>
						                                                <tr>
						                                                    <td> 1 </td>
						                                                    <th> Apache </th>
						                                                    <th> /etc/httpd/apache/ </th>
						                                                    <td>
						                                                        <span class="label label-sm label-success"> Running </span>
						                                                    </td>
																			<td> <input type="checkbox" name="my-checkbox" checked> </td>
						                                                </tr>
						                                                <tr>
						                                                    <td> 2 </td>
						                                                    <th> OpenSSL </th>
						                                                    <th> /etc/httpd/apache/ </th>
						                                                    <td>
						                                                        <span class="label label-sm label-success"> Running </span>
						                                                    </td>
																			<td> <input type="checkbox" name="my-checkbox" checked> </td>
						                                                </tr>
						                                                <tr>
						                                                    <td> 3 </td>
						                                                    <th> Mail </th>
						                                                    <th> /etc/httpd/apache/ </th>
						                                                    <td>
						                                                        <span class="label label-sm label-success"> Running </span>
						                                                    </td>
																			<td> <input type="checkbox" name="my-checkbox" checked> </td>
						                                                </tr>
						                                                <tr>
						                                                    <td> 4 </td>
						                                                    <th> MySQL </th>
						                                                    <th> /etc/httpd/apache/ </th>
						                                                    <td>
						                                                        <span class="label label-sm label-success"> Running </span>
						                                                    </td>
																			<td> <input type="checkbox" name="my-checkbox" checked> </td>
						                                                </tr>
						                                            </tbody>
						                                        </table>
                                                        </div>
                                                    </div>
                                                    <!-- END MEMBERSHIP TAB -->
                                                    <!-- TERMS OF USE TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
                                                        <div id="accordion3" class="panel-group">
															<div class="portlet-body">
																<table class="table table-striped table-bordered table-hover" id="cliente">
																	<thead>
																		<tr>
																			<th>
																				ID
																			</th>
																			<th>
																				Nombre
																			</th>
																			<th>
																				Lenguaje
																			</th>
																			<th>
																				IP
																			</th>
																			<th>
																				Estado
																			</th>
																			<th width="50px">
																				Accion
																			</th>
																		</tr>																
																	</thead>
																<tbody>
																</tbody>
																</table>
														</div>
                                                        </div>
                                                    </div>
                                                    <!-- END TERMS OF USE TAB -->
                                                    <!-- TERMS OF USE TAB -->
                                                    <div class="tab-pane" id="tab_1_4">
                                                        <div id="accordion3" class="panel-group">
															<div class="panel-heading">
                                                              <table>
	                                                              <tr>
		                                                              3
	                                                              </tr>
                                                              </table>
															</div>
                                                        </div>
                                                    </div>
                                                    <!-- END TERMS OF USE TAB -->
                                                </div>
                                            </div>
                                        </div>
            		</div>
				</div>
            </div>
 
        </div>
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
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/chartjs/Chart.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/chartdiv.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/app.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/dashboard.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/bootstrap-switch/js/bootstrap-switch.js"></script>

</body>
<!-- END BODY -->
<script>
	$("[name='my-checkbox']").bootstrapSwitch();
var ctx = document.getElementById("myChart").getContext("2d");
	var data = {
	    labels: ["Brute Force", "CSRF", "LFI", "RFI", "XSS", "DDOS", "SQLi"],
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
	
	var ctx2 = document.getElementById("myChart2").getContext("2d");
	
	var data2 = [
    {
        value: 20,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
    },
    {
        value: 100,
        color: "#00a65a",
        highlight: "#5AD3D1",
        label: "Green"
    },
]
	var myDoughnutChart = new Chart(ctx2).Doughnut(data2);

   $('#cliente').DataTable( {
        "processing": true,
        "stateSave": true,
        "responsive": true,
        "serverSide": true,
        "ajax": {
            "url": "datatable/app_access/",
            "type": "POST"
        },
        "columns": [
            { "data": 0 },
            { "data": 1 },
			{
            	"class":          "details-control",
                "orderable":      false,
                "data":           0,
                "defaultContent": "",
                "render": function (data)
                {
					return '<a class="btn red fileinput-button" href="app/detail/'+data+'/">Bloquear</a>';
				} 
			},
        ]
        
        });
</script>

<!-- END BODY -->

</html>