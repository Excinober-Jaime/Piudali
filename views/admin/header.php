<?php
$breadcrumb = explode("/", $_GET["url"]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Main view</title>

    <base href="<?=URL_SITIO?>">

    <link href="assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/admin/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="assets/admin/css/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="assets/admin/css/animate.css" rel="stylesheet">
    <link href="assets/admin/css/style.css" rel="stylesheet">
</head>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$_SESSION["admin_nombre"]?></strong>
                             </span> <span class="text-muted text-xs block"><?=$_SESSION["admin_cargo"]?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?=URL_SITIO.URL_ADMIN."/".URL_ADMIN_SALIR?>">Salir</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <?php 
                if (isset($_SESSION["admin_rol"])) {
                 switch ($_SESSION["admin_rol"]) {
                    case 'ADMIN':
                ?>
				<li class="active"><a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS?>"><i class="fa fa-user" aria-hidden="true"></i> <span class="nav-label">Usuarios</span></a></li>
				<li>
                    <a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i> <span class="nav-label">Catálogo</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                        	<a href="<?=URL_ADMIN."/".URL_ADMIN_PRODUCTOS?>">Productos</a>
                        </li>
                        <li>
                        	<a href="<?=URL_ADMIN."/".URL_ADMIN_CATEGORIAS?>">Categorías</a>
                        </li>
                        <!--<li><a href="dashboard_5.html">Dashboard v.5 <span class="label label-primary pull-right">NEW</span></a></li>-->
                    </ul>
                </li>								
                <li>
                    <a href="#"><i class="fa fa-align-center" aria-hidden="true"></i> <span class="nav-label">Contenidos</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_PAGINAS?>">Páginas</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_BANNERS?>">Banners</a></li>   
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_ENTRADAS_CLUB?>">Entradas Club</a></li>
                    </ul>
                </li>               							
                <li><a href="<?=URL_ADMIN."/".URL_ADMIN_TICKETS?>"><i class="fa fa-ticket" aria-hidden="true"></i> <span class="nav-label">Tickets</span></a></li>

                <li>
                    <a href="#"><i class="fa fa-code" aria-hidden="true"></i> <span class="nav-label">Códigos con Puntos</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_CODIGOS_PUNTOS?>">Listar Códigos</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_CODIGOS_PUNTOS."/Nuevo"?>">Crear Códigos</a></li>
                    </ul>
                </li>
				<li><a href="<?=URL_ADMIN."/".URL_ADMIN_CAMPANAS?>"><i class="fa fa-bullhorn" aria-hidden="true"></i> <span class="nav-label">Campañas</span></a></li>
                <!--<li><a href="<?=URL_ADMIN."/".URL_ADMIN_DESCUENTOS_ESPECIALES?>"><i class="fa fa-bullhorn" aria-hidden="true"></i> <span class="nav-label">Escalas Especiales</span></a></li>-->
                
                <li>
                    <a href="<?=URL_ADMIN."/".URL_ADMIN_CANALES_DISTRIBUCION?>"><i class="fa fa-briefcase" aria-hidden="true"></i>
                    <span class="nav-label">Canales de Distribución</span></a>
                </li>
                
                <li><a href="<?=URL_ADMIN."/".URL_ADMIN_CUPONES?>"><i class="fa fa-bullhorn" aria-hidden="true"></i> <span class="nav-label">Cupones</span></a></li>      
				<li><a href="<?=URL_ADMIN."/".URL_ADMIN_ORDENES?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="nav-label">Ordenes</span></a></li>

                <li>
                    <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span class="nav-label">Capacitación</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_CAPACITACION_CATEGORIAS?>">Categorías</a></li>                        
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_CAPACITACION_ELEMENTOS?>">Elementos</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_INGREDIENTES?>">Ingredientes</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_PROTOCOLOS?>">Protocolos</a></li>
                    </ul>
                </li>                
				<li><a href="<?=URL_ADMIN."/".URL_ADMIN_INCENTIVOS?>"><i class="fa fa-dollar" aria-hidden="true"></i> <span class="nav-label">Incentivos</span></a></li>
				<li>

                <li>
                    <a href="#"><i class="fa fa-dollar" aria-hidden="true"></i> <span class="nav-label">Pagos</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_PAGOS_COMISIONES?>">Pagos Comisiones</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_PAGOS_INCENTIVOS?>">Pagos Incentivos</a></li>
                    </ul>
                </li>   
                
                <li><a href="<?=URL_ADMIN."/".URL_ADMIN_SUSCRIPTORES?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="nav-label">Newsletter</span></a></li>
                <li>                
                    <a href="#"><i class="fa fa-area-chart" aria-hidden="true"></i> <span class="nav-label">Informes</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_INFORMES."/".URL_ADMIN_INFORME_USUARIOS?>">Informe Clientes</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_INFORMES."/".URL_ADMIN_INFORME_ORDENES?>">Informe Ventas</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_INFORMES."/".URL_ADMIN_INFORME_PRODUCTOS?>">Informe Productos</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_INFORMES."/".URL_ADMIN_INFORME_PAGOS?>">Informe Pagos Pendientes</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_INFORMES."/".URL_ADMIN_INFORME_PYG?>">P y G</a></li>                    
                    </ul>
                </li>
                <li>                
                    <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> <span class="nav-label">Geolocalización</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_GEOLOCALIZACION."/".URL_ADMIN_GEOLOCALIZACION_ZONAS?>">Zonas</a></li>                        
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_GEOLOCALIZACION."/".URL_ADMIN_GEOLOCALIZACION_REGIONES?>">Regiones</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-wrench" aria-hidden="true"></i> <span class="nav-label">Administración</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_PERSONAL?>">Personal</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_PLANTILLAS?>">Plantillas Email</a></li>
                    </ul>
                </li>
                <?php
                    break;
                    case 'PROVEEDOR':
                ?>
                <li>                
                    <a href="#"><i class="fa fa-area-chart" aria-hidden="true"></i> <span class="nav-label">Informes</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">                        
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_INFORMES."/".URL_ADMIN_INFORME_ORDENES?>">Informe Ventas</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_INFORMES."/".URL_ADMIN_INFORME_PRODUCTOS?>">Informe Productos</a></li>
                    </ul>
                </li>             
                <?php
                        break;
                    }
                }
                ?>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
    	<div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <div class="col-xs-2">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary"><i class="fa fa-bars"></i> </a>
                    </div>
                    <div class="col-xs-10">
                        <form role="search" class="navbar-form-custom" method="post">
                            <div class="form-group">
                                <input type="text" placeholder="Buscar..." class="form-control" name="top-search" id="top-search">
                            </div>                            
                        </form>                    
                        <i class="fa fa-search m-t" id="search" aria-hidden="true" style="cursor:pointer;"></i>
                    </div>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="<?=URL_SITIO.URL_ADMIN."/".URL_ADMIN_SALIR?>">
                            <i class="fa fa-sign-out"></i> Salir
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-xs-12">
                <h2><?=$breadcrumb[1]?></h2>
                <ol class="breadcrumb">
                  <li><a href="#"><?=$breadcrumb[1]?></a></li>
                  <li class="active"><?php if (!empty($breadcrumb[2])) { echo $breadcrumb[2]; }else{ echo "Lista"; }?></li>
                </ol>
            </div>
        </div>