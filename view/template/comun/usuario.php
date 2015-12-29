                <li class="dropdown dropdown-user user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"  data-close-others="true">
                    <img alt="" class="img-circle foto-border" src="image/img_user/<?php echo $this->session->data['foto_usuario'];?>" />
                    <span class="username"><font color="#fff">
                    <?php echo $this->session->data['nombre_usuario']; ?> </font></span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu cuadro-usuario">
                                <!-- User image -->
                                <li class="user-header bg-olive">
                                    <img src="image/img_user/<?php echo $this->session->data['foto_usuario'];?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $this->session->data['nombre_usuario']; ?>
                                        <small><?php echo date("d/m/Y"); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!--<li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Perfil</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Ventas</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Licencia</a>
                                    </div>
                                </li>-->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="inactivo/" class="fa fa-lock" data-toggle="popover" title="Bloquear"></a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="login_out/" class="fa fa-sign-out" data-toggle="popover" title="Cerrar Sesión"></a>
                                    </div>
                                </li>
                            </ul>
                </li>
