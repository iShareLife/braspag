<?php

class BraspagSaveCreditCardModel{

	private $customerIdentification;
	private $customerName;
	private $cardHolder;
	private $cardNumber;
	private $cardExpiration;
	private $justClickAlias;

	public function getCustomerIdentification() {
		return $this->customerIdentification;
	}

	public function getCustomerName() {
		return $this->customerName;
	}

	public function getCardHolder() {
		return $this->cardHolder;
	}

	public function getCardNumber() {
		return $this->cardNumber;
	}

	public function getCardExpiration() {
		return $this->cardExpiration;
	}

	public function getJustClickAlias() {
		return $this->justClickAlias;
	}

	public function setCustomerIdentification($customerIdentification) {
		$this->customerIdentification = $customerIdentification;
	}

	public function setCustomerName($customerName) {
		$this->customerName = $customerName;
	}

	public function setCardHolder($cardHolder) {
		$this->cardHolder = $cardHolder;
	}

	public function setCardNumber($cardNumber) {
		$this->cardNumber = $cardNumber;
	}

	public function setCardExpiration($cardExpiration) {
		$this->cardExpiration = $cardExpiration;
	}

	public function setJustClickAlias($justClickAlias) {
		$this->justClickAlias = $justClickAlias;
	}

}

