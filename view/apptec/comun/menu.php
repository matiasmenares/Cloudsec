<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="<?php if($_SESSION['menu_side'] == 0){ echo "page-sidebar-menu  page-sidebar-menu-closed"; }elseif($_SESSION['menu_side'] == 1){ echo "page-sidebar-menu"; } ?>" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div id="menu" class="sidebar-toggler">
	                <input type="hidden" id="menu_side" value="<?php echo $_SESSION['menu_side']; ?>">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper hidden-xs">
              <form class="sidebar-search" action="extra_search.html" method="POST">
                    <a href="javascript:;" class="remove">
                    <i class="icon-close"></i>
                    </a>
     
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li  <?php if($_SESSION['menu']=='home') echo 'class="active"'; ?>>
                <a href="home/">
                <i class="icon-home"></i>
                <span class="title">Home</span>
                <span <?php if($_SESSION['menu']=='home') echo 'class="selected"'; ?>></span>
                </a>
            </li>
           <li  <?php if($_SESSION['menu']=='lista-orden' or $_SESSION['menu']=='lista-distribuir-orden') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-rocket"></i>
                <span class="title">Apps</span>
                <span class="arrow <?php if($_SESSION['menu']=='lista-orden' or $_SESSION['menu']=='lista-distribuir-orden') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='lista-orden' or $_SESSION['menu']=='lista-distribuir-orden') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='lista-orden' OR $_SESSION['menu']=='lista-compra' or $_SESSION['menu']=='lista-distribuir-orden') echo 'open'; ?>" <?php if($_SESSION['menu']=='lista-orden' or $_SESSION['menu']=='lista-distribuir-orden' OR $_SESSION['menu']=='lista-compra') echo 'style="display:block; "'; ?>>
	                <li <?php if($_SESSION['menu']=='lista-compra') echo 'class="active"'; ?>>
						<a href="app/list/">
                        	<i class="fa fa-angle-double-right"></i>
							Apps
						</a>
                    </li>
	                <li <?php if($_SESSION['menu']=='agregar-compra') echo 'class="active"'; ?>>
                        <a href="orden/directa/">
                        <i class="fa fa-angle-double-right"></i>
                        Reportes</a>
                    </li>
				</ul>
            </li>
            <li  <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="active"'; ?>>
                <a href="sucursal/lista/">
                <i class="fa fa-bug"></i>
                <span class="title">Bug</span>
                <span <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="selected"'; ?>></span>
                </a>
            </li>
            <li  <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="active"'; ?>>
                <a href="sucursal/lista/">
                <i class="fa fa-fire"></i>
                <span class="title">Firewall</span>
                <span <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="selected"'; ?>></span>
                </a>
            </li>
            <li  <?php if($_SESSION['menu']=='lista-categoria') echo 'class="active"'; ?>>
                <a href="categoria/lista/">
                <i class="fa fa-search"></i>
                <span class="title">Scanner</span>
                <span <?php if($_SESSION['menu']=='lista-categoria') echo 'class="selected"'; ?>></span>
                </a>
            </li>
            <li  <?php if($_SESSION['menu']=='lista-orden' or $_SESSION['menu']=='lista-distribuir-orden') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-exchange"></i>
                <span class="title">Logs</span>
                <span class="arrow <?php if($_SESSION['menu']=='lista-orden' or $_SESSION['menu']=='lista-distribuir-orden') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='lista-orden' or $_SESSION['menu']=='lista-distribuir-orden') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='lista-orden' OR $_SESSION['menu']=='lista-compra' or $_SESSION['menu']=='lista-distribuir-orden') echo 'open'; ?>" <?php if($_SESSION['menu']=='lista-orden' or $_SESSION['menu']=='lista-distribuir-orden' OR $_SESSION['menu']=='lista-compra') echo 'style="display:block; "'; ?>>
	                <li <?php if($_SESSION['menu']=='lista-compra') echo 'class="active"'; ?>>
						<a href="orden/lista/">
                        	<i class="fa fa-angle-double-right"></i>
							Lista Compras
						</a>
                    </li>
	                <li <?php if($_SESSION['menu']=='agregar-compra') echo 'class="active"'; ?>>
                        <a href="orden/directa/">
                        <i class="fa fa-angle-double-right"></i>
                        Compras Directas</a>
                    </li>
                    <li <?php if($_SESSION['menu']=='lista-orden') echo 'class="active"'; ?>>
                        <a href="lista-orden/">
                        <i class="fa fa-angle-double-right"></i>
                        Ordenes de Compra</a>
                    </li>
                    <li <?php if($_SESSION['menu']=='lista-distribuir-orden') echo 'class="active"'; ?>>
                        <a href="orden/lista-distribucion/">
                        <i class="fa fa-angle-double-right"></i>
                        Distribución de Productos</a>
                    </li>
				</ul>
            </li>
			<li  <?php if($_SESSION['menu']=='lista-categoria') echo 'class="active"'; ?>>
                <a href="categoria/lista/">
                <i class="fa fa-user"></i>
                <span class="title">Usuarios</span>
                <span <?php if($_SESSION['menu']=='lista-categoria') echo 'class="selected"'; ?>></span>
                </a>
            </li>	
            <li  <?php if($_SESSION['menu']=='lista-categoria') echo 'class="active"'; ?>>
                <a href="categoria/lista/">
                <i class="fa fa-cog"></i>
                <span class="title">Herramientas</span>
                <span <?php if($_SESSION['menu']=='lista-categoria') echo 'class="selected"'; ?>></span>
                </a>
            </li>
        </ul>                        
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->