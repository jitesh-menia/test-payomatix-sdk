<?php

namespace Payomatix\Service;

class ResponseService
{
	public static function noSecKey()
	{
		return response([
			'status' => 404,
			'error' => 'no secret key',
		]);
	}

	public static function validatioError($payload)
	{
		return response([
			'status' => 404,
			'error' => 'no secret key',
		]);
	}
}