<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Main view</title>

    <base href="<?=URL_SITIO?>">

    <link href="assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?=URL_SITIO.URL_USUARIO."/".URL_SALIR?>">Logout</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
				<li class="active"><a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS?>"><i class="fa fa-th-large"></i> <span class="nav-label">Usuarios</span></a></li>
				<li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Catálogo</span> <span class="fa arrow"></span></a>
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
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Contenidos</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_PAGINAS?>">Páginas</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_BANNERS?>">Banners</a></li>   
                    </ul>
                </li>               							
				<li><a href="<?=URL_ADMIN."/".URL_ADMIN_CAMPANAS?>"><i class="fa fa-th-large"></i> <span class="nav-label">Campañas</span></a></li>
				
				<li><a href="<?=URL_ADMIN."/".URL_ADMIN_ORDENES?>"><i class="fa fa-th-large"></i> <span class="nav-label">Ordenes</span></a></li>
                <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Capacitación</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_INGREDIENTES?>">Ingredientes</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_PROTOCOLOS?>">Protocolos</a></li>
                    </ul>
                </li>                
				<li><a href="<?=URL_ADMIN."/".URL_ADMIN_INCENTIVOS?>"><i class="fa fa-th-large"></i> <span class="nav-label">Incentivos</span></a></li>
				<li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Informes</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#">P y G</a></li>
                    </ul>
                </li>                   
                <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Administración</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="#">Personal</a></li>
                        <li><a href="<?=URL_ADMIN."/".URL_ADMIN_PLANTILLAS?>">Plantillas Email</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
    	<div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="<?=URL_SITIO.URL_USUARIO."/".URL_SALIR?>">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>