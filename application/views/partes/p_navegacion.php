<?php $tipo= ($this->Publicaciones_model->cargarSelect('tipo')); ?>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('upload/logo.png'); ?>" class="img-responsive" style="
    width: 105px;
    height: 24px;
"/></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tipo <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php
              foreach ($tipo as $value) {$url=base_url('publicacion/listar/').$value->id.'/'.$value->nombre;?>

              <li><a href="<?php echo $url; ?>"><?php echo $value->nombre;?></a></li>
          <?php    }
           ?>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" action="">
        <a href="<?php echo base_url('publicacion/mapa'); ?>" class="btn btn-default">Ver Modo Mapa</a>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('/Publicacion/');?>">Publicar</a></li>
        <?php if(isset($this->session->datosusu)) {?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi Cuenta<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('MisPublicaciones');?>">Mis Publicaciones</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('seguridad/salir');?>">Salir</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
