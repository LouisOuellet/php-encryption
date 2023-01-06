<?php

//Declaring namespace
namespace LaswitchTech\phpEncryption;

class phpEncryption {

  // Properties

  protected $Cipher;
  protected $PrivateKey;
  protected $PrivateHash;
  protected $PublicKey;
  protected $PublicHash;

  // Constructor

  public function __construct(){

    // Basic Configuration
    $this->setCipher();
    $this->setPublicKey();
    $this->setPrivateKey();
  }

  // Helpers

  protected function hex($length = 16){
    return bin2hex(openssl_random_pseudo_bytes($length = 16));
  }

  protected function hash($string){
    return hash( 'sha256', $string );
  }

  // Configure

  public function setCipher($cipher = null){
    if($cipher == null || !is_string($cipher)){
      if(defined('ENCRYPTION_CIPHER')){
        $cipher = ENCRYPTION_CIPHER;
      } else {
        $cipher = 'AES-256-CBC';
      }
    }
    if(in_array($cipher,openssl_get_cipher_methods())){ $this->Cipher = $cipher; }
  }

  public function setPublicKey($key = null){
    if($key == null || !is_string($key)){ $key = $this->hex(); }
    $this->PublicKey = $key;
    $this->PublicHash = $this->hash($this->PublicKey);
  }

  public function setPrivateKey($key = null){
    if($key == null || !is_string($key)){
      if(defined('ENCRYPTION_KEY')){
        $key = ENCRYPTION_KEY;
      } else {
        $key = $this->hex();
      }
    }
    $this->PrivateKey = $key;
    $this->PrivateHash = $this->hash($this->PrivateKey);
    $this->PrivateHash = substr($this->PrivateHash, 0, openssl_cipher_iv_length($this->Cipher));
  }

  // Methods

  public function encrypt($string, $filename = null){
    if(is_file($string)){
      if($filename == null){ $filename = $string.'.'.$this->Cipher; }
      $blob = base64_encode( openssl_encrypt( file_get_contents($string), $this->Cipher, $this->PublicHash, 0, $this->PrivateHash ) );
      $file = fopen($filename, 'w');
      fwrite($file, $blob);
      fclose($file);
      return $filename;
    } elseif(is_string($string)){
      return base64_encode( openssl_encrypt( $string, $this->Cipher, $this->PublicHash, 0, $this->PrivateHash ) );
    } else { return false; }
  }

  public function decrypt($string, $filename = null){
    if(is_file($string)){
      if($filename == null){ str_replace($this->Cipher,'',$string); }
      $blob = openssl_decrypt( base64_decode( file_get_contents($string) ), $this->Cipher, $this->PublicHash, 0, $this->PrivateHash );
      $file = fopen($filename, 'w');
      fwrite($file, $blob);
      fclose($file);
      return $filename;
    } elseif(is_string($string)) {
      return openssl_decrypt( base64_decode( $string ), $this->Cipher, $this->PublicHash, 0, $this->PrivateHash );
    } else { return false; }
  }
}
