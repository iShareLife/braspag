<?php

/**
 * BraspagTransactionRequest
 * Internally used to make transaction requests
 *
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

class BraspagTransactionRequest {

	public $RequestId;

	public $Version;

	public $TransactionDataCollection = array();

	public function __construct($requestID = null, $version = null){
		$this->RequestId = $requestID;
		$this->Version = $version;
	}

	public function addTransactionData($braspagTransactionId,$amount){
		$transactionData = new BraspagTransactionData();
		$transactionData->BraspagTransactionId = $braspagTransactionId;
		$transactionData->Amount = $amount;
		$this->TransactionDataCollection[] = new SoapVar($transactionData, SOAP_ENC_OBJECT);
	}
}
