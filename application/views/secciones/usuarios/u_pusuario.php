<?php
$titulo="Panel Usuario";
$this->load->view('partes/p_header', $titulo);
 $this->load->view('partes/p_navegacion');

 ?>
<style media="screen">
  .pub{
    background: #fff;
  }
</style>
<section>
  <div class="container">
    <h2>Publicaciones de <a href="<?php echo base_url('usuario/perfil');?>"><?php echo $this->session->datosusu[0]->nombre;?></a></h2>
    <?php
      foreach ($publicaciones as $v) {
        $estatus =  ($v->estatus=='A') ? "Desactivar" : "Activar";
        $estatusf = ($v->estatus=='A') ? "desactivaPub" : "activaPub";
    ?>
    <div class="col-md-3">
      <div class="pub thumbnail ">
          <img src="http://www.lesdalies.com/files/hotel/dalias-apartamentos-salou/apartamentos/familiar/salon_apartamento_familiar.jpg" alt="">
          <div class="info">
              <h4><a href="<?php echo base_url('publicacion/ver/'.urls_amigables($v->titulo).'/'.$v->idpublicacion); ?>"><?php echo $v->titulo; ?></a>
              </h4>
              <h5><?php echo ($v->accion=='V') ? 'Venta' : 'Alquiler'; ?></h5>
              <h4 class="text-success">RD$<?php echo $v->precio; ?></h4>
              <p><?php echo $v->descripcion; ?></p>
          </div>
          <div>
            <a href="<?php echo base_url('mispublicaciones/'.$estatusf.'?id='.$v->idpublicacion);?>" name="button" class="btn btn-default btn-xs"><?=$estatus;?></a>
            <a href="<?php echo base_url('mispublicaciones/editarPub/'.$v->idpublicacion);?>" name="button" class="btn btn-default btn-xs">editar</a>
          </div>
      </div>
    </div>
    <?php } ?>

  </div>
</section>
<?php $this->load->view('partes/p_footer'); ?>
