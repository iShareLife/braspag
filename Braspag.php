<?php

/**
 * Braspag main class
 * Used to execute WSDL methods
 *
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

class Braspag{

	private $Soap;

	private $merchantID;

	private $merchantKey;

	private $version;

	private $transactionURL;

	private $justClickURL;

	public function __construct($ambient){

		$this->loadClasses();

		switch ($ambient){
			case 'production':
				$this->setTransactionURL(BraspagSetup::URL_TRANSACTION);
				$this->setJustClickURL(BraspagSetup::URL_JUSTCLICK);
				break;
			case 'homologation':
				$this->setTransactionURL(BraspagSetup::URL_TRANSACTION_HOMOLOGATION);
				$this->setJustClickURL(BraspagSetup::URL_JUSTCLICK_HOMOLOGATION);
				break;
			default:
				$this->setTransactionURL(BraspagSetup::URL_TRANSACTION_HOMOLOGATION);
				$this->setJustClickURL(BraspagSetup::URL_JUSTCLICK_HOMOLOGATION);
				break;
		}

		$this->setMerchantID(BraspagSetup::MERCHANT_ID);
		$this->setMerchantKey(BraspagSetup::MERCHANT_KEY);
		$this->setVersion(BraspagSetup::VERSION);
	}

	public function dump($response){
		echo '<pre>';
		print_r($response);
		echo '</pre>';
	}

	public function loadClasses(){
		require_once 'BraspagSetup.php';
		require_once 'BraspagAdditionalData.php';
		require_once 'BraspagAddressData.php';
		require_once 'BraspagCustomerData.php';
		require_once 'BraspagAuthorizeRequest.php';
		require_once 'BraspagPaymentModel.php';
		require_once 'BraspagPaymentDataRequest.php';
		require_once 'BraspagCreditCardDataRequest.php';
		require_once 'BraspagCreditCardModel.php';
		require_once 'BraspagSoapClient.php';
		require_once 'BraspagTransactionData.php';
		require_once 'BraspagTransactionRequest.php';
		require_once 'BraspagSaveCreditCardDataRequest.php';
		require_once 'BraspagGetCreditCardDataRequest.php';
	}

	public function getJustClickURL() {
		return $this->justClickURL;
	}

	public function setJustClickURL($justClickURL) {
		$this->justClickURL = $justClickURL;
	}

	public function getMerchantID() {
		return $this->merchantID;
	}

	public function setMerchantID($merchantID) {
		$this->merchantID = $merchantID;
	}

	public function getMerchantKey() {
		return $this->merchantKey;
	}

	public function setMerchantKey($merchantKey) {
		$this->merchantKey = $merchantKey;
	}

	public function getTransactionURL() {
		return $this->transactionURL;
	}

	public function setTransactionURL($transactionURL) {
		$this->transactionURL = $transactionURL;
	}

	public function getVersion() {
		return $this->version;
	}

	public function setVersion($version) {
		$this->version = $version;
	}

	public function generateGuid(){
		$hash = strtoupper(hash('ripemd128', uniqid('', true) . md5(time() . rand(0, time()))));
		$guid = '{'.substr($hash,  0,  8).'-'.substr($hash,  8,  4).'-'.substr($hash, 12,  4).'-'.substr($hash, 16,  4).'-'.substr($hash, 20, 12).'}';

		return $guid;
	}

	public function authorizeCreditCardTransaction(BraspagCreditCardModel $CreditCard, BraspagCustomerData $Customer){

		$request = new BraspagAuthorizeRequest($this->generateGuid(), $this->version);

		$request->OrderData->MerchantId = $this->merchantID;
		$request->OrderData->OrderId = $CreditCard->getOrderId();
		$request->addPaymentData($CreditCard->getPaymentData());

		$request->CustomerData->CustomerIdentity = $Customer->getID();
		$request->CustomerData->CustomerName = $Customer->getName();
		$request->CustomerData->CustomerEmail = $Customer->getEmail();
		$request->CustomerData->CustomerAddressData = $Customer->getAddressData();
		$request->CustomerData->DeliveryAddressData = $Customer->getDeliveryAddressData();

		$params = new stdClass;
		$params->request = $request;

		$this->Soap = new BraspagSoapClient($this->transactionURL);

		$response = $this->Soap->AuthorizeTransaction($params);
		$response = $response->AuthorizeTransactionResult;

		return $response;
	}

	public function captureCreditCardTransaction($braspagTransactionId, $amount){

		$request = new BraspagTransactionRequest($this->generateGuid(), $this->version);

		$request->MerchantId = $this->merchantID;
		$request->addTransactionData($braspagTransactionId,$amount);

		$params = new stdClass();
		$params->request = $request;

		$this->Soap = new BraspagSoapClient($this->transactionURL, BraspagSoapClient::NAMESPACE_TRANSACTION);

		$response = $this->Soap->CaptureCreditCardTransaction($params);

		return $response;
	}

	public function refundCreditCardTransaction($braspagTransactionId, $amount){

		$request = new BraspagTransactionRequest($this->generateGuid(), $this->version);

		$request->MerchantId = $this->merchantID;
		$request->addTransactionData($braspagTransactionId,$amount);

		$params = new stdClass();
		$params->request = $request;

		$this->Soap = new BraspagSoapClient($this->transactionURL, BraspagSoapClient::NAMESPACE_TRANSACTION);

		$response = $this->Soap->RefundCreditCardTransaction($params);

		return $response;
	}

	public function voidCreditCardTransaction($braspagTransactionId, $amount){

		$request = new BraspagTransactionRequest($this->generateGuid(), $this->version);

		$request->MerchantId = $this->merchantID;
		$request->addTransactionData($braspagTransactionId, $amount);

		$params = new stdClass();
		$params->request = $request;

		$this->Soap = new BraspagSoapClient($this->transactionURL, BraspagSoapClient::NAMESPACE_TRANSACTION);

		$response = $this->Soap->VoidCreditCardTransaction($params);

		return $response;
	}


	public function saveCreditCard(BraspagCreditCardModel $CreditCard, BraspagCustomerData $Customer){

		$request = new BraspagSaveCreditCardDataRequest();

		$request->MerchantKey = $this->merchantKey;
		$request->CardNumber = $CreditCard->getCardNumber();
		$request->CardHolder = $CreditCard->getCardHolder();
		$request->CardExpiration = $CreditCard->getCardExpirationDate();

		$request->CustomerIdentification = $Customer->getID();
		$request->CustomerName = $Customer->getName();

		if(!$justClickAlias = $CreditCard->getJustClickAlias()){
			unset($request->JustClickAlias);
		}else{
			$request->JustClickAlias = $justClickAlias;
		}

		$params = new stdClass();
		$params->saveCreditCardRequestWS = $request;

		$this->Soap = new BraspagSoapClient($this->justClickURL, BraspagSoapClient::NAMESPACE_JUSTCLICK);

		$response = $this->Soap->SaveCreditCard($params);

		return $response;
	}

	public function getCreditCard($justClickKey,$justClickAlias = false){

		$request = new BraspagGetCreditCardDataRequest();

		$request->MerchantKey = $this->merchantKey;
		$request->JustClickKey = $justClickKey;
		$request->JustClickAlias = $justClickAlias;

		if(!$justClickAlias){
			unset($request->JustClickAlias);
		}else{
			$request->JustClickAlias = $justClickAlias;
		}

		$params = new stdClass();
		$params->getCreditCardRequestWS = $request;

		$this->Soap = new BraspagSoapClient($this->justClickURL, BraspagSoapClient::NAMESPACE_JUSTCLICK);

		$response = $this->Soap->GetCreditCard($params);

		return $response;
	}
}
