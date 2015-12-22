<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('PHPMailer/PHPMailerAutoload.php');

class MY_PHPMailer extends PHPMailer {

 function __construct()
 {
   parent::__construct();
 }


}

?>