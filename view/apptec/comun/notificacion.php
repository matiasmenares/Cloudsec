<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-bell"></i>
                    <span class="badge badge-default">
                    3 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <p>
                                 3 Notificaciones
                            </p>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 100%;">
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-success">
                                    <i class="fa fa-truck"></i>
                                    </span>
                                    Pedidos Pendientes. <span class="time">
                                   <?php echo $this->notification->pedidosPendientes(); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-cubes"></i>
                                    </span>
                                    Stock Crítico. <span class="time">
                                     <?php echo $this->notification->productosStockCritico(); ?> Productos </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-cubes"></i>
                                    </span>
                                    Stock Cero. <span class="time">
                                     <?php echo $this->notification->productosStockCero(); ?> Productos </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="external">
                            <a href="#">
                            Ver notificaciones <i class="m-icon-swapright"></i>
                            </a>
                        </li>
                    </ul>
                </li>                