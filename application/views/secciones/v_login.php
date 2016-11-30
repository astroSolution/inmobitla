<?php $this->load->view('partes/p_header');?>
<?php $this->load->view('partes/p_navegacion');?>
<section id="login">
  <div class="container">
      <div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" action="<?php echo base_url('Seguridad/login');?>" method="post">
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="usuario" class="form-control"/>
      </div>
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
        <input type="password" name="contrasena" class="form-control"/>
      </div>
      <div class="form-group">
        <button class="btn btn-success" type="submit">Loguear</button>
        <a class="btn btn-success" href="<?php echo base_url('usuario/registro');?>">Registrarme</a>
      </div>
    </form>
  </div>
  </div>
</section>
<?php $this->load->view('partes/p_footer');?>
