<?php

/**
 * BraspagSaveCreditCardDataRequest
 * Internally used to save request of credit card
 *
 * @abstract
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

class BraspagSaveCreditCardDataRequest{

	public $MerchantKey;
	public $CustomerIdentification;
	public $CustomerName;
	public $CardHolder;
	public $CardNumber;
	public $CardExpiration;
	public $JustClickAlias;

}
