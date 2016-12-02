<?php $this->load->view('partes/p_header');?>
<?php $this->load->view('partes/p_navegacion');?>
<section id="detalle">
  <div class="container">
    <h2><?php echo $titulo; ?></h2>

    <?php
    foreach ($publicacion as $lineaPub){

    };

    ?>

    <hr>
    <div class="col-md-12">

<!-- Aqui inicia el Visor -->


                                  <!--/Slider-->
    <div id="main_area">
      <div class="col-sm-12">
        <div id="slider">
          <!-- Top part of the slider -->
            <div class="col-sm-12" id="carousel-bounding-box">
              <div class="carousel slide" id="myCarousel">
                <!-- Carousel items -->
                <div class="carousel-inner">

                  <?php $this->Publicaciones_model->generarHTMLVisorImagenes($lineaPub->idpublicacion);  ?>
                </div>
                    <!-- Carousel nav -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                  </div>
                </div>
              </div>
          </div>
        <!-- Slider -->
            <div class="col-sm-12" id="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">

              <?php $this->Publicaciones_model->generarHTMLVisorImagenesParte2($lineaPub->idpublicacion);  ?>

                </ul>
            </div>

    </div>

<!-- Aqui termina el Visor -->

<!-- Aqui inicia el Script para el visor -->
<script type="text/javascript">
jQuery(document).ready(function($) {

      $('#myCarousel').carousel({
              interval: 5000
      });

      //Handles the carousel thumbnails
      $('[id^=carousel-selector-]').click(function () {
      var id_selector = $(this).attr("id");
      try {
          var id = /-(\d+)$/.exec(id_selector)[1];
          console.log(id_selector, id);
          jQuery('#myCarousel').carousel(parseInt(id));
      } catch (e) {
          console.log('Regex failed!', e);
      }
  });
      // When the carousel slides, auto update the text
      $('#myCarousel').on('slid.bs.carousel', function (e) {
               var id = $('.item.active').data('slide-number');
              $('#carousel-text').html($('#slide-content-'+id).html());
      });
});


</script>
<!-- Aqui termina el Script para el visor -->
         <div class="panel-body mbl">
            <div class="param-table">
                <div class="param-table-row">

                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Nombre</span><strong><?php echo $lineUsu->nombre." ".$lineUsu->apellido ;  ?></strong>
                  </div>

                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Telefono</span><strong><?php echo  (isset($lineUsu->telefono) && $lineUsu->telefono !=""? $lineUsu->telefono : "NO");  ?></strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Fax</span><strong><?php echo (isset($lineUsu->fax) && $lineUsu->fax !=""? $lineUsu->fax : "NO");  ?></strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Celular</span><strong><?php echo  (isset($lineUsu->celular) && $lineUsu->celular !=""? $lineUsu->celular : "NO");  ?></strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Direccion</span><strong><?php echo  (isset($lineUsu->direccion) && $lineUsu->direccion !=""? $lineUsu->direccion : "NO");  ?></strong>
                  </div>

                  </div>

                  <div class="param-table-row">
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Precio</span><strong><?php echo $lineaPub->precio; ?></strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Accion</span><strong><?php echo $lineaPub->accion; ?></strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Tipo</span><strong><?php echo $lineaPub->tipo; ?></strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Descripcion</span><strong><?php echo $lineaPub->descripcion; ?></strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Mapa</span><strong><a href="<?php echo base_url('publicacion/mapa'); ?>">Ir a Mapa</a></strong>
                  </div>
                  </div>
            </div>
	       </div>
    </div>

  </div>
</section>
<?php $this->load->view('partes/p_footer');?>
