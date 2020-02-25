<?php

namespace Krishn\Fst2Sms\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Manager;

class Fst2SmsProvider
{
    
	public function __construct(){
        // $this->request = $request;
        $config = [
            'env' => env('FST2SMS_AUTHORIZATION_KEY'), // values : (local | production)
    	];
		
	}
}