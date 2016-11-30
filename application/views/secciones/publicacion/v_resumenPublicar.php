<?php $this->load->view('partes/p_header');?>

</head>
<?php $this->load->view('partes/p_navegacion');?>
<div class="col-md-1">
</div>

<section id="publicar">


    <div class="container">

      <div class="col-md-12">
      <h3>Resumen  / Edicion Publicacion</h3>
        <div class="row">
              <?php

              //  foreach ($resumen as $lineaResumen) {

                  //   $linkEdit = base_url("/usuario/?id={$lineaResumen->id}");
                  //   $linkDelete = base_url("/usuario/delete/?id={$lineaResumen->id}");
                  echo "    <h3 class='bg-primary'>{$resumen->titulo}</h3>
                            <h3 class='bg-primary'>{$resumen->accion}</h3>
                            <h3 class='bg-primary'>{$resumen->precio}</h3>
                            <h3 class='bg-primary'>{$resumen->descripcion}</h3>
                       ";
              //  }
              ?>




        </div>
        </div>

<div class="col-md-12">
  <div class="row">
    <div class="">
<form action="<?php echo base_url('Publicar/guardarRegistroPub')?>" method="post" enctype="multipart/form-data">
  <div class="text-right">
    <input type="submit" value="Upload Image" name="submit">
  </div>
      <?php

      //$this->Publicaciones_model->editar();
      $this->Publicaciones_model->imagenesEdicionPublicacion(null); ?>

</form>
    </div>

  </div>

</div>
      <div class="col-md-12">

        </div>
        <br />
</div>

</div>
</section>
<?php $this->load->view('partes/p_footer.php'); ?>
