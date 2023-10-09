<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/ubold/layouts/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Sep 2022 15:26:21 GMT -->
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
        <style type="text/css">
            .fe-alquiler:before {
                font-family: "Font Awesome 5 Free";
                font-weight: 600;
                content: "\f124";
            }
            .fe-adelanto:before {
                font-family: "Font Awesome 5 Free";
                font-weight: 600;
                content: "\f080";
            }
        </style>

    </head> 
    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-layout-width="fluid" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
 
    
                        
    
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                                <i data-feather="maximize" class="icon-dual"></i>
                            </a>
                        </li> 
    
                      
    
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    {{ Auth::user()->name }}  <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Bienvenido !</h6>
                                </div> 
    
                                <!-- item-->
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

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-bs-toggle="dropdown">Geneva Kennedy</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings me-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock me-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out me-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                    </div>

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

                                        <li>
                                            <a href="#alquilerEquipoOp3" data-bs-toggle="collapse">
                                                Listados <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="alquilerEquipoOp3">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="reportealquilerrealizados">Alquiler realizados</a>
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

                    <!-- Start Content-->
                    <div class="container-fluid">
                         <br>

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                    <i class="fe-heart font-22 avatar-title text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><!--N°--> <span data-plugin="counterup">195</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Alquiler Equipos</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                    <i class="fe-alquiler font-22 avatar-title text-success"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">6</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Alquiler <?= date("d-m-Y") ?></p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                                    <i class="fe-adelanto font-22 avatar-title text-info"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">82</span><!--%--></h3>
                                                    <p class="text-muted mb-1 text-truncate">Pagos Pendientes</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                                    <i class="fe-adelanto font-22 avatar-title text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">2</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Adelantos Vence hoy</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body"> 
    
                                        <h4 class="header-title mb-0">Total Recaudacion</h4>
    
                                        <div class="widget-chart text-center" dir="ltr">
                                            
                                            <div id="total-revenue" class="mt-0"  data-colors="#f1556c"></div>
    
                                            <h5 class="text-muted mt-0">Pagos totales por los aqluileres</h5>
                                            <h2>S/ 12 530.00</h2>
    
                                            <p class="text-muted w-75 mx-auto sp-line-2">Registro unico de informacion de lo generado hasta hoy con la fuente principal de alquileres de equipos</p>
                                            
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col-->

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body pb-2"> 
    
                                        <h4 class="header-title mb-3">Progreso de proyecctos realizados</h4>
    
                                        <div dir="ltr">
                                            <div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Sistema <a href="#">Constructora</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/libs/selectize/js/standalone/selectize.min.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        
    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Sep 2022 15:27:04 GMT -->
</html>