<?php $this->load->view('partes/p_header',$titulo);?>
<?php $this->load->view('partes/p_navegacion');?>
<section>
  <div class="container">
    <div class="col-md-12 ">
      <h2 class="text-center"><?php echo $titulo; ?></h2>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <table class="table table-striped">
          	<thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Cedula</th>
                <th>T&eacute;lefono</th>
                <th>Accion</th>
              </tr>
          	</thead>
          	<tbody>
              <?php
                foreach ($usuarios as $usuario) {
                echo "<tr>
                        <td>{$usuario->idusuario}</td>
                        <td>{$usuario->nombre} {$usuario->apellido}</td>
                        <td>{$usuario->correo}</td>
                        <td>{$usuario->cedula}</td>
                        <td>{$usuario->telefono}</td>

                      </tr>";
                }

               ?>
          	</tbody>
          </table>
      </div>
        <div class="col-md-6">
          <form class="form-horizontal" action="" method="post">
            <div class="form-group">
              <input type="text" name="" value="" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="" value="" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="" value="" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="" value="" class="form-control">
            </div>
            <div class="">
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('partes/p_footer');?>
