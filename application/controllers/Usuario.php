<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Usuario_model','Publicaciones_model'));
    $data=array();
  }

  function index()
  {
    //$this->session->usuario->idusuario='1';
  }
  function registro(){
    $data['titulo'] = "Registro";
    $this->load->view("secciones/usuarios/u_registro",$data);
  }
  function registrar(){
    if($_POST){
      $_POST['contrasena'] = md5($_POST['contrasena']);
      $usu = explode('@',$_POST['correo']);
      $_POST['usuario'] =$usu[0];
      $this->Usuario_model->registraUsu($_POST);
      //para loguear cuando se loguee ver mas adelante
      $tmp = $this->Usuario_model->iniciarSesion($usu[0], $_POST['contrasena']);
      if ($tmp !== false) {
        $this->session->datosusu = $tmp;
        print "<script type=\"text/javascript\">alert('Bienvenido ". $_POST['nombre']."'); window.location.href = \"/inmobiitla/mispublicaciones/\";</script>";
      }
    }
  }

  function modificadatos(){
    $usuario = $this->Usuario_model->cargaUsu($this->session->datosusu[0]->idusuario);
    var_dump($usuario);
  }



}
