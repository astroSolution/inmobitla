<?php $this->load->view('partes/p_header');?>
<?php $this->load->view('partes/p_navegacion');?>
<section id="detalle">
  <div class="container">
    <h2><?php echo $publicacion[0]->titulo; ?></h2>
    <hr>
    <div class="col-md-9 infopublicacion">
      <div class="col-md-12">
        <img src="<?php echo base_url('public/imagenes/img.jpg'); ?>" class="img-responsive">
      </div>
      <div class="col-md-12">

         <div class="panel-body mbl">
            <div class="param-table">
                <div class="param-table-row">
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato1</span><strong>Dato</strong>
                  </div>

                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato2</span><strong>Dato</strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato3</span><strong>Dato</strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato4</span><strong>Dato</strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato5</span><strong>Dato</strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato6</span><strong>Dato</strong>
                  </div>
                  </div>
                  <div class="param-table-row">
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato</span><strong>Dato</strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato</span><strong>Dato</strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato</span><strong>Dato</strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato</span><strong>Dato</strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Dato</span><strong>Dato</strong>
                  </div>
                  <div class="param-table-column">
                      <span class="adparam_label float-left prm">Motor/CC</span><strong>1</strong>
                  </div>
                </div>
            </div>
	       </div>
      </div>
    </div>

  </div>
</section>
<?php $this->load->view('partes/p_footer');?>
