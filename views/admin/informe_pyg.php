<?php include "header.php";?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">           
            <div class="col-lg-6">
            <form mehod="GET" id="form-fechas">
                <div class="form-group" id="data_5">
                    <label class="font-noraml">Rango</label>
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="text" id="fecha_inicio" class="input-sm form-control" name="fecha_inicio" value="<?=$fecha_inicio?>"/>
                        <span class="input-group-addon">Hasta</span>
                        <input type="text" id="fecha_fin" class="input-sm form-control" name="fecha_fin" value="<?=$fecha_fin?>" />
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="row">           
            <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>P y G</h5>
                    </div>
                    <div class="ibox-content">

                        <p class="m-b-lg">
                            <!--Each list you can customize by standard css styles. Each element is responsive so you can add to it any other element to improve functionality of list.-->
                        </p>

                        <div class="dd" id="nestable2">
                            <ol class="dd-list">
                                <li class="dd-item" data-id="1">
                                    <div class="dd-handle">
                                        <span class="label label-info"><i class="fa fa-users"></i></span> Estados de resultados
                                    </div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle">
                                                <span class="pull-right"> <?=$unidades_vendidas['cantidad']?> </span>
                                                <span class="label label-info"></span> Ventas Unidades
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="3">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-info"></span> Ventas Netas (Antes de IVA)
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="4">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-info"></span> Costo de Inventario (Antes de IVA)
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="5">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-info"></span> Margen Bruto de Ventas ($)
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="6">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0% </span>
                                                <span class="label label-info"></span> Margen Bruto de Ventas (%)
                                            </div>
                                        </li>                                        
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="7">
                                    <div class="dd-handle">
                                        <span class="label label-primary"><i class="fa fa-users"></i></span> Total gastos operacionales
                                    </div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="8">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-primary"></span> Margen Neto de Ventas ($)
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="9">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0% </span>
                                                <span class="label label-primary"></span> Margen Neto de Ventas (%)
                                            </div>
                                        </li>                                        
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="10">
                                    <div class="dd-handle">
                                        <span class="label label-warning"><i class="fa fa-users"></i></span> Gastos de Promoción
                                    </div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="11">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-warning"></span> Cupones
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="12">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-warning"></span> Ofertas
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="13">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-warning"></span> Puntos
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="14">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-warning"></span> Incentivos
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="15">
                                    <div class="dd-handle">
                                        <span class="label label-success"><i class="fa fa-users"></i></span> Gastos de Publicidad
                                    </div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="16">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-success"></span> Eventos
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="17">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-success"></span> Publicaciones
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="18">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-success"></span> Material POP + Muestras
                                            </div>
                                        </li>                                        
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="19">
                                    <div class="dd-handle">
                                        <span class="label label-default"><i class="fa fa-users"></i></span> Gastos de Venta
                                    </div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="20">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-default"></span> Comisión Líderes (5% Venta Neta)
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="21">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-default"></span> Incentivos Líderes (Bonos)
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="22">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-default"></span> Total Líder
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="23">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-default"></span> Participación Líder (%)
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="24">
                                    <div class="dd-handle">
                                        <span class="label label-danger"><i class="fa fa-users"></i></span> Gastos de Operaciones
                                    </div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="25">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-danger"></span> Fletes
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="26">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-danger"></span> Viaticos
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="27">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-danger"></span> Personal
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="28">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-danger"></span> Plataforma Digital
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="29">
                                            <div class="dd-handle">
                                                <span class="pull-right"> 0 </span>
                                                <span class="label label-danger"></span> Diseño de Campañas y POP
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "footer.php";?>