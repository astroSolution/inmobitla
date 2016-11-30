<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S_admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model(array('Publicaciones_model','Usuario_model'));
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['titulo'] = "Panel Administracion";
    if($this->Usuario_model->verificalogin()){
       print "<script>alert('Favor Hacer Login'); window.location.href = \"/inmobitla/seguridad/login/s_admin\";</script>";
     }
     $this->load->view('secciones/administracion/administracion', $data);
  }

}
