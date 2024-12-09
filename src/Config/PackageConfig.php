<?php

namespace Payomatix\Config;

class PackageConfig
{
	public const VERSION = '1.0.0';
    public const BASE_URL = 'https://stageadmin.payomatix.com';

    public const PAYMENT_URL = '/payment/merchant/transaction';
    public const PAYMENT_TEST_URL = '/payment/merchant/transaction';
    public const GET_URL = '/payment/get/transaction';

	protected function getSecretKey()
	{
		return getenv('PAYOMATIX_SECRET_KEY');
	}

	protected function getVersion()
	{
		return self::VERSION;
	}

	protected function getBaseUrl()
	{
		return self::BASE_URL;
	}

	protected function getTimeOut()
	{
		return self::TIME_OUT;
	}

	protected function getTestPaymentUrl()
	{
		return self::BASE_URL . self::PAYMENT_TEST_URL;
	}

	protected function getLivePaymentUrl($test_mode)
	{
		return self::BASE_URL . self::PAYMENT_URL;
	}
}
