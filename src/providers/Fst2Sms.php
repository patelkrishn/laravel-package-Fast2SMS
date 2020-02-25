<?php

namespace Krishn\Fst2Sms\Provider;
use Krishn\Fst2Sms\Providers\Fst2SmsProvider;

class Paytm extends PaytmProvider
{

    private $parameters = null;
    
    public function sayHello()
    {
        echo "Hello, from Facade class.";
    }
    public function prepare($params = array()){
		$defaults = [
			'order' => NULL,
			'user' => NULL,
			'amount' => NULL,
            'callback_url' => NULL,
            'email' => NULL,
            'mobile_number' => NULL,
		];

		$_p = array_merge($defaults, $params);
		foreach ($_p as $key => $value) {

			if ($value == NULL) {
				
				throw new \Exception(' \''.$key.'\' parameter not specified in array passed in prepare() method');
				
				return false;
			}
		}
		$this->parameters = $_p;
		return $this;
    }
    
    public function make(){
		if ($this->parameters == null) {
			throw new \Exception("prepare() method not called");
		}
		return $this->beginTransaction();
    }
    
}