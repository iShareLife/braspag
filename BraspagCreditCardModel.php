<?php

/**
 * BraspagCreditCardModel
 * Credit Card Entity used to make authorizations, captures and justclick saves
 *
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

class BraspagCreditCardModel extends BraspagPaymentModel{

	//Payment plans
	const PAYMENT_PLAN_FULL = 0;
	const PAYMENT_PLAN_FINANCED_STORE = 1;
	const PAYMENT_PLAN_FINANCED_CARD = 2;

	//Transaction types
	const TRANSACTION_TYPE_INVALID = 0;
	const TRANSACTION_TYPE_AUTHORIZE = 1;
	const TRANSACTION_TYPE_AUTOCAPTURE = 2;
	const TRANSACTION_TYPE_PREAUTH_AUTENTICATION = 3;
	const TRANSACTION_TYPE_AUTOCAPTURE_AUTENTICATION = 4;

	//Payment methods
	const METHOD_CIELO_VISA = 500;
	const METHOD_CIELO_MASTERCARD = 501;
	const METHOD_CIELO_AMEX = 502;
	const METHOD_CIELO_DINNERS = 503;
	const METHOD_CIELO_ELO = 504;
	const METHOD_REDECARD_VISA = 509;
	const METHOD_REDECARD_MASTERCARD = 510;
	const METHOD_REDECARD_DINNERS = 511;
	const METHOD_HOMOLOGATION = 997;

	public $method;
	public $numberOfPayments;
	public $paymentPlan;
	public $transactionType;
	public $cardHolder;
	public $cardNumber;
	public $cardSecurityCode;
	public $cardExpirationDate;
	public $creditCardToken;
	public $justClickAlias;
	public $saveCreditCard = 0;

	public function __construct(){
		$this->setType(parent::TYPE_CREDITCARD);
	}

	public function getCreditCardToken(){
		return $this->creditCardToken;
	}

	public function getJustClickAlias(){
		return $this->justClickAlias;
	}

	public function getSaveCreditCard(){
		return $this->saveCreditCard;
	}

	public function setCreditCardToken($creditCardToken){
		$this->creditCardToken = $creditCardToken;
	}

	public function setJustClickAlias($justClickAlias){
		$this->justClickAlias = $justClickAlias;
	}

	public function setSaveCreditCard($saveCreditCard){
		$this->saveCreditCard = $saveCreditCard;
	}

	public function getMethod(){
		return $this->method;
	}

	public function setMethod($method){
		$this->method = $method;
		return $this;
	}

	public function getNumberOfPayments(){
		return $this->numberOfPayments;
	}

	public function getPaymentPlan(){
		return $this->paymentPlan;
	}

	public function getTransactionType(){
		return $this->transactionType;
	}

	public function getCardHolder(){
		return $this->cardHolder;
	}

	public function getCardNumber(){
		return $this->cardNumber;
	}

	public function getCardSecurityCode(){
		return $this->cardSecurityCode;
	}

	public function getCardExpirationDate(){
		return $this->cardExpirationDate;
	}

	public function setNumberOfPayments($numberOfPayments){
		$this->numberOfPayments = $numberOfPayments;
	}

	public function setPaymentPlan($paymentPlan){
		$this->paymentPlan = $paymentPlan;
	}

	public function setTransactionType($transactionType){
		$this->transactionType = $transactionType;
	}

	public function setCardHolder($cardHolder){
		$this->cardHolder = $cardHolder;
	}

	public function setCardNumber($cardNumber){
		$this->cardNumber = $cardNumber;
	}

	public function setCardSecurityCode($cardSecurityCode){
		$this->cardSecurityCode = $cardSecurityCode;
	}

	public function setCardExpirationDate($mm, $yyyy){
		$this->cardExpirationDate = $mm.'/'.$yyyy;
	}

	public function clearCreditCardToken(){
		unset($this->creditCardToken);
	}

	public function getPaymentData(){

		$data = new BraspagCreditCardDataRequest();

		$data->Amount = $this->amount;
		$data->Currency = $this->currency;
		$data->PaymentMethod = $this->method;
		$data->NumberOfPayments = $this->numberOfPayments;
		$data->PaymentPlan = $this->paymentPlan;
		$data->TransactionType = $this->transactionType;
		$data->CardHolder = $this->cardHolder;
		$data->CardNumber = $this->cardNumber;
		$data->CardSecurityCode = $this->cardSecurityCode;
		$data->CardExpirationDate = $this->cardExpirationDate;
		$data->SaveCreditCard = $this->saveCreditCard;

		if(!empty($this->creditCardToken)){
			$data->CreditCardToken = $this->creditCardToken;
			$data->JustClickAlias = $this->justClickAlias;
		}else{
			$data->clearCreditCardJustClick();
		}

		return $data;
	}
}
