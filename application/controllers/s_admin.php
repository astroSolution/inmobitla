<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S_admin extends CI_Controller{

  public function __construct()
  {

    parent::__construct();
      $this->load->model(array('Publicaciones_model','Usuario_model','Admin_model'));
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

  function admin_usuario(){

    if(isset($_GET['id'])){

      $this->Usuario_model->eliminaUsu($_GET['id']);

    }
    $data['titulo'] = "Aministracion de Usuario";
    $data['usuarios'] = $this->Usuario_model->cargaUsu();
    $this->load->view('secciones/administracion/admin_usuario',$data);
  }

  function admin_publicaciones(){
    if(isset($_GET['id'])){
      $this->Publicaciones_model->desactivaPub($_GET['id']);
    }
    $data['titulo'] = "Administracion de Publicaciones";
    $data['publicaciones'] = $this->Usuario_model->publicacionUsuActivo();
    $this->load->view('secciones/administracion/admin_publicaciones',$data);
  }

  function admin_ta(){

    $data['tipo'] = (isset($_GET['tipo'])? $_GET['tipo']:"");
    $data['titulo'] = "Administrador de {$_GET['tipo']}";
    $id= (isset($_GET['id'])? $_GET['id']:"");
    if((isset($_GET['tipo'])) && (isset($_GET['id']))){
      $data['datoC']=$this->Admin_model->cargaTa($data['tipo'],$id);
    }else if(isset($_GET['tipo'])){
      $data['datos']=$this->Admin_model->cargaTa($data['tipo']);
    }elseif(!(isset($_GET['tipo']))){
      print "<script>window.location.href = \"/inmobitla/s_admin\";</script>";
    }
    $data['datos']=$this->Admin_model->cargaTa($data['tipo']);
    $this->load->view('secciones/administracion/admin_ta',$data);
}
function guardar_ta($tipo)
{
  if($_POST){
    $this->Admin_model->manejaTipos($tipo,$_POST);
     print "<script>alert('Guardado Correctamente!'); window.location.href = \"/inmobitla/s_admin/admin_ta?tipo={$tipo}\";</script>";
  }
}
}
