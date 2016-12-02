<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MisPublicaciones extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model(array('Usuario_model','Publicaciones_model'));
      $this->load->helper(array('funciones'));
    //Codeigniter : Write Less Do More
    if($this->Usuario_model->verificalogin()){
      print "<script>alert('Favor Hacer Login'); window.location.href = \"/inmobitla/Seguridad/login\";</script>";
     }
  }

  function index()
  {

    $data['titulo'] = "Panel Publicaciones";
    $this->Usuario_model->verificalogin();
    $data['publicaciones'] = $this->Publicaciones_model->obtenerPubs($this->session->datosusu[0]->idusuario);
    //$data['datosPub'] = $this->Publicaciones_model->cargarPublicacion($id);
    $this->load->view('secciones/usuarios/u_pusuario',$data);
}
  function desactivaPub(){
    if(isset($_GET['id'])){
      print "<script>confirm('Seguro que desea desactivar esta publicacion?');</script>";
      $x = $this->Publicaciones_model->desactivaPub($_GET['id']);
      if($x==1){
        print "<script>confirm('Desactivada');window.location.href = \"/inmobitla/mispublicaciones/\";</script>";
      }
    }
  }
  function activaPub(){
    if(isset($_GET['id'])){
      print "<script>confirm('Se activara la publicacion');</script>";
      $x = $this->Publicaciones_model->activaPub($_GET['id']);
      if($x==1){
        print "<script>confirm('Activada');window.location.href = \"/inmobitla/mispublicaciones/\";</script>";
      }
    }else {
    print "<script>alert('Debe elegir una publicacion');window.location.href = \"/inmobitla/mispublicaciones/\";</script>";
    }
  }
  function editarPub($id){
    $data['datosPub'] = $this->Publicaciones_model->obtenerPubs($id);
    $data['tipo'] = $this->Publicaciones_model->cargarSelect("tipo");
//si el ID es menor a 1 entonces no es una edicion y el titulo y la accion se ponen en publicar
    if ($id < 1) {
      $data['titulo'] = "Publicar";
    }else{
      $data['titulo'] = "Editar";
    }

    if(isset($this->session->datosusu[0]->idusuario)){
    $ver = $this->Publicaciones_model->verificaPublicacion($this->session->datosusu[0]->idusuario,$id);
        if($ver != true){
            print "<script>alert('Esta Publicacion no es de usted');window.location.href = \"/inmobitla/mispublicaciones/\";</script>";
        }
    }else{
      print "<script>alert('Debe realizar login para editar');window.location.href = \"/inmobitla/mispublicaciones/\";</script>";
    }
    $this->load->view('secciones/publicacion/v_publicar',$data);

  }
}
