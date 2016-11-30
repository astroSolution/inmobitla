<?php
 $this->load->view('partes/p_header', $titulo);?>
 <style media="screen">
   .lista span{
     display: block;
   }
 </style>
<section id="completado">
  <div class="container">
    <div class="col-md-3 col-md-offset-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Resumen de Registro</h3>
        </div>
        <div class="panel-body lista">

              <span>Usuario para login: <b><?php echo $this->session->usuario->usuario;?></b></span>

              <span>Nombre: <b><?php echo $this->session->usuario->nombre." ".$this->session->usuario->apellido;?></b></span>

              <span>Tel&eacute;fono: <b><?php echo $this->session->usuario->telefono;?></b></span>

              <span>Correo: <b><?php echo $this->session->usuario->correo;?></b></span>

        </div>
      </div>
    </div>
  </div>
</section>
