<?php $this->load->view('partes/p_header',$titulo);?>
<?php $this->load->view('partes/p_navegacion');?>
<section>
  <div class="container">
    <div class="col-md-12 ">
      <h2 class="text-center"><?php echo $titulo; ?></h2>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <table class="table table-bordered">
          	<thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Accion</th>
              </tr>
          	</thead>
          	<tbody>
              <?php
                foreach ($datos as $dato) {
                  $editar = base_url('s_admin/admin_ta/editar?id='.$dato->id.'&tipo='.$_GET['tipo']);
                echo "<tr>
                        <td>{$dato->id}</td>
                        <td>{$dato->nombre}</td>
                        <td><a class=\"btn btn-warning btn-xs\" href='{$editar}'>Editar</a></td>
                      </tr>";
                }

               ?>
          	</tbody>
          </table>
      </div>
      <div class="col-md-6">

        <form class="form-horizontal" action="<?php echo base_url('s_admin/guardar_ta/'.$tipo); ?>" method="post">
          <div class="form-group">
            <input type="text" name="id" readonly value="<?php echo (isset($datoC->id) ? $datoC->id : ""); ?>" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="nombre" value="<?php echo (isset($datoC->nombre) ? $datoC->nombre : ""); ?>" class="form-control">
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
