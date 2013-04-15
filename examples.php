<?php

//Import Braspag library
require_once 'Braspag.php';

/**
 * Authorize and capture payment
 */

$Braspag = new Braspag('homologation');

///////////////
//Customer
///////////////
$Customer = new BraspagCustomerData();
$Customer->setName('Robson Morais');
$Customer->setID('1001');
$Customer->setEmail('r.morais@isharelife.com.br');

//Customer address (optional)
$AddressData = new BraspagAddressData();
$AddressData->Street = 'Blvd. 28 de Setembro';
$AddressData->Number = '389';
$AddressData->Complement = 'Sala 512';
$AddressData->District = 'Vila Isabel';
$AddressData->City = 'Rio de Janeiro';
$AddressData->State = 'RJ';
$AddressData->ZipCode = '20551030';
$AddressData->Country = 'BR';

//Set address data is optional
$Customer->setAddressData($AddressData);
$Customer->setDeliveryAddressData($AddressData);

///////////////
//Credit card
///////////////
$CreditCard = new BraspagCreditCardModel();

//Capture transaction after authorization
$CreditCard->setTransactionType(BraspagCreditCardModel::TRANSACTION_TYPE_AUTOCAPTURE);

//Testing
$CreditCard->setMethod(BraspagCreditCardModel::METHOD_HOMOLOGATION);

//Order and payment info
$CreditCard->setOrderId('3598754');
$CreditCard->setCardNumber('0000000000000001');
$CreditCard->setCardHolder("ROBSON M SANTOS");
$CreditCard->setCardExpirationDate('06', '2015');
$CreditCard->setCardSecurityCode('345');
$CreditCard->setCurrency('BRL');
$CreditCard->setCountry('BRA');
$CreditCard->setAmount(1500);
$CreditCard->setPaymentPlan(BraspagCreditCardModel::PAYMENT_PLAN_FINANCED_STORE);
$CreditCard->setNumberOfPayments(3);
$CreditCard->setSaveCreditCard(true);

//Execute transaction
$response = $Braspag->authorizeCreditCardTransaction($CreditCard, $Customer);

//Echoes result
$Braspag->dump($response);