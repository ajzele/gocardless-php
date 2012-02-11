<?php

if (!function_exists('curl_init')) {
  throw new Exception('GoCardless needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('GoCardless needs the JSON PHP extension.');
}

// Include subclasses
require 'lib/utils.php';
require 'lib/exceptions.php';
require 'lib/client.php';
require 'lib/resource.php';
require 'lib/merchant.php';
require 'lib/subscription.php';
require 'lib/pre_authorization.php';
require 'lib/bill.php';

global $client;

abstract class GoCardless {
	
	public static $environment;
	public static $account_details;
	
	public static function set_account_details($account_details) {
		global $client;
		foreach ($account_details as $key => $value) {
			self::$account_details[$key] = $value;
		}
		$client = new Client(self::$account_details);
	}
	
	// PUBLIC FUNCTIONS
	
	/**
	 * Generate a URL to give a user to create a new subscription
	 *
	 * @param array $params Parameters to use to generate the URL
	 *
	 * @return string The generated URL
	 */
	public static function new_subscription_url($params) {
		return Client::new_subscription_url($params);
	}
	
	/**
	 * Generate a URL to give a user to create a new pre-authorized payment
	 *
	 * @param array $params Parameters to use to generate the URL
	 *
	 * @return string The generated URL
	 */
	public function new_pre_authorization_url($params) {
		return Client::new_pre_authorization_url($params);
	}
	
	/**
	 * Generate a URL to give a user to create a new bill
	 *
	 * @param array $params Parameters to use to generate the URL
	 *
	 * @return string The generated URL
	 */
	public function new_bill_url($params) {
		return Client::new_bill_url($params);
	}
	
	/**
	 * Generate a URL to give a user to create a new bill
	 *
	 * @param array $params Parameters to use to generate the URL
	 *
	 * @return string The generated URL
	 */
	public function confirm_resource($params) {
		return Client::confirm_resource($params);
	}

	public function validate_webhook($params) {
		return Client::validate_webhook($params);
	}
	
}

?>