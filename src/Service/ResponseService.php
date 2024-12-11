<?php

namespace Payomatix\Service;

class ResponseService
{
	public static function noSecKey()
	{
		return [
			'status' => false,
			'errors' => 'no secret key',
		];
	}

	public static function validationError($validations)
	{
		return [
			'status' => false,
			'errors' => $validations,
		];
	}

	public static function standardThreeDS($response)
	{
		return [
			'status' => false,
			'url' => $response['url'] ?? null,
		];
	}
}