 
<!DOCTYPE html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>sistema de ventas - xxxx</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
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
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <link href="assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" /> 
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" /> 
        <link href="assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" /> 
        <!-- Bootstrap Tables css -->
        <link href="assets/libs/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
 
    </head>

    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-layout-width="fluid" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

        <!-- Begin page -->
        <div id="wrapper"> 
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">

                        <li class="d-none d-lg-block">
                            <form class="app-search">
                                <div class="app-search-box dropdown">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search..." id="top-search">
                                        <button class="btn input-group-text" type="submit">
                                            <i data-feather="search" class="material-symbols-outlined"></i>
                                        </button>
                                    </div>  
                                </div>
                            </form>
                        </li>
    
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
    
                        <a href="dashboard" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="20">
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

                            <li class="menu-title">Navegación</li>
                
                            <li>
                                <a href="dashboard" >
                                    <i data-feather="airplay"></i> 
                                    <span> Inicio </span>
                                </a> 
                            </li> 
                            <?php if(Auth::user()->tipo==0){   ?>
                            <li>
                                <a href="#sidebarCrm" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Usuarios </span>
                                    <span class="menu-arrow"></span>
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
                            <?php  }  ?>

                            <li>
                                <a href="#sidebarVentas" data-bs-toggle="collapse">
                                    <i data-feather="share-2"></i>
                                    <span> Ventas </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarVentas">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="#sidebarVentas2" data-bs-toggle="collapse">
                                                Operaciones <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarVentas2">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="venta">Registro de ventas</a>
                                                    </li> 
                                                </ul>
                                                <?php if(Auth::user()->tipo==0){   ?>
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="anularventa">Anular venta</a>
                                                    </li> 
                                                </ul>
                                                <?php  }  ?>
                                            </div>
                                        </li>

                                        <!--<li>
                                            <a href="#sidebarVentas3" data-bs-toggle="collapse">
                                                Listado <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarVentas3">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="javascript: void(0);">Item 1</a>
                                                    </li> 
                                                </ul>
                                            </div>
                                        </li>-->

                                        <!--<li>
                                            <a href="#sidebarVentas4" data-bs-toggle="collapse">
                                                Catalogo <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarVentas4">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="proveedor">Proveedor</a>
                                                    </li> 
                                                </ul>
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="producto">Producto</a>
                                                    </li> 
                                                </ul>
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="unidad_medidap">Unidad de medida</a>
                                                    </li> 
                                                </ul>
                                            </div>
                                        </li>-->
                                    </ul>
                                </div>
                            </li>  
                            <?php if(Auth::user()->tipo==0){   ?>
                            <li>
                                <a href="#sidebarMultilevel" data-bs-toggle="collapse">
                                    <i data-feather="share-2"></i>
                                    <span> Compras </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="#sidebarMultilevel2" data-bs-toggle="collapse">
                                                Operaciones <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMultilevel2">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="compra">Registro de compras</a>
                                                    </li> 
                                                </ul>
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="anularcompra">Anular compra</a>
                                                    </li> 
                                                </ul>
                                            </div>
                                        </li> 

                                        <li>
                                            <a href="#sidebarMultilevel4" data-bs-toggle="collapse">
                                                Catalogo <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMultilevel4">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="proveedor">Proveedor</a>
                                                    </li> 
                                                </ul>
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="producto">Producto</a>
                                                    </li> 
                                                </ul>
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="unidad_medidap">Unidad de medida</a>
                                                    </li> 
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li> 

                            <li>
                                <a href="#sidebarReporte" data-bs-toggle="collapse">
                                    <i data-feather="share-2"></i>
                                    <span> Reporte </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarReporte">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="reporteventas">
                                                Ventas <span class="menu-arrow"></span>
                                            </a> 
                                        </li> 
                                        <li>
                                            <a href="reporteinventario">
                                                Inventario <span class="menu-arrow"></span>
                                            </a> 
                                        </li>  
                                    </ul>
                                </div>
                            </li>

                            <?php  }  ?> 
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
                          <form   enctype="multipart/form-data"  name="fileinfo">
                                            @csrf
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="modal-title">Consultas de la situacion actual del Stock de inventarios</h4>
                                            <div  class="row">    
                                                <div class="col-lg-6"> 
                                                        <label for="field-1" class="form-label">Producto  </label>
                                                        <select class="block mt-1 w-full form-control " data-toggle="select2"  id="idproducto" name="idproducto">
                                                                <option value="">Seleccione...</option>
                                                            <?php foreach ($producto as $p ) {  ?> 
                                                                <option value="<?= $p->idproducto?>"><?= $p->producto.' / '.$p->abreviatura ?></option>
                                                            <?php } ?> 
                                                        </select> 
                                                </div>   
                                                <div class="col-lg-2">  
                                                    <a id="consultastock" style="color: white" onclick="tconsultainventario('buscarstockproducto')" class="btn btn-info waves-effect waves-light">Consultar</a>
                                                </div>
                                            </div>   
  
 
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->

                                <div id="contenido_capa_edicion"></div>

                            </div><!-- end col-->
                          </form> 
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

        @extends('ventas.operaciones.venta.modal') 
        <!-- END wrapper -->
    </body>
    @extends('ventas.operaciones.venta.js') 
    @extends('layouts.script') 
    <script type="text/javascript">
        
        function tconsultainventario(arg){

                var id1=$('#idproducto').val(); 
                var url=arg+"/"+id1;
                $.get(url, function(resul){
                    $("#contenido_capa_edicion").html(resul);
                })

        }
    </script>
<!-- Mirrored from coderthemes.com/ubold/layouts/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Sep 2022 15:27:04 GMT -->
</html>