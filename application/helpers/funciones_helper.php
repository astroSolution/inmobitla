<?php
/*
** JOSE GABRIEL ESCOBOSO
** AstroSolucion **
## Documento de funciones
*/
function urls_amigables($url) {
  // Tranformamos todo a minusculas
  $url = strtolower($url);
  //Rememplazamos caracteres especiales latinos
  $buscar = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
  $cambiar = array('a', 'e', 'i', 'o', 'u', 'n');
  $url = str_replace ($buscar, $cambiar, $url);
  // Añaadimos los guiones
  $buscar = array(' ', '&', '\r\n', '\n', '+');
  $url = str_replace ($buscar, '-', $url);
  // Eliminamos y Reemplazamos demás caracteres especiales
  $buscar = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
  $cambiar = array('', '-', '');
  $url = preg_replace ($buscar, $cambiar, $url);
  return $url;
}
