<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguridad extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Usuario_model'));
    //Codeigniter : Write Less Do More

  }

  function index()
  {


    //$this->load->view('secciones/v_login',$data);
  }
  function login($pagina="") {
      $data['titulo'] = "Iniciar sesion";
      $data['pagina'] = "/".$pagina;
      $ruta =  ($pagina=="s_admin") ? "/inmobitla/s_admin" : "/inmobitla/mispublicaciones";
      $tmp="";
        if($_POST){
          $usuario = $_POST['usuario'];
        echo   $clave = md5($_POST['contrasena']);
            $tmp = $this->Usuario_model->iniciarSesion($usuario, $clave, $pagina);
            if ($tmp !== false) {
              $this->session->datosusu = $tmp;

              print "<script type=\"text/javascript\">alert('Bienvenido {$usuario}'); window.location.href = \"$ruta\";</script>";
            }else{
              print "<script type=\"text/javascript\">alert('Usuario o contrasena incorrectos'); window.location.href = \"/inmobitla/seguridad/login/$pagina\";</script>";

            }
      }
  $this->load->view('secciones/v_login',$data);
  }
  //funcion para login de los administradores
  function salir(){
    session_destroy();
    print "<script type=\"text/javascript\">alert('Esperamos regrese pronto'); window.location.href = \"/inmobitla/\";</script>";
  }

}
