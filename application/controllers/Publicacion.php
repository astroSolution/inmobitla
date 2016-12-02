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
    if($this->Usuario_model->verificalogin()){
      print "<script>alert('Favor Hacer Login'); window.location.href = \"/inmobitla/seguridad/login\";</script>";
     }

    //Aqui le seteo el titulo, a la ventana
    $data = array();
    //verifica si existe el id para editar publicacion
    if (isset($_GET['id'])) {

      //verificacion de publicacion para saber si pertenece al usuario logueado
      if(isset($this->session->datosusu[0]->idusuario)){
          $ver = $this->Publicaciones_model->verificaPublicacion($this->session->datosusu[0]->idusuario,$_GET['id']);
          if($ver != true){
              print "<script>alert('Esta Publicacion no es de usted');window.location.href = \"/inmobitla/MisPublicaciones/\";</script>";
          }
      }else{
        print "<script>alert('Debe realizar login para editar');window.location.href = \"/inmobitla/seguridad/login\";</script>";
      }
        $data['datosPub'] = $this->Publicaciones_model->cargaPub($_GET['id']);
    }
    $data['tipo'] = $this->Publicaciones_model->cargarSelect('tipo');
    $data['accion'] = $this->Publicaciones_model->cargarSelect('accion');


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

  function listar($id,$nombre){
    $data['publicaciones'] = $this->Publicaciones_model->filtro($id);
    $data['nopaginacion'] = true;
    $this->load->view('secciones/v_principal', $data);
  }
//Corregi esta funfion para arreglar el ver :D
  function ver($id,$titulo){
    $data['publicacion'] = $this->Publicaciones_model->cargaPub($id);

    $data['lineUsu'] = $this->Usuario_model->cargaUsu($data['publicacion'][0]->idusuario);
    // var_dump($data['publicacion']);

    $data['titulo'] = $data['publicacion'][0]->titulo;

//-----------
    if($data['publicacion'][0]->estatus =='D' ){
      print "<script>alert('Publicacion Desactivada'); window.location.href = \"/inmobitla/\";</script>";
    }else{


      $this->load->view('secciones/publicacion/detalle', $data);
    }
//-----------



  }

  function mapa()
  {
    $data['localizacion']=$this->Publicaciones_model->obtenerPubs();
    $this->load->view('secciones/publicacion/mapa',$data);
  }
}
