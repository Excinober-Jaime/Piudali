<?php include "header.php";?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">            
            <a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS?>">
                <div class="col-xs-12 col-md-4 text-center">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h2><i class="fa fa-user" aria-hidden="true"></i></h2>
                        <p>Usuarios</p>
                      </div>
                    </div>    
                </div>
            </a>
            <a href="<?=URL_ADMIN."/".URL_ADMIN_PRODUCTOS?>">
                <div class="col-xs-12 col-md-4 text-center">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h2><i class="fa fa-suitcase" aria-hidden="true"></i></h2>
                        <p>Productos</p>
                      </div>
                    </div>    
                </div>
            </a>
            <a href="<?=URL_ADMIN."/".URL_ADMIN_ORDENES?>">
                <div class="col-xs-12 col-md-4 text-center">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h2><i class="fa fa-shopping-cart" aria-hidden="true"></i></h2>
                        <p>Ordenes</p>
                      </div>
                    </div>    
                </div>
            </a>
        </div>
    </div>
<?php include "footer.php";?>