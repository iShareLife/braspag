<?php

/**
 * BraspagAuthorizeRequest
 * Internally used to make authorization request
 *
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

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

