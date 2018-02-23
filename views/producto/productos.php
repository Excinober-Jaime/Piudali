<?php 
function producto_bloque($imagen="",$nombre="",$codigo="",$tipo="",$precio=0,$oferta=0,$link="",$col_sm="col-sm-3", $relacionados = false){

  if ($col_sm == "col-sm-2") {
    $font_style = "height: 4em; font-size:12px;";
  }else{
    $font_style = "height: 4em";
  }
?>
<div class="col-xs-12 <?=$col_sm?>">
    <div class="thumbnail">                
        <a href="<?=URL_PRODUCTOS.'/'.$link?>"><img data-src="<?=$imagen?>" alt="producto"  src="<?=$imagen?>"></a>
        <div class="caption">
            <h4 style="<?=$font_style?>"><?=$nombre?></h4>
            <p>Código: <?=$codigo?></p>
            <div style="margin:0px; padding:0px; height: 37px;">                     
                <div style="float:left;width:80%;margin:0px; padding:0px;">
                  <?php 
                  if ($oferta>0) {
                  ?>
                    <h5><?=convertir_pesos($precio)?></h5>
                    <h4><?=convertir_pesos($oferta)?></h4>
                  <?php                  
                  }else{
                  ?>
                    <h4><?=convertir_pesos($precio)?></h4>
                  <?php
                  }
                  ?>
                    
                  <?php 
                  ?>
                </div>
                <?php 
                  if ($oferta>0) {
                  ?>
                    <div style="float:right;width:20%;margin:0px; padding:0px;">
                      <div style="background:#ec7e07;border-radius:20px;width:40px;height:40px;padding-top:10px;color:#fff;font-size:15px;text-align:center;"><?=round((($oferta/$precio)-1)*100)?></div>
                    </div>
                  <?php                  
                  }?>                
            </div>
            <p><center>
              <a href="<?=URL_PRODUCTOS.'/'.$link?>" class="btn btn-default" role="button">Ver Detalle</a>
              <?php 
              if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'DISTRIBUIDOR DIRECTO' && $tipo == 'NORMAL' && !$relacionados){ /*
              ?>
                <a class="btn btn-primary" data-toggle="popover" title="Comparte éste enlace" data-placement="top" data-content="<?=URL_SITIO.URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$link.'?d='.$_SESSION['idusuario']?>">Vender</a>
              <?php
              */}
              ?>
              
            </center></p>
         </div>
    </div>
</div>
<?php
}
?>