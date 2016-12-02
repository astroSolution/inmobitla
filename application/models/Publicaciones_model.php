<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicaciones_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function obtenerPubs($idusu='')
  {
    if($idusu!=''){
      $this->db->where('idusuario',$idusu);
      $query= $this->db->get('publicacion');
      return $query->result();
    }else{
      $query =  $this->db->query("SELECT p.idpublicacion,p.titulo, p.direccion, p.precio, p.descripcion, p.ltn, p.lgt, p.idusuario,p.estatus,p.LTN,p.LGT, a.nombre as accion, t.nombre as tipo  FROM PUBLICACION p
        INNER JOIN TIPO t ON p.tipo = t.id
        INNER JOIN ACCION a ON p.accion = a.id
        WHERE IDUSUARIO in (SELECT IDUSUARIO FROM USUARIO WHERE ESTATUS = 'A') AND ESTATUS = 'A'");
      return $query->result();
    }
  }
  function cargaPub($idpub){
    $this->db->where('idpublicacion',$idpub);
    $publicacion = $this->db->get('publicacion');
    // var_dump($publicacion  ->result());
    return $publicacion->result();
  }
  function desactivaPub($idpub) {
    if($idpub!=''){

      $this->db->where('idpublicacion',$idpub);
      $x= array("estatus"=>"D");
      $this->db->update('publicacion',$x);
      return 1;
    }
  }
  function activaPub($idpub) {
    if($idpub!=''){

      $this->db->where('idpublicacion',$idpub);
      $x= array("estatus"=>"A");
      $this->db->update('publicacion',$x);
      return 1;
    }
  }
  function verificaPublicacion($usuario,$id){
  $query =   $this->db->query("SELECT * FROM publicacion where idpublicacion={$id} AND idusuario={$usuario}");
    $rs= $query->result();
    if(count($rs) > 0){
      return true;
    }

  }
  function filas()
	{
    $query =  $this->db->query("SELECT p.idpublicacion,p.titulo, p.direccion, p.precio, p.descripcion, p.ltn, p.lgt, p.idusuario,p.estatus,p.LTN,p.LGT, a.nombre as accion, t.nombre as tipo  FROM PUBLICACION p
      INNER JOIN TIPO t ON p.tipo = t.id
      INNER JOIN ACCION a ON p.accion = a.id
      WHERE IDUSUARIO in (SELECT IDUSUARIO FROM USUARIO WHERE ESTATUS = 'A') AND ESTATUS = 'A'");
		return  $query->num_rows() ;
	}

    //obtenemos todas las provincias a paginar con la función
    //total_posts_paginados pasando la cantidad por página y el segmento
    //como parámetros de la misma
	function total_paginados($por_pagina,$segmento)
        {
          $consulta =  $this->db->query("SELECT p.idpublicacion,p.titulo, p.direccion, p.precio, p.descripcion, p.ltn, p.lgt, p.idusuario,p.estatus,p.LTN,p.LGT, a.nombre as accion, t.nombre as tipo  FROM PUBLICACION p
            INNER JOIN TIPO t ON p.tipo = t.id
            INNER JOIN ACCION a ON p.accion = a.id
            WHERE IDUSUARIO in (SELECT IDUSUARIO FROM USUARIO WHERE ESTATUS = 'A') AND ESTATUS = 'A' limit {$por_pagina} {$segmento}");
          //  $consulta = $this->db->get('publicacion',$por_pagina,$segmento);

            if($consulta->num_rows()>0)
            {
                foreach($consulta->result() as $fila)
              		{
              		    $data[] = $fila;
              		}
                    return $data;
            }
	}

  //----------------------------------------------------------
function cargarSelect($tipo)
{
  $query = $this->db->get($tipo);

      $rs = $query->result();

return $rs;
}

  // function cargarPublicacion($id)
  // {
  //   $publicacion = new stdclass();
  //   $publicacion->idpublicacion = 0;
  //   $publicacion->titulo = "";
  //   $publicacion->direccion = "";
  //   $publicacion->tipo = "";
  //   $publicacion->precio = 0;
  //   $publicacion->accion = "";
  //   $publicacion->descripcion = "";
  //   $publicacion->LTN = 0;
  //   $publicacion->LGT = 0;
  //
  //
  //
  //   //$id = $this->Publicaciones_model->ultimoId();
  //   $query = $this->db->where('idpublicacion=',$id);
  //   $query = $this->db->get('publicacion');
  //
  //   $rs = $query->result();
  //   if(count($rs) > 0){
  //     $publicacion = $rs[0];
  //   }
  //
  //   return $publicacion;
  // }

  function guardarRegistroPubBD($publicacion)
  {
    $id = $publicacion['idpublicacion'];
    if ($id+0 > 0) {
      $this->db->where('idpublicacion=',$id);
      unset($publicacion['idpublicacion']);
      $this->db->update('publicacion',$publicacion);
    }else{

    $this->db->insert('publicacion', $publicacion);
    }
  //var_dump($publicacion);
  //$this->db->insert('usuario', $usuario);
  }
  function ultimoId()
  {
    $query = $this->db->query('SELECT max(idpublicacion) as id FROM publicacion');
    $v = $query->row();
    $id = $v->id;
  return $id;
  }
// Lo comente para evitar errores
  // function editar1()
  // {
  // $nombreAnt ="123.png";
  // $nombreFile =$_FILES;
  // // var_dump($nombreFile);
  // $target_dir = "upload/";
  // $target_file = $target_dir . basename($nombreAnt);
  // $uploadOk = 1;
  // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // // Check if image file is a actual image or fake image
  // if(isset($_POST["submit"])) {
  //   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  //   if($check !== false) {
  //     echo "File is an image - " . $check["mime"] . ".";
  //     $uploadOk = 1;
  //   } else {
  //     echo "File is not an image.";
  //     $uploadOk = 0;
  //   }
  // }
  // //Check if file already exists
  // if (file_exists($target_file)) {
  //   echo "Sorry, file already exists.";
  //   $uploadOk = 0;
  // }
  // // Check file size
  // if ($_FILES["fileToUpload"]["size"] > 500000) {
  //   echo "Sorry, your file is too large.";
  //   $uploadOk = 0;
  // }
  // // Allow certain file formats
  // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  // && $imageFileType != "gif" ) {
  //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  //   $uploadOk = 0;
  // }
  // // Check if $uploadOk is set to 0 by an error
  // if ($uploadOk == 0) {
  //   echo "Sorry, your file was not uploaded.";
  //   // if everything is ok, try to upload file
  // } else {
  //   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  //     echo "The file ". basename( $nombreAnt). " has been uploaded.";
  //   } else {
  //     echo "Sorry, there was an error uploading your file.";
  //   }
  // }
  // }

  function imagenesEdicionPublicacion($idPP)
  {

    //--------------------------------------------------------------------------------------------------------------------

    $id=$idPP;
      $directory=('upload/');
      $dirint = dir($directory);
   if ($idPP == null) {
      $id = $this->ultimoId();
  }

      while(($archivo = $dirint->read()) !== false)
      {
        $str = $archivo;
        $caracteres = preg_split('/_/', $str, -1, PREG_SPLIT_NO_EMPTY);
        // var_dump($caracteres);
      // $items = (string)$id;
        // var_dump($items);
        if ($caracteres['0'] === $id){
          $imagen = $id.'_'.$caracteres['1'];
          $fotos[] = $imagen;
          // var_dump($imagen);
          // var_dump($fotos);
           echo '<div class="col-md-6" style="width:20%;"><img src="upload/'.$imagen.'" class="img-responsive img-thumbnail" />
             <input class="" type="file"  name="fileToUpload" id="fileToUpload">
           </div>'."\n";
        }
      }
      $dirint->close();
  }

  function presentarImagenesPublicacion($idPP)
  {
    //agregue esto para filtrar por publicacion en el editar asi aparescan sus img
    $id=$idPP;
      $directory=('upload/');
      $dirint = dir($directory);
  if ($idPP == null) {
    $id = $this->ultimoId();
  }

      while(($archivo = $dirint->read()) !== false)
      {
        $str = $archivo;
        $caracteres = preg_split('/_/', $str, -1, PREG_SPLIT_NO_EMPTY);
        // var_dump($caracteres);
      // $items = (string)$id;
        // var_dump($items);
        if ($caracteres['0'] === $id){
          $imagen = $id.'_'.$caracteres['1'];
          // var_dump($imagen);
           echo '<div class="col-md-6" style="width:20%;"><img src="/inmobitla/upload/'.$imagen.'" class="img-responsive img-thumbnail" /></div>'."\n";
        }
      }
      $dirint->close();
  }
function generarHTMLVisorImagenes($idPub)
{
  //agregue esto para filtrar por publicacion en el editar asi aparescan sus img
    $id=$idPub;
    $imagenNumero = 0;
    $directory=('upload/');
    $dirint = dir($directory);

if ($idPub == null) {
  $id = $this->ultimoId();
}

    while(($archivo = $dirint->read()) !== false)
    {
      $str = $archivo;
      $caracteres = preg_split('/_/', $str, -1, PREG_SPLIT_NO_EMPTY);
      // var_dump($caracteres);
    // $items = (string)$id;
      // var_dump($items);
      if ($caracteres['0'] === $id){
        $imagen = $id.'_'.$caracteres['1'];
        //  var_dump($imagenNumero);

          $cls = ($imagenNumero==0) ? "active item" : "item";

          echo '<div class="'.$cls.'" data-slide-number="'.$imagenNumero.'">
          <img src="/inmobitla/upload/'.$imagen.'"></div>';
          $imagenNumero = $imagenNumero + 1;

      }
    }
    $dirint->close();
}

  function generarHTMLVisorImagenesParte2($idPub)
  {
    //agregue esto para filtrar por publicacion en el editar asi aparescan sus img
      $id=$idPub;
      $imagenNumero = 0;
      $directory=('upload/');
      $dirint = dir($directory);

  if ($idPub == null) {
    $id = $this->ultimoId();
  }

      while(($archivo = $dirint->read()) !== false)
      {
        $str = $archivo;
        $caracteres = preg_split('/_/', $str, -1, PREG_SPLIT_NO_EMPTY);
        // var_dump($caracteres);
      // $items = (string)$id;
        // var_dump($items);
        if ($caracteres['0'] === $id){
          $imagen = $id.'_'.$caracteres['1'];
          //  var_dump($imagenNumero);

            $cls = ($imagenNumero==0) ? "active item" : "item";

            echo '<li class="col-sm-3">
            <a class="thumbnail" id="carousel-selector-'.$imagenNumero.'"><img src="/inmobitla/upload/'.$imagen.'"></a>
            </li>';
            $imagenNumero = $imagenNumero + 1;

        }
      }
      $dirint->close();
  }

  function ponerImagenes()
  {
    //upload.php
    //echo 'done';
    $query = $this->db->query('SELECT max(idpublicacion) as id FROM publicacion');
    $v = $query->row();
    $id = $v->id+1;
    $output = '';
    $a= 0;
    $errores = '';

    $x = ".png";
    if( isset($_FILES['file']['name'][0]) )
    {
      foreach($_FILES['file']['name'] as $keys => $values)
      {
        $a = $a+1;
        $values =  $id."_".$a.$x;
          if ($keys<=9) {
            // var_dump($a);
        if(move_uploaded_file($_FILES['file']['tmp_name'][$keys], 'upload/'.$values))
        {
          //var_dump($values);
          $output .= '<div class="col-md-3" style="width:150px;"><img src="../upload/'.$values.'" class="img-responsive img-thumbnail" /></div>';
          }
      }/*else{
            //$errores .= $keys.", ";

      }*/
      //echo "<script>alert('Limite de 10 imagenes, demas imagenes seran eliminadas');</script>";
      }
    }
    echo $output;
  }


}
