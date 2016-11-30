<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->helper(array('funciones'));
    $this->load->model(array('Publicaciones_model'));
  }

  function index()
  {
    $data['title'] = 'Paginacion_ci';
		$pages=12; //Número de registros mostrados por páginas
		$this->load->library('pagination'); //Cargamos la librería de paginación
		$config['base_url'] = base_url().'inicio/pagina/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
		$config['total_rows'] = $this->Publicaciones_model->filas();//calcula el número de filas
		$config['per_page'] = $pages; //Número de registros mostrados por páginas
    $config['num_links'] = 5; //Número de links mostrados en la paginación
 		$config['first_link'] = 'Primera';//primer link
		$config['last_link'] = 'Última';//último link
    $config["uri_segment"] = 3;//el segmento de la paginación
		$config['next_link'] = 'Siguiente';//siguiente link
		$config['prev_link'] = 'Anterior';//anterior link
		$this->pagination->initialize($config); //inicializamos la paginación
		$data["publicaciones"] = $this->Publicaciones_model->total_paginados($config['per_page'],$this->uri->segment(3));
    $this->load->view('secciones/v_principal', $data);
  }


}
