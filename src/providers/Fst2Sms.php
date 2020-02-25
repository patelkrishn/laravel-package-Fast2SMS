<?php

namespace Krishn\Fst2Sms\Provider;
use Krishn\Fst2Sms\Providers\Fst2SmsProvider;

class Fast2Sms extends Fst2SmsProvider
{

    private $parameters = null;
    
    public function sayHello()
    {
        echo  $this->authorization;
    }
    public function prepare($params = array()){
		$curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/wallet",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "authorization: swvdUSncH7ItqoQYUO0P8uISoJYSpAS8hXLSLvHSLOJLXKB64HAbEotIuSML"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }
    
    public function make(){
		if ($this->parameters == null) {
			throw new \Exception("prepare() method not called");
		}
		return $this->beginTransaction();
    }
    
}