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
          <img src="<?php echo base_url('upload/').$v->idpublicacion."_1.png";?>" alt="">
          <div class="info">
              <h4><a href="<?php echo base_url('publicacion/ver/'.$v->idpublicacion.'/'.urls_amigables($v->titulo)); ?>"><?php echo $v->titulo; ?></a>
              </h4>
              <h5><?php echo ($v->accion=='V') ? 'Venta' : 'Alquiler'; ?></h5>
              <h4 class="text-success">RD$<?php echo $v->precio; ?></h4>
          </div>
          <div>
            <a href="<?php echo base_url('MisPublicaciones/'.$estatusf.'?id='.$v->idpublicacion);?>" name="button" class="btn btn-default btn-xs"><?=$estatus;?></a>
            <a href="<?php echo base_url('publicacion?id='.$v->idpublicacion);?>" name="button" class="btn btn-default btn-xs">editar</a>
          </div>
      </div>
    </div>
    <?php } ?>

  </div>
</section>
<?php $this->load->view('partes/p_footer'); ?>
