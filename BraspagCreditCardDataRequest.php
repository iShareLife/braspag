<?php

class BraspagCreditCardDataRequest extends BraspagPaymentDataRequest{

	public $NumberOfPayments;
	public $PaymentPlan;
	public $TransactionType;
	public $CardHolder;
	public $CardNumber;
	public $CardSecurityCode;
	public $CardExpirationDate;
	public $CreditCardToken;
	public $JustClickAlias;
	public $SaveCreditCard;

	public function clearCreditCardJustClick(){
		unset($this->CreditCardToken);
		unset($this->JustClickAlias);
	}
}
