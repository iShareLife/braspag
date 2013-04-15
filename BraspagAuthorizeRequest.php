<?php

class BraspagAuthorizeRequest{

	public $RequestId;
	public $Version;
	public $PaymentDataCollection = array();

	public function __construct($requestID = null, $version = null){
		$this->RequestId = $requestID;
		$this->Version = $version;
	}

	public function addPaymentData(BraspagPaymentDataRequest $data){
		$type = str_replace('Braspag', '', join('', array_slice(explode('\\', get_class($data)), -1)));
		$this->PaymentDataCollection[] = new SoapVar($data, SOAP_ENC_OBJECT, $type);
	}
}

