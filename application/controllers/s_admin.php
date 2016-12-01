<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S_admin extends CI_Controller{

  public function __construct()
  {

    parent::__construct();
      $this->load->model(array('Publicaciones_model','Usuario_model'));
      if($this->Usuario_model->verificalogin()){
         print "<script>alert('Favor Hacer Login'); window.location.href = \"/inmobitla/seguridad/login/s_admin\";</script>";
       }elseif(!isset($this->session->datosusu[0]->nivel)){
          print "<script>alert('Debe ser adminisitrador para usar esta herramienta'); window.location.href = \"/inmobitla\";</script>";
       }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['titulo'] = "Panel Administracion";

     $this->load->view('secciones/administracion/administracion', $data);
  }

  function admin_usuario($id=0){
    if($id!=0){
      $this->Usuario_model->eliminaUsu($id);
    }
    $data['titulo'] = "Aministracion de Usuario";
    $data['usuarios'] = $this->Usuario_model->cargaUsu();
    $this->load->view('secciones/administracion/admin_usuario',$data);
  }

  function admin_publicaciones($id=0){
    if($id!=0){
      $this->Publicaciones_model->desactivaPub($id);
    }
    $data['titulo'] = "Administracion de Publicaciones";
    $data['publicaciones'] = $this->Usuario_model->publicacionUsuActivo();
    $this->load->view('secciones/administracion/admin_publicaciones',$data);
  }

  function admin_tipos($id=0){
    $data['titulo'] = "Administrador de Tipos";
    if($id!=0){
      $data['tipo']=$this->Publicaciones_model->cargaTipos($id);
    }else{
      $data['tipos'] = $this->Publicaciones_model->cargaTipos();
    }
    $this->load->view('secciones/administracion/admin_tipos',$data);
  }

}
