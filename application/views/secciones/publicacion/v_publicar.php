<?php $this->load->view('partes/p_header');?>
<?php $this->load->view('partes/p_navegacion');?>

<section id="publicar">


    <div class="container">
<h2><?php echo $titulo; ?></h2>
<hr>
      <div class="col-md-4">
      <div class="row">
      <form  id="frmPublicar" action="<?php echo base_url('Publicacion/guardarRegistroPub');?>" method="post">
            <div class="form-group input-group">

              <input class="form-control" readonly type="hidden" name="idpublicacion" value="<?php echo (isset($datosPub[0]->idpublicacion) ? $datosPub[0]->idpublicacion  : ""); ?>">
            </div>

            <div class="form-group input-group">
              <span class="input-group-addon">Titulo:</span>
              <input class="form-control" placeholder="Apartamento, Casa, Finca" type="text" name="titulo" maxlength=48 value="<?php echo (isset($datosPub[0]->titulo) ? $datosPub[0]->titulo  : ""); ?>" required>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Direcci&oacute;n:</span>
              <input class="form-control" type="text" placeholder="Direccion" name="direccion" value="<?php echo (isset($datosPub[0]->direccion) ? $datosPub[0]->direccion  : ""); ?>" required>
            </div>

            <div class="form-group input-group">
              <span class="input-group-addon">Tipo:</span>
              <select class="form-control" name="tipo" required>
                <option value="">Selecciona</option>
                <?php
                foreach ($tipo as $value) {
                  $seleccionar = ($datosPub[0]->tipo == $value->id) ? "selected" : "";
                  echo "<option value='{$value->id}' {$seleccionar}>{$value->nombre}</option>";
                }
                ?>
              </select>
            </div>

            <div class="form-group input-group">
              <span class="input-group-addon">Precio:</span>
              <input class="form-control" type="number" name="precio" placeholder="120000" step="any" value="<?php echo (isset($datosPub[0]->precio) ? $datosPub[0]->precio  : ""); ?>" required>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Accion:</span>
              <select class="form-control" name="accion"  required>
                  <option value="">Selecciona</option>
                <?php
                foreach ($accion as $value) {
                  $seleccionar = ($datosPub[0]->accion == $value->id) ? "selected" : "";
                  echo "<option value='{$value->id}' {$seleccionar}>{$value->nombre}</option>";
                }
                ?>
              </select>
            </div>

            <div class="form-group input-group">
              <span class="input-group-addon">Descripcion:</span>
              <textarea class="form-control" name="descripcion" required><?php echo (isset($datosPub[0]->precio) ? $datosPub[0]->descripcion  : ""); ?></textarea>

            </div>
            <input class="form-control" type="hidden" name="LTN" id="lat" value="<?php echo (isset($datosPub[0]->precio) ? $datosPub[0]->LTN  : "");  ?>" required>

            <input class="form-control" type="hidden" name="LGT" id="lng" value="<?php echo (isset($datosPub[0]->precio) ? $datosPub[0]->LGT  : "");  ?>" required/>
            <input class="form-control" readonly type="hidden" name="idusuario" value="<?php echo $this->session->datosusu[0]->idusuario; ?>">
              <button class="btn btn-primary" type="sumit">Guardar</button>
          </div>
      </form><br>
        <?php if(isset($datosPub) && $datosPub[0]->LTN != 0 ){echo "<div class=\"alert alert-info\"><h5 class=\"text-warning\">Actualmente tiene una ubicacion guardada si mueve el marcador cambiara la ubicacion</h5></div>";} ?>
        </div>


<div class="col-md-8">
  <div style="float: left;display: block;width: 100%;overflow: hidden;position: relative;min-height: 325px;margin-top: 2%;margin-bottom: 2%;box-shadow: 1px 2px 6px 1px #ddd;">
      <div id="map"></div>

  </div>

</div>

<div class=container"" align="center">
<!-- Agueue esto para  -->
<!-- Para Poner la imagenes de que se esta editando -->
<!-- Si es editar entonces aparecen la imagenes de la publicacion -->
  <?php
if ($titulo == "Editar") {
  $this->Publicaciones_model->presentarImagenesPublicacion($datosPub[0]->idpublicacion);

}
?>
</div>
      <div class="col-md-12">
        <br />
        <div class="container" style="width:100%;" align="center">

             <div class="file_drag_area">
                <h2 class="text-info">  Arrastrar Imagen/es</h2>
                  <!--<input type="file" name="" value="">-->
             </div>

             <div id="uploaded_file"></div>
        </div>
        <br />
<script type="text/javascript">
$(document).ready(function(){
     $('.file_drag_area').on('dragover', function(){
          $(this).addClass('file_drag_over');
          return false;
     });
     $('.file_drag_area').on('dragleave', function(){
          $(this).removeClass('file_drag_over');
          return false;
     });
     $('.file_drag_area').on('drop', function(e){
          e.preventDefault();
          $(this).removeClass('file_drag_over');
          var formData = new FormData();
          var files_list = e.originalEvent.dataTransfer.files;
          //console.log(files_list);
          for(var i=0; i<files_list.length; i++)
          {
               formData.append('file[]', files_list[i]);
          }
          //console.log(formData);
          $.ajax({
               url:"<?php echo base_url('Publicacion/cargaFotoDragDrop')?>",
               method:"POST",
               data:formData,
               contentType:false,
               cache: false,
               processData: false,
               success:function(data){
                    $('#uploaded_file').html(data);
               }
          })
     });

$('#frmPublicar').submit(function() {
  if($('#uploaded_file').html()==""){
    alert("Debe subir almenos una imagen");
    return false;
  }

});
});

/*
@Organization: ASTRO
@Author: JOSE GABRIEL ESCOBOSO
*/

var marcador; //variable para mas marcadores
var posicion;
//funcion para iniciar mapa y marcador
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    center: {lat: 18.6976733, lng: -71.2867375} //coordenadas Republica Dominicana
  });
  marcador = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: 18.6976733, lng: -71.2867375} //posicion inicial del marcador
  });
  marcador.addListener('drag', obtnCoodenada);
}
//funcion que obtiene las coordenadas para cuardar en la base de datos
function obtnCoodenada() {
  posicion = marcador.getPosition();
  document.getElementById('lat').value = posicion.lat();
  document.getElementById('lng').value = posicion.lng();
  //activa o no activa animacion
  if (marcador.getAnimation() !== null) {
    marcador.setAnimation(null);
  } else {
    marcador.setAnimation(google.maps.Animation.BOUNCE);
  }
}

</script>
</div>

</div>
<script async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBC93hYoP_ZYTy7DZQLWJF1S65D7_uA9E&callback=initMap"></script>
</section>
<?php $this->load->view('partes/p_footer.php'); ?>
