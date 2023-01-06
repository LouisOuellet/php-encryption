<?php

//Declaring namespace
namespace LaswitchTech\phpEncryption;

class phpEncryption {

  protected $secretHash;
  protected $secretKey;
  protected $encryptionMethod;
  protected $secretInitialValue;
  protected $InitialValue;

  public function __construct($encryptionMethod = 'AES-256-CBC'){
    $this->encryptionMethod = $encryptionMethod;
    $this->setSecret();
    $this->setInitialValue();
  }

  public function hex($length = 16){
    return bin2hex(openssl_random_pseudo_bytes($length = 16));
  }

  public function setSecret($secretHash = null){
    if($secretHash != null){ $this->secretHash = $secretHash; }
    else { $this->secretHash = $this->hex(); }
    $this->secretKey = hash( 'sha256', $this->secretHash );
    return $this->secretKey;
  }

  public function setInitialValue($secretInitialValue = null){
    if($secretInitialValue != null){ $this->secretInitialValue = $secretInitialValue; }
    else { $this->secretInitialValue = $this->hex(); }
    $this->secretInitialValue = hash( 'sha256', $this->secretInitialValue );
    $this->InitialValue = substr( hash( 'sha256', $this->secretInitialValue ), 0, 16 );
    return $this->secretInitialValue;
  }

  public function encrypt($string, $filename = null){
    if(is_file($string)){
      if($filename == null){ $filename = $string.'.'.$this->encryptionMethod; }
      $blob = base64_encode( openssl_encrypt( file_get_contents($string), $this->encryptionMethod, $this->secretKey, 0, $this->InitialValue ) );
      $file = fopen($filename, 'w');
      fwrite($file, $blob);
      fclose($file);
      return $filename;
    } elseif(is_string($string)){
      return base64_encode( openssl_encrypt( $string, $this->encryptionMethod, $this->secretKey, 0, $this->InitialValue ) );
    } else { return false; }
  }

  public function decrypt($string, $filename = null){
    if(is_file($string)){
      if($filename == null){ str_replace($this->encryptionMethod,'',$string); }
      $blob = openssl_decrypt( base64_decode( file_get_contents($string) ), $this->encryptionMethod, $this->secretKey, 0, $this->InitialValue );
      $file = fopen($filename, 'w');
      fwrite($file, $blob);
      fclose($file);
      return $filename;
    } elseif(is_string($string)) {
      return openssl_decrypt( base64_decode( $string ), $this->encryptionMethod, $this->secretKey, 0, $this->InitialValue );
    } else { return false; }
  }
}
