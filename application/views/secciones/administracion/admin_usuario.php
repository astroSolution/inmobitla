<?php $this->load->view('partes/p_header',$titulo);?>
<?php $this->load->view('partes/p_navegacion');?>
<section>
  <div class="container">
    <div class="col-md-12 ">
      <h2 class="text-center"><?php echo $titulo; ?></h2>
      <hr>
      <div class="row">
        <div class="col-md-12">
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
                  $eliminar = base_url('s_admin/admin_usuario/'.$usuario->idusuario);
                echo "<tr>
                        <td>{$usuario->idusuario}</td>
                        <td>{$usuario->nombre} {$usuario->apellido}</td>
                        <td>{$usuario->correo}</td>
                        <td>{$usuario->cedula}</td>
                        <td>{$usuario->telefono}</td>
                        <td><a class=\"btn btn-danger\" href=\"{$eliminar}\"><i class=\"glyphicon glyphicon-trash\"></i></td>
                      </tr>";
                }

               ?>
          	</tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('partes/p_footer');?>
