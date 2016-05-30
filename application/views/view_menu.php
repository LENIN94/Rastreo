

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo base_url(); ?>" class="site_title"><i class="fa fa-paper-plane"></i>
                        <span>Admin Panel</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="images/pachuca.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bienvenido,</span>
                        <h2>Usuario</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>Inicio</a>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Catálogos <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>Usuario">Vendedores</a></li>

                                    <li><a href="<?php echo base_url(); ?>Cliente">Clientes</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url(); ?>Visita"><i class="fa fa-location-arrow"></i> Visitas a Clientes </a>

                            </li>
                            <li><a><i class="fa fa-table"></i> Tablas <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="tables.html">Reporte de Empleado</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/pachuca.png" alt="">Usuario
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;">Perfil</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Config</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Ayuda</a></li>
                                <li><a href="<?php echo base_url() . 'Login/CerrarSesion'; ?> "><i class="fa fa-sign-out pull-right"></i>Cerrar sesión</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">