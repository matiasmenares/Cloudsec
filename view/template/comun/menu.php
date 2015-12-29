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
			<li  <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="active"'; ?>>
                <a href="app/list/">
                <i class="fa fa-rocket"></i>
                <span class="title">Apps</span>
                <span <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="selected"'; ?>></span>
                </a>
            </li>
            <li  <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="active"'; ?>>
                <a href="bug/list/">
                <i class="fa fa-bug"></i>
                <span class="title">Bug</span>
                <span <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="selected"'; ?>></span>
                </a>
            </li>
            <li  <?php if($_SESSION['menu']=='escaner') echo 'class="active"'; ?>>
                <a href="escaner/">
                <i class="fa fa-search"></i>
                <span class="title">Escaner</span>
                <span <?php if($_SESSION['menu']=='escaner') echo 'class="selected"'; ?>></span>
                </a>
            </li>
			<li  <?php if($_SESSION['menu']=='') echo 'class="active"'; ?>>
                <a href="log/list/">
                <i class="fa fa-exchange"></i>
                <span class="title">Logs</span>
                <span <?php if($_SESSION['menu']=='escaner') echo 'class="selected"'; ?>></span>
                </a>
            </li>
			<li  <?php if($_SESSION['menu']=='') echo 'class="active"'; ?>>
                <a href="block/list/">
                <i class="fa fa-shield"></i>
                <span class="title">Bloqueos</span>
                <span <?php if($_SESSION['menu']=='escaner') echo 'class="selected"'; ?>></span>
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
