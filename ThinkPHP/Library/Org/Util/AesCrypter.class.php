<?php
namespace Org\Util; 
class AesCrypter { 
    private $key ; 
    private $algorithm;//秘钥长度MCRYPT_RIJNDAEL_128、MCRYPT_RIJNDAEL_192、MCRYPT_RIJNDAEL_256
    private $mode;     //Mcrypt支持的加密模式有：cbc cfb ctr ecb ncfb nofb ofb stream //这里只给出CBC模式
    private $padding;  //补码方式 pkcs7或pkcs5
    private $iv  ;       //秘钥偏移量
    public function __construct($key ='', $algorithm = 128, 
        $mode = MCRYPT_MODE_CBC,$padding = 1,$iv = '') { 

        $this->key = $key;  
        if ($algorithm == 128) {
             $this->algorithm = MCRYPT_RIJNDAEL_128;
        }elseif($algorithm == 256){
            $this->algorithm = MCRYPT_RIJNDAEL_256;
        }else{
            $thih->algorithm = MCRYPT_RIJNDAEL_192;
        }
        $this->mode = $mode;
        if ($padding == 1) {
            $this->padding = "pkcs7";
        }else{
            $this->padding = "pkcs5";
        }    
        
        $this->iv = $iv; 
    } 
    public function encrypt($orig_data) { 
        $encrypter = mcrypt_module_open($this->algorithm, '', 
            $this->mode, ''); 
        if($this->padding == "pkcs7"){
            $orig_data = $this->pkcs7padding(
                $orig_data, mcrypt_enc_get_block_size($encrypter)
            ); 
        }else{
            $orig_data = $this->pkcs5padding(
                $orig_data, mcrypt_enc_get_block_size($encrypter)
            );
        }
        mcrypt_generic_init($encrypter, $this->key,$this->iv); 
        $ciphertext = mcrypt_generic($encrypter, $orig_data); 
        mcrypt_generic_deinit($encrypter); 
        mcrypt_module_close($encrypter); 
        return base64_encode($ciphertext); 
    } 
    public function decrypt($ciphertext) { 
        $encrypter = mcrypt_module_open($this->algorithm, '',$this->mode, ''); 
        $ciphertext = base64_decode($ciphertext); 
        mcrypt_generic_init($encrypter, $this->key, $this->iv); 
        $orig_data = mdecrypt_generic($encrypter, $ciphertext); 
        mcrypt_generic_deinit($encrypter); 
        mcrypt_module_close($encrypter);
        if($this->padding == "pkcs7"){
            return $this->pkcs7unPadding($orig_data); 
        }else{
            return $this->pkcs5unPadding($orig_data); 
        } 
    } 
    public function pkcs7padding($data, $blocksize) { 
        $padding = $blocksize - strlen($data) % $blocksize; 
        return $data . str_repeat(chr($padding), $padding); 
    } 
    public function pkcs5padding($data, $blocksize){
        $padding = $blocksize - (strlen($data) % $blocksize);
        return $data . str_repeat(chr($padding), $padding);
    }
    public function pkcs7unPadding($data) { 
        $length = strlen($data); 
        $unpadding = ord($data[$length - 1]); 
        return substr($data, 0, $length - $unpadding); 
    }
    public function pkcs5unPadding($data) { 
        $length = strlen($data);
        $unpadding = ord($data[$length-1]);
        return substr($data, 0, -$unpadding);
    }  
} 
?>

