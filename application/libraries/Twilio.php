<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/Twilio_lib/twilio-php-master/Twilio/autoload.php";
use Twilio\Rest\Client;
class Twilio {
    public function __construct($param) {
        //parent::__construct();
        $client = new Client(SID, TOKEN);
        foreach($param['numArray'] as $n){
            $client->messages->create($n,array('from' => $param['fromNumber'],'body' => $param['body']));
        }
    }
}