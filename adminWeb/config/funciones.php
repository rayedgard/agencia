

<?php
//esta función genera codigo aleatorio, se usa para agenerar las contraseñas de los usuarios de un sistema 
 function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}


//esta funsion encripta una cadena de caracteres para el tema de seguridad
function encripta($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
   //return str_replace(array('+', '/', '='), array('-', '_', ''), base64_encode($result));
}


//esta funsion desencripta una cadena de caracteres para la comparacion de cadenas
function desencripta($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}

function encripta2($data,$key)
{
   $algorithm = MCRYPT_BLOWFISH;
      $mode = MCRYPT_MODE_CBC;
      $iv = mcrypt_create_iv(mcrypt_get_iv_size($algorithm, $mode),
                             MCRYPT_DEV_URANDOM);

      $encrypted_data = mcrypt_encrypt($algorithm, $key, $data, $mode, $iv);
      $plain_text = base64_encode($encrypted_data);
      return $plain_text;
}


function desencripta2($data,$key)
{
   $algorithm = MCRYPT_BLOWFISH;
   $mode = MCRYPT_MODE_CBC;
      $iv = mcrypt_create_iv(mcrypt_get_iv_size($algorithm, $mode),
                             MCRYPT_DEV_URANDOM);
      $encrypted_data = base64_decode($data);
      $decoded = mcrypt_decrypt($algorithm, $key, $encrypted_data, $mode, $iv);

      return $decoded;


}





function dameURL(){
$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
return $url;
}




//FUNCION QUE REMPLAZA CARACTERES POR OTRAS EN UNA CADENA DE TEXTO
function remplaza($patron,$remplazo,$cadena) 
{
 $cadenaResul = str_replace($patron, $remplazo, $cadena);
   return $cadenaResul;
}





function urls($url) {
// Tranformamos todo a minusculas
$url = strtolower($url);
//Rememplazamos caracteres especiales latinos
$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
$repl = array('a', 'e', 'i', 'o', 'u', 'n');
$url = str_replace ($find, $repl, $url);
// Añaadimos los guiones
$find = array(' ', '&', '\r\n', '\n', '+'); 
$url = str_replace ($find, '-', $url);
// Eliminamos y Reemplazamos demás caracteres especiales
$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
$repl = array('', '-', '');
$url = preg_replace ($find, $repl, $url);
return $url;
}

?>