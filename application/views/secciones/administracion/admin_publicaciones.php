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
                <th>Titulo</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Tipo</th>
                <th>Localizacion</th>
                <th>IDUsuario</th>
                <th>Accion</th>
              </tr>
          	</thead>
          	<tbody>
              <?php
                foreach ($publicaciones as $publicacion) {
                  $eliminar = base_url('s_admin/admin_publicaciones?id='.$publicacion->idpublicacion);
                echo "<tr>
                        <td>{$publicacion->idpublicacion}</td>
                        <td>{$publicacion->titulo}</td>
                        <td>{$publicacion->precio}</td>
                        <td>{$publicacion->tipo}</td>
                        <td>{$publicacion->accion}</td>
                        <td>{$publicacion->ltn} {$publicacion->lgt}</td>
                        <td>{$publicacion->idusuario}</td>
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
