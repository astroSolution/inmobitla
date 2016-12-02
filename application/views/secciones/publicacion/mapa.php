<?php $this->load->view('partes/p_header');?>
<?php $this->load->view('partes/p_navegacion');?>
<section>
  <?php
$json=array();
  foreach ($localizacion as $valor) {
    $foto = base_url('upload/'.$valor->idpublicacion.'_1.png');

    $generaLink = base_url("publicacion/ver/".$valor->idpublicacion.'/'.urls_amigables($valor->titulo));
    $json[]=array(
      "title"=>$valor->titulo, //titulo a mostrar
      "lat"=>$valor->LTN, //latitud
      "lng"=>$valor->LGT, //longitud
      "description"=> "<img src='{$foto}' width='200px'>
      <br/>{$valor->titulo} | <label class=\"label label-success\">RD$ {$valor->precio}</label> | <a href='{$generaLink}'>Ver Mas detalle</a>
    "
      //descripcion a mostrar, esta ultima hay que hacerle un cambio darle un buen estilo para que se vea nitida
    );
  }
  $json = json_encode($json);
  ?>
  <div class="container">
    <div class="col-md-12">
      <div class="map">
      <div id="map"></div>
    </div>
    </div>
  </div>
</section>
<script>
(function() {

window.onload = function() { //realiza funciones dentro durante la carga del documento

// crea el mapa
var map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(18.6976733,-71.2867375), //posicionando mapa en republica dominicana
    zoom: 8 //distancia para mostrar todo el pais

  });


// creando datos json
var json =<?php echo $json;?>;

// objeto para generar la informacion que se va a setear a cada punto en el mapa
var infoWindow = new google.maps.InfoWindow();

// recorriendo datos de arreglo json con los valores de cada punto
for (var i = 0, length = json.length; i < length; i++) {
var data = json[i],
  latLng = new google.maps.LatLng(data.lat, data.lng); //seteando longitud y latitud a cada marcador

// creando marcador o punto y agregandolo al mapa
var marker = new google.maps.Marker({
  position: latLng,
  map: map,
  title: data.title//agrega titulo
});

// Closure para agregar la informacion a los marcadores
(function(marker, data) {

  // acepta click para ver informaccion
  google.maps.event.addListener(marker, "click", function(e) {
    infoWindow.setContent(data.description);
    infoWindow.open(map, marker);
  });
})(marker, data);

}

}

})();
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBC93hYoP_ZYTy7DZQLWJF1S65D7_uA9E" async defer></script>
<?php $this->load->view('partes/p_footer.php'); ?>
