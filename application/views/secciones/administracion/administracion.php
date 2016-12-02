<?php $this->load->view('partes/p_header',$titulo);?>
<?php $this->load->view('partes/p_navegacion');?>
<style media="screen">
  .bloque{
    height: 180px;
border: 1px solid #fff;
margin: 10px 0 10px 0;
box-shadow: 1px 2px 3px 2px #bbb;
text-align: center;

  }
  .bloque h1,h2{
    color: #fff;
  }
  .bloque h1{
    font-size: 60px;

  }
  .bloque a{
    text-decoration: none;
  }
</style>
<section>
  <div class="container">
    <div class="col-md-12 ">
      <div class="col-md-3">
        <div class="bloque btn-warning">
          <a href="<?php echo base_url('s_admin/admin_usuario') ?>">
            <h1 class="glyphicon glyphicon-user"></h1>
            <h2>Administracion Usuarios</h2>
            </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="bloque btn-success">
          <a href="<?php echo base_url('s_admin/admin_publicaciones') ?>">
            <h1 class="glyphicon glyphicon-file"></h1>
            <h2>Administracion Publicaciones</h2>
            </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="bloque btn-info">
          <a href="<?php echo base_url('s_admin/admin_ta?tipo=accion') ?>">
            <h1 class="glyphicon glyphicon-leaf"></h1>
            <h2>Administracion Accion</h2>
            </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="bloque btn-danger">
          <a href="<?php echo base_url('s_admin/admin_ta?tipo=tipo') ?>">
            <h1 class="glyphicon glyphicon-asterisk"></h1>
            <h2>Administracion Tipo</h2>
            </a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('partes/p_footer');?>
