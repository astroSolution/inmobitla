<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('funciones'));
    $this->load->model(array('Publicaciones_model','Usuario_model'));
  }

  function index()
  {
    // if($this->Usuario_model->verificalogin()){
    //   print "<script>alert('Favor Hacer Login'); window.location.href = \"/inmobiitla/Seguridad\";</script>";
    // }
    $this->Usuario_model->verificalogin();
    //Aqui le seteo el titulo, a la ventana
    $data = array();
    $id=0;
    if (isset($_GET['id'])) {
      $id = $_GET['id']+0;
    }
    $data['tipo'] = $this->Publicaciones_model->cargarSelect();
    //$data['publicacionid'] = $this->Publicaciones_model->cargarPublicacion($id);
    //agregue el editar
    $data['datosPub'] = $this->Publicaciones_model->cargarPublicacion($id);

    $data['titulo'] = "Publicar";
    $this->load->view('secciones/publicacion/v_publicar',$data);
  }
  function cargaFotoDragDrop()
  {
    //$idPub = $_POST['idpublicacion'];
    $this->Publicaciones_model->ponerImagenes();
  }
  // function cargaFotoPublicacion()
  // {
  //   $this->Publicaciones_model->presentarImagenesPublicacion();
  // }
  function guardarRegistroPub()
  {
    if ($_POST) {
      $this->Publicaciones_model->guardarRegistroPubBD($_POST);
    }

    $data['titulo'] = "Publicar";
    //$id = $this->Publicaciones_model->ultimoId();
    //$data['resumen'] = $this->Publicaciones_model->cargarPublicacion($id);
    //$data['img'] = $this->Publicaciones_model->presentarImagenesPublicacion();
    $this->Usuario_model->verificalogin();
    $data['publicaciones'] = $this->Publicaciones_model->obtenerPubs($this->session->datosusu[0]->idusuario);
    $this->load->view('secciones/usuarios/u_pusuario',$data);
  }

  function listar($id,$titulo){
    if($id=="fincas"){
      print "<script>alert('Fincas'); window.location.href = \"/inmobiitla/\";</script>";
    }
    if($id=="casas"){
      print "<script>alert('Casas'); window.location.href = \"/inmobiitla/\";</script>";
    }
    if($id=="apartamentos"){
      print "<script>alert('Apartamentos'); window.location.href = \"/inmobiitla/\";</script>";
    }
  }
  function ver($id,$titulo){
    $data['publicacion'] = $this->Publicaciones_model->cargaPub($id);
    $data['titulo'] = $data['publicacion'][0]->titulo;
    if($data['publicacion'][0]->estatus =='D' ){
      print "<script>alert('Publicacion Desactivada'); window.location.href = \"/inmobiitla/\";</script>";
    }else{
      $this->load->view('secciones/publicacion/detalle', $data);
    }
  }
  function mapa()
  {
    $data['localizacion']=$this->Publicaciones_model->obtenerPubs();
    $this->load->view('secciones/publicacion/mapa',$data);
  }
}
