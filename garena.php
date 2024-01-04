<?php
$v1 = $_GET['v1'];
$v2 = $_GET['v2'];
$passmd5 = md5(urldecode($_GET['pass']));

$pass= EnCode($passmd5,hash('sha256',hash('sha256',$passmd5.$v1).$v2));

echo ($pass);

function EnCode($plaintext,$key)
{
  $chiperRaw = openssl_encrypt(hex2bin($plaintext), "AES-256-ECB", hex2bin($key), OPENSSL_RAW_DATA);
  return substr(bin2hex($chiperRaw),0,32);
}
?>
