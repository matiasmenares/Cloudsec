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
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper hidden-xs">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
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
                <a href="sucursal/lista/">
                <i class="fa fa-building"></i>
                <span class="title">Sucursales</span>
                <span <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="selected"'; ?>></span>
                </a>
            </li>
            <!--
            <li  <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-building"></i>
                <span class="title">Sucursales</span>
                <span class="arrow <?php if($_SESSION['menu']=='lista-sucursal') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='lista-sucursal') echo 'open'; ?>" <?php if($_SESSION['menu']=='lista-sucursal') echo 'style="display:block; "'; ?>>
                    <li <?php if($_SESSION['menu']=='lista-sucursal') echo 'class="active"'; ?>>
                        <a href="lista-sucursal/">
                        <i class="fa fa-angle-double-right"></i>
                        Sucursales</a>
                    </li>
				</ul>
            </li>
            -->
            <li  <?php if($_SESSION['menu']=='lista-categoria') echo 'class="active"'; ?>>
                <a href="categoria/lista/">
                <i class="fa fa-tag"></i>
                <span class="title">Categorías</span>
                <span <?php if($_SESSION['menu']=='lista-categoria') echo 'class="selected"'; ?>></span>
                </a>
            </li>
            <!--
            <li  <?php if($_SESSION['menu']=='lista-categoria') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-tag"></i>
                <span class="title">Categorías</span>
                <span class="arrow <?php if($_SESSION['menu']=='lista-categoria') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='lista-categoria') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='lista-categoria') echo 'open'; ?>" <?php if($_SESSION['menu']=='lista-categoria') echo 'style="display:block; "'; ?>>
                    <li <?php if($_SESSION['menu']=='lista-categoria') echo 'class="active"'; ?>>
                        <a href="lista-categoria/">
                        <i class="fa fa-angle-double-right"></i>
                        Categorías</a>
                    </li>
				</ul>
            </li>
            -->
            <li  <?php if($_SESSION['menu']=='lista-orden' or $_SESSION['menu']=='lista-distribuir-orden') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-file-text-o"></i>
                <span class="title">Compra</span>
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
            <li  <?php if($_SESSION['menu']=='producto/lista' or $_SESSION['menu']=='producto/stock' /* or $_SESSION['menu']=='lista-descuento'  */or $_SESSION['menu']=='producto/agregar' OR $_SESSION['menu']=='producto/detalle' ) echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-cubes"></i>
                <span class="title">Productos</span>
                <span class="arrow <?php if($_SESSION['menu']=='producto/lista' or $_SESSION['menu']=='producto/stock' or $_SESSION['menu']=='producto/agregar' or $_SESSION['menu']=='lista-guia') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='lista-producto' or $_SESSION['menu']=='stock-producto' or $_SESSION['menu']=='lista-descuento' or $_SESSION['menu']=='lista-guia') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='lista-producto' or $_SESSION['menu']=='stock-producto' or $_SESSION['menu']=='lista-descuento' or $_SESSION['menu']=='lista-guia') echo 'open'; ?>" <?php if($_SESSION['menu']=='lista-producto' or $_SESSION['menu']=='stock-producto' or $_SESSION['menu']=='lista-descuento' or $_SESSION['menu']=='lista-guia') echo 'style="display:block; "'; ?>>
                    <li <?php if($_SESSION['menu']=='producto/lista' OR $_SESSION['menu']=='producto/agregar' OR $_SESSION['menu']=='producto/detalle') echo 'class="active"'; ?>>
                        <a href="producto/lista/">
                        <i class="fa fa-angle-double-right"></i>
                        Productos</a>
                    </li>
                    <li <?php if($_SESSION['menu']=='producto/stock') echo 'class="active"'; ?>>
                        <a href="producto/stock/">
                        <i class="fa fa-angle-double-right"></i>
                        Stock</a>
                    </li>
                    <li <?php if($_SESSION['menu']=='lista-guia') echo 'class="active"'; ?>>
                        <a href="guia/lista/">
                        <i class="fa fa-angle-double-right"></i>
                        Guia de despacho</a>
                    </li>
				</ul>
            </li>         
			<li  <?php if($_SESSION['menu']=='lista-proveedor') echo 'class="active"'; ?>>
                <a href="proveedor/lista/">
                <i class="fa fa-truck"></i>
                <span class="title">Proveedores</span>
                <span <?php if($_SESSION['menu']=='lista-proveedor') echo 'class="selected"'; ?>></span>
                </a>
            </li>
            <!--
			<li  <?php if($_SESSION['menu']=='lista-proveedor') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-truck"></i>
                <span class="title">Proveedores</span>
                <span class="arrow <?php if($_SESSION['menu']=='lista-proveedor') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='lista-proveedor') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='lista-proveedor') echo 'open'; ?>" <?php if($_SESSION['menu']=='lista-proveedor') echo 'style="display:block; "'; ?>>
                    <li <?php if($_SESSION['menu']=='lista-proveedor') echo 'class="active"'; ?>>
                        <a href="lista-proveedor/">
                        <i class="fa fa-angle-double-right"></i>
                        Proveedores</a>
                    </li>
				</ul>
            </li>
            -->
            
            <li  <?php if($_SESSION['menu']=='lista-cliente' or $_SESSION['menu']=='lista-cliente-usuario') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-users"></i>
                <span class="title">Clientes</span>
                <span class="arrow <?php if($_SESSION['menu']=='lista-cliente' or $_SESSION['menu']=='lista-cliente-usuario') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='lista-cliente' or $_SESSION['menu']=='lista-cliente-usuario') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='lista-cliente' or $_SESSION['menu']=='lista-cliente-usuario') echo 'open'; ?>" <?php if($_SESSION['menu']=='lista-cliente' or $_SESSION['menu']=='lista-cliente-usuario') echo 'style="display:block; "'; ?>>
                    
                  <!--  <li <?php if($_SESSION['menu']=='lista-cliente') echo 'class="active"'; ?>>
                        <a href="cliente/lista-mayorista/">
                        <i class="fa fa-angle-double-right"></i>
                        Mayoristas</a>
                    </li>-->
                    <li <?php if($_SESSION['menu']=='lista-cliente-usuario') echo 'class="active"'; ?>>
                        <a href="cliente/lista-cliente-usuario/">
                        <i class="fa fa-angle-double-right"></i>
                        Usuarios</a>
                 <!--   </li>
                     <li <?php if($_SESSION['menu']=='lista-perfil') echo 'class="active"'; ?>>
                        <a href="lista-perfil/">
                        <i class="fa fa-angle-double-right"></i>
                        Perfiles</a>
                   -->
                    </li>
				</ul>
            </li>
            
            <li  <?php if($_SESSION['menu']=='lista-pedido' or $_SESSION['menu']=='lista-envio') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-file-o"></i>
                <span class="title">Pedidos</span>
                <span class="arrow <?php if($_SESSION['menu']=='lista-pedido' or $_SESSION['menu']=='lista-envio') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='lista-pedido' or $_SESSION['menu']=='lista-envio') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='lista-pedido' OR $_SESSION['menu']=='lista-pedidos' or $_SESSION['menu']=='lista-envio') echo 'open'; ?>" <?php if($_SESSION['menu']=='lista-pedido' OR $_SESSION['menu']=='lista-pedidos' or $_SESSION['menu']=='lista-envio') echo 'style="display:block; "'; ?>>
                    <li <?php if($_SESSION['menu']=='lista-pedidos') echo 'class="active"'; ?>>
                        <a href="pedido/estado/">
                        <i class="fa fa-angle-double-right"></i>
                        Lista Pedidos</a>
                    </li>
                    <li <?php if($_SESSION['menu']=='lista-pedido') echo 'class="active"'; ?>>
                        <a href="pedido/lista/">
                        <i class="fa fa-angle-double-right"></i>
                        Pedidos</a>
                    </li>
                    <li <?php if($_SESSION['menu']=='lista-envio') echo 'class="active"'; ?>>
                        <a href="pedido/envio/">
                        <i class="fa fa-angle-double-right"></i>
                        Envios</a>
                    </li>
				</ul>
            </li>

            <li  <?php if($_SESSION['menu']=='lista-venta') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-shopping-cart"></i>
                <span class="title">POS</span>
                <span class="arrow <?php if($_SESSION['menu']=='lista-venta') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='lista-venta') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='lista-venta') echo 'open'; ?>" <?php if($_SESSION['menu']=='lista-venta') echo 'style="display:block; "'; ?>>
                    <li <?php if($_SESSION['menu']=='lista-venta') echo 'class="active"'; ?>>
                        <a href="pos/venta/">
                        <i class="fa fa-angle-double-right"></i>
                        Ventas</a>
                    </li>
				</ul>
            </li>
            
            <li  <?php if($_SESSION['menu']=='reporte-ventas') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-bar-chart-o"></i>
                <span class="title">Reportes</span>
                <span class="arrow <?php if($_SESSION['menu']=='reporte-ventas') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='reporte-ventas') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='reporte-ventas') echo 'open'; ?>" <?php if($_SESSION['menu']=='reporte-ventas') echo 'style="display:block; "'; ?>>
                    <li <?php if($_SESSION['menu']=='reporte-ventas') echo 'class="active"'; ?>>
                        <a href="reporte-ventas/">
                        <i class="fa fa-angle-double-right"></i>
                        Ventas</a>
                    </li>
				</ul>
            </li>

            <li  <?php if($_SESSION['menu']=='lista-impuesto' or $_SESSION['menu']=='lista-plataforma') echo 'class="active open"'; ?>>
                <a href="javascript:;">
                <i class="fa fa-cogs"></i>
                <span class="title">Ajustes</span>
                <span class="arrow <?php if($_SESSION['menu']=='lista-impuesto' or $_SESSION['menu']=='lista-plataforma') echo 'open'; ?>"></span>
                <span <?php if($_SESSION['menu']=='lista-impuesto' or $_SESSION['menu']=='lista-plataforma') echo 'class="selected"'; ?>></span>
                </a>
                <ul class="sub-menu <?php if($_SESSION['menu']=='lista-impuesto' or $_SESSION['menu']=='lista-plataforma') echo 'open'; ?>" <?php if($_SESSION['menu']=='lista-impuesto' or $_SESSION['menu']=='lista-plataforma') echo 'style="display:block; "'; ?>>
                    
                    <li <?php if($_SESSION['menu']=='lista-impuesto') echo 'class="active"'; ?>>
                        <a href="lista-impuesto/">
                        <i class="fa fa-angle-double-right"></i>
                        Impuestos</a>
                    </li>
                    <li <?php if($_SESSION['menu']=='lista-plataforma') echo 'class="active"'; ?>>
                        <a href="lista-plataforma/">
                        <i class="fa fa-angle-double-right"></i>
                        Plataformas</a>
                    </li>
				</ul>
            </li>


        </ul>                        
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->