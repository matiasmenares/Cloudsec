
<!-- BEGIN HEADER -->
<div class="page-header navbar">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="home/">
            <!--<img src="images/<?php echo $_SESSION['logo_cliente'] ?>" alt="logo" class="logoimg"/>-->
            <img src="image/logo.png" alt="logo" class="logoimg"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
		        <!-- END RESPONSIVE MENU TOGGLER -->
		        <!-- BEGIN TOP NAVIGATION MENU -->
            	<?php include(TEMPLATE.'comun/notificacion.php'); ?>
		        <!-- BEGIN USER LOGIN DROPDOWN -->
            	<?php include(TEMPLATE.'comun/usuario.php'); ?>
            	<!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!--
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                    <i class="icon-logout"></i>
                    </a>
                </li>
                -->
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>