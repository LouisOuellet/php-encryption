<?php

//Declaring namespace
namespace LaswitchTech\phpEncryption;

class Encryption {

  protected $secretHash;
  protected $secretKey;
  protected $encryptionMethod;
  protected $secretIV;
  protected $IV;

  public function __construct($secretHash = null, $encryptionMethod = 'AES-256-CBC'){
    if($secretHash != null){ $this->secretHash = $secretHash; }
    else { $this->secretHash = $this->hex(); }
    $this->secretKey = hash( 'sha256', $this->secretHash );
    $this->encryptionMethod = $encryptionMethod;
    $this->secretIV = $this->hex();
    $this->IV = substr( hash( 'sha256', $this->secretIV ), 0, 16 );
  }

  protected function hex(){
    return bin2hex(openssl_random_pseudo_bytes(16));
  }

  public function secret(){
    return $this->secretHash;
  }

  public function encrypt($string){
    return base64_encode( openssl_encrypt( $string, $this->encryptionMethod, $this->secretKey, 0, $this->IV ) );
  }

  public function decrypt($string){
    return openssl_decrypt( base64_decode( $string ), $this->encryptionMethod, $this->secretKey, 0, $this->IV );
  }
}
