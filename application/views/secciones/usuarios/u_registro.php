<?php $this->load->view('partes/p_header', $titulo);?>
<section id="registro">
  <div class="container">
    <div class="col-md-6 col-md-offset-3">
      <h2 class="text-center">Registro</h2>
      <hr>
    <form class="form-horizontal" action="<?php echo base_url('Usuario/registrar');?>" method="post">
      <input type="hidden" name="idusuario" value="<?php echo (isset($this->session->usuario->idusuario) ? $this->session->usuario->idusuario : ""); ?>">
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
        <input type="text" name="cedula"  placeholder="Cedula" required class="form-control" value="<?php echo (isset($this->session->usuario->cedula) ? $this->session->usuario->cedula : ""); ?>" <?php echo (isset($this->session->usuario->cedula) ? "readonly" : ""); ?>/>
      </div>
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input type="email" name="correo" placeholder="Correo" data-container="body"  data-toggle="popover" data-trigger="focus" title="Informacion" data-content="Utilizamos los caracteres que estan antes de la @ para crear su nombre de usuario, esto har&aacute; que pueda hacer login solo con la parte antes de la @." required class="form-control" value="<?php echo (isset($this->session->usuario->correo) ? $this->session->usuario->correo : ""); ?>" <?php echo (isset($this->session->usuario->correo) ? "readonly" : ""); ?>/>
      </div>
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="nombre" placeholder="Nombres" required class="form-control" value="<?php echo (isset($this->session->usuario->nombre) ? $this->session->usuario->nombre : ""); ?>"/>
      </div>
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="apellido"  placeholder="Apellido" required class="form-control" value="<?php echo (isset($this->session->usuario->apellido) ? $this->session->usuario->apellido : ""); ?>"/>
      </div>
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
        <input type="number" name="telefono" min="0" max="9999999999" placeholder="Tel&eacute;fono" required class="form-control" value="<?php echo (isset($this->session->usuario->telefono) ? $this->session->usuario->telefono : ""); ?>"/>
      </div>
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input type="number" name="celular" min="0" max="9999999999" placeholder="Celular" class="form-control" value="<?php echo (isset($this->session->usuario->celular) ? $this->session->usuario->celular : ""); ?>"/>
      </div>
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-print"></i></span>
        <input type="number" name="fax" placeholder="Fax" min="0" max="9999999999"  class="form-control" value="<?php echo (isset($this->session->usuario->fax) ? $this->session->usuario->fax : ""); ?>"/>
      </div>
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
        <input type="password" name="contrasena" required <?php echo (isset($this->session->usuario->contrasena) ? "placeholder=\"Agregar contrase&ntilde;a actual o una nueva contrase&ntilde;a\"" : "placeholder=\"Contrase&ntilde;a\""); ?>    class="form-control"/>
      </div>
      <div class="form-group input-group">
        <span class="input-group input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
        <textarea type="text" name="mas_informacion" placeholder="Informaci&oacute;n" class="form-control"><?php echo (isset($this->session->usuario->mas_informacion) ? $this->session->usuario->mas_informacion : ""); ?></textarea>
      </div>
      <div class="form-group input-group">
        <button type="submit" class="btn btn-success">Continuar<i class="glyphicon glyphicon-chevron-right"></i></button>
      </div>
    </form>
    </div>
  </div>
</section>
