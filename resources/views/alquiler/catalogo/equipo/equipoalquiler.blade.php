 
<!DOCTYPE html>
<html lang="en">
<head> 

        <meta charset="utf-8" />
        <title>Consultora y Constructora</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="imagenes/logo.png">
        <!-- Plugins css -->
        <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
        <!-- icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- Head js -->
        <script src="assets/js/head.js"></script> 
        <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 
    </head>

    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-layout-width="fluid" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

        <!-- Begin page -->
        <div id="wrapper"> 
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
 
    
                        <li class="dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i data-feather="search" ></i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>
    
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                                <i data-feather="maximize" class="icon-dual"></i>
                            </a>
                        </li>  
    
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    {{ Auth::user()->name }}  <i data-feather="chevron-down" class="icon-dual"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Bienvenido !</h6>
                                </div>  
                                <!-- item-->
                                <!--<a href="logout" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Cerrar sesion</span>
                                </a> -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item notify-item">
                                        <i data-feather="log-out" class="icon-dual "></i>{{ __('Cerrar sesion') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </li>  
                    </ul>
    
                    <!-- LOGO -->
                    
                    <div class="logo-box">
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>
    
                        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="imagenes/logo.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="imagenes/logcompleto.png" alt="" height="50" width="100">
                            </span>
                        </a>
                    </div>
    
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i data-feather="align-justify" class="icon-dual"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>    
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar> 
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu"> 

                            <li>
                                <a href="dashboard">
                                    <i data-feather="home" class="icon-dual"></i>
                                    <span> Inicio </span>
                                </a>
                            </li>

                            <li>
                                <a href="#sidebarCrm" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Usuarios </span>
                                    <span class="menu-arrow login"></span>
                                </a>
                                <div class="collapse" id="sidebarCrm">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="#sidebarCrm2" data-bs-toggle="collapse">
                                                Operaciones <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarCrm2">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="register">Registro</a>
                                                    </li> 
                                                </ul>
                                            </div>  
                                        </li> 
                                    </ul>
                                </div>
                            </li> 
                            <li>
                                <a href="#alquilerEquipo" data-bs-toggle="collapse">
                                    <i data-feather="box" class="icon-dual"></i>
                                    <span> Alquiler de equipos </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="alquilerEquipo">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="#alquilerEquipo2" data-bs-toggle="collapse">
                                                Catalogo <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="alquilerEquipo2">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="equipoalquiler">Equipo</a>
                                                    </li> 
                                                </ul>
                                            </div>  
                                        </li> 
                                        <li>
                                            <a href="#alquilerEquipoOp2" data-bs-toggle="collapse">
                                                Operaciones <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="alquilerEquipoOp2">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="alquiler">Alquiler</a>
                                                    </li> 
                                                </ul>
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="adelanto">Adelanto</a>
                                                    </li> 
                                                </ul>
                                            </div>  
                                        </li> 
                                    </ul>
                                </div>
                            </li>  

                            <li>
                                <a href="#proyecto" data-bs-toggle="collapse">
                                    <i data-feather="columns" class="icon-dual"></i>
                                    <span> Proyectos </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="proyecto">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="#proyecto2" data-bs-toggle="collapse">
                                                Catalogo <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="proyecto2">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="ciudad">Ciudad</a>
                                                    </li> 
                                                </ul>
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="actividad">Actividad</a>
                                                    </li> 
                                                </ul>
                                            </div>  
                                        </li> 
                                        <li>
                                            <a href="#proyectoOp2" data-bs-toggle="collapse">
                                                Operaciones <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="proyectoOp2">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="ingresoproyecto">Ingreso de proyecto</a>
                                                    </li> 
                                                </ul> 
                                            </div>  
                                        </li> 
                                    </ul>
                                </div>
                            </li>  
    
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a onclick="form_nuevo('form_nuevo_equipo')" id="myBtn" type="button" class="btn btn-sm btn-success waves-effect waves-light float-end" data-bs-toggle="modal" data-bs-target="#con-close-modal">
                                            <i style="color: white" data-feather="plus" class="icon-dual"></i>   
                                        </a> 
                                        <h4 class="header-title mb-4">Equipos</h4>
                                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Descripcion</th> 
                                                    <th>Monto</th> 
                                                    <th></th> 
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <?php $cont=0; foreach ($equipo as $e) { $cont++; ?>
                                                <tr>
                                                    <td><?= $cont ?></td>
                                                    <td><?= $e->descripcion ?></td> 
                                                    <td><?= $e->monto ?></td> 
                                                    <td> <i style="cursor: pointer" data-feather="edit" data-bs-toggle="modal" data-bs-target="#edit-close-modal" class="icon-dual" onclick="form_editar('formeditarequipo',<?= $e->idequipo ?>)"></i>
                                                    <i style="cursor: pointer" data-feather="trash-2" class="icon-dual" data-bs-toggle="modal" data-bs-target="#borrar-close-modal"onclick="borrar('borrarequipo','equipoalquiler',<?= $e->idequipo ?>)"></i></td> 
                                                </tr>
                                                <?php } ?> 
                                            </tbody>
                                        </table>
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; sistema  <a href="#">Ventas</a> 
                            </div> 
                        </div>
                    </div>
                </footer> 
            </div>  
        </div>

        @extends('alquiler.catalogo.equipo.modal') 
        <!-- END wrapper -->
    </body>

        @extends('layouts.script') 
<!-- Mirrored from coderthemes.com/ubold/layouts/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Sep 2022 15:27:04 GMT -->
</html>