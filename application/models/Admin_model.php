<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  //manejador de tipos y acciones
  function manejaTipos($tabla,$datos) {
    $id = $datos['id'];
    if($id+0 > 0) {
      $this->db->where('id',$id);
      unset($datos['id']);
      $this->db->update($tabla, $datos);
    }else{
        $this->db->insert($tabla,$datos);
    }
  }
  //carga tipo para editar
  function cargaTa($tabla,$id=0){
    $resutado="";
    if($id+0 > 0) {
      $this->db->where('id',$id);
      $query = $this->db->get($tabla);
      $rs = $query->result();
      if(count($rs) > 0){
        $resutado = $rs[0];
      }
    }else{
        $resutado = $this->db->get($tabla);
        $resutado=$resutado->result();
    }
    return $resutado;
  }
}
