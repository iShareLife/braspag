<?php
class BraspagTransactionRequest{

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
