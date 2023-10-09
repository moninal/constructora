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
        <link href="assets/libs/fullcalendar/main.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" /> 
        <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
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

                        <div class="row"> 

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
 
                                        <p style="font-weight: bold" class="text-muted font-13 mb-1">
                                            Consultas de los alquileres de los equipos
                                        </p>

                                               <form   enctype="multipart/form-data"  name="fileinfo">
                                                    @csrf   
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="row"> 
                        
                                                                <div class="col-md-2"> 
                                                                        <label for="field-1" class="form-label">Fecha de Desde </label>
                                                                        <input type="date" id="fechadesde" class="form-control input-sm" name="fechadesde"  value="<?php echo date('Y-m-d');?>"  required autofocus>        
                                                                </div>
                                                                <div class="col-md-2"> 
                                                                        <label for="field-1" class="form-label">Fecha de Hasta </label>
                                                                        <input type="date" id="fechahasta" class="form-control input-sm" name="fechahasta"  value="<?php echo date('Y-m-d');?>"  required autofocus>        
                                                                </div>  
                                                                <div class="col-md-6"> 
                                                                        <label for="field-1" class="form-label">Entrega </label>
                                                                        <input type="text" id="entrega" class="form-control input-sm" name="entrega" placeholder="adelanto..."  required autofocus onchange="adelanto()">      
                                                                </div>  
                                                                <div class="col-md-2">  
                                                                    <a id="consultastock" style="color: white" onclick="tconsultaalquiler('buscaralquiler')" class="btn btn-info waves-effect waves-light">Buscar</a>
                                                                </div>
                                                            </div>  
                                                        </div>  <!-- end row -->
                                                    </div> <!-- end card body--> 
                                                </form> 
                                         

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div> <!-- end row --> 
                        <div class="row"> 

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body"> 
                                      <div id="contenido_capa_edicion">
                                        <a style="color: white" class="btn btn-success btn-round waves-effect waves-light" href="pdfalquiler"  target="_blank" ><i data-feather="printer"></i> Imprimir</a>
                                        <a style="color: white" class="btn btn-success btn-round waves-effect waves-light" href="excelalquiler"  target="_blank" ><i data-feather="file-plus"></i> Excel</a>
                                        <br>
                                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Equipo</th>
                                                    <th>Entrega</th>
                                                    <th>Fecha alquiler</th>
                                                    <th>Fecha entrega</th>
                                                    <th>Dias</th>
                                                    <th>Monto</th>
                                                    <th>Adelanto</th> 
                                                    <th>Estado</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cont=0; foreach ($alquiler as $a ) { ?>
                                                <tr>
                                                    <td><?= $a->equipo ?></td>
                                                    <td><?= $a->entrega ?></td>
                                                    <td><?= $a->fechaalquiler ?></td>
                                                    <td><?= $a->fechaentrega ?></td>
                                                    <td><?= $a->totaldias ?></td>
                                                    <td><?= $a->montopago ?></td>
                                                    <td><?= $a->montoadelanto ?></td> 
                                                    <td style="color: <?= $a->color ?>"><?= $a->estado ?></td>  
                                                </tr> 
                                                <?php } ?> 
                                            </tbody>
                                        </table>
                                      </div>
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div> <!-- end row --> 
                        
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

        
        @extends('layouts.modal') 
        <!-- END wrapper -->
    </body>
        @extends('layouts.script2')  

    <script type="text/javascript">
        
        function tconsultaalquiler(arg){

                var id1=$('#fechadesde').val();
                var id2=$('#fechahasta').val();
                var id3=$('#entrega').val(); 
                if(!id3){
                    id3=0;
                }
                var url=arg+"/"+id1+"/"+id2+"/"+id3;
                $.get(url, function(resul){
                    $("#contenido_capa_edicion").html(resul);
                })

        }
    </script>
</html>