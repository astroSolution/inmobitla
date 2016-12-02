<?php $this->load->view('partes/p_header'); ?>
<?php $this->load->view('partes/p_navegacion'); ?>
<?php $this->load->view('partes/p_visor'); ?>

<section>
  <div class="container">
    <div class="col-md-12">
      <h2>Publicaciones recientes</h2>
      <hr>
      <?php
        foreach ($publicaciones as $v) {
      ?>
      <div class="col-md-3" >
        <div class="pub thumbnail imagenPublicacion">
          <img src="<?php echo base_url('upload/').$v->idpublicacion."_1.png";?>" class="img-responsive">
            <div class="info">
                <h4><a href="<?php echo base_url('publicacion/ver/'.$v->idpublicacion.'/'.urls_amigables($v->titulo)); ?>"><?php echo $v->titulo; ?></a>
                </h4>
                <h5><?php echo $v->accion;?></h5>
                <h4 class="text-success">RD$<?php echo $v->precio; ?></h4>
            </div>
        </div>
      </div>
      <?php } ?>
<div class="col-md-12">
    <?php echo $this->pagination->create_links() ?>
</div>

    </div>

  </div>
</section>
<script type="text/javascript" src="<?php echo base_url('public/visorjs/wowslider.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/visorjs/script.js')?>"></script>
<?php $this->load->view('partes/p_footer'); ?>
