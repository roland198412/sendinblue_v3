<?php
require_once(__DIR__ . '/vendor/autoload.php');

/**
 * SendinBlue REST client
 */
class SendInBlue
{
	public $api_key;
	public $base_url;
	public $timeout;

	public function __construct($base_url,$api_key,$timeout='')
	{
		if(!function_exists('curl_init'))
		{
			throw new RuntimeException('Mailin requires cURL module');
		}
		$this->base_url = $base_url;
		$this->api_key = $api_key;
		$this->timeout = $timeout;
	}

	public function send_email($data)
	{
		// Configure API key authorization: api-key
		$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $this->api_key);

		$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
			new GuzzleHttp\Client(),
			$config
		);

		$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail($data);

		try {
			$result = $apiInstance->sendTransacEmail($sendSmtpEmail);
			print_r($result);
			return ['code' => 200];
		} catch (Exception $e) {
			echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
			return ['code' => $e->getCode()];
		}
	}
}
