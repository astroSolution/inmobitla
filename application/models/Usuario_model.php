<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  //registra usuario
  function registraUsu($usuario) {
  $id = $usuario['idusuario'];
  if($id+0 > 0) {
    $this->db->where('idusuario=',$id);
    unset($usuario['idusuario']);
    $this->db->update('usuario',$usuario);
  }else{
      $this->db->insert('usuario',$usuario);
  }
}
//carga usuario para editar o los carga todos
function cargaUsu($id=""){
    $usuario ="";
    if($id!=""){
    $this->db->where('idusuario',$id);
    $query = $this->db->get('usuario');
    $rs = $query->result();
    if(count($rs) > 0){
      $usuario = $rs[0];
    }
  }else{
    $this->db->where('estatus','A');
      $usuario = $this->db->get('usuario');
      $usuario = $usuario->result();
    }
    return $usuario;
  }
  function eliminaUsu($id){
    $act['estatus'] = 'D';
    $this->db->where('idusuario',$id);
    $this->db->update('usuario',$act);
  }
  //optimizado para usuario y administradores
  function iniciarSesion($usr, $clv, $tabla)  {
    //para saber si es usuario o administrador
    $tabla = ($tabla=="s_admin") ? "admin" : "usuario";
    $this->db->where('usuario=',$usr);
    $this->db->where('contrasena=',$clv);
    $query = $this->db->get($tabla);

    $rs = $query->result();
    if(count($rs) > 0){
      return $rs;
    }
    $todos = $this->db->query('SELECT count(*) AS nr FROM usuario');
    $nn = $todos->result();
    return false;
  }
  //predunta si exite alguien en la session
  function verificalogin(){
    if(!isset($this->session->datosusu)){
      return true;
    }
  }

//nuevo carga publicaciones.
  function publicacionUsuActivo(){
    $query =  $this->db->query("SELECT p.idpublicacion,p.titulo, p.direccion, p.precio, p.descripcion, p.ltn, p.lgt, p.idusuario,p.estatus, a.nombre as accion, t.nombre as tipo  FROM PUBLICACION p
      INNER JOIN TIPO t ON p.tipo = t.id
      INNER JOIN ACCION a ON p.accion = a.id
      WHERE IDUSUARIO in (SELECT IDUSUARIO FROM USUARIO WHERE ESTATUS = 'A') AND ESTATUS = 'A'");
    return $query->result();
  }

}
