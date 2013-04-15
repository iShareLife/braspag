<?php

/**
 * BraspagCreditCardDataRequest
 * Internally used to make a credit card request
 *
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

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
