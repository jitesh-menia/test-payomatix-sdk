<?php

namespace Payomatix;

use Payomatix\Service\PaymentService;

class Payomatix extends PaymentService
{
	/** @var array options to be used for requests. */
	public static array $options;

	/** @var array fields to be used for requests. */
	public static array $fields;

	public function __construct()
	{
		// 
	}

	public function getOptions()
	{
		return self::$options;
	}

	public function setOptions($options)
	{
		self::$options = $options;
	}

	public function getFields()
	{
		return self::$fields;
	}

	public function setFields($fields)
	{
		self::$fields = $fields;
	}

	public function paymentAPI($fields)
	{
		print_r($fields);exit();
		return PaymentService::initializePayment(self::getFields(), self::getTestMode());
	}
}
