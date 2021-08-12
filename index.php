<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '');

$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
	new GuzzleHttp\Client(),
	$config
);

$data = [];
$data['sender']['name'] = '';
$data['sender']['email'] = '';
$data['replyTo']['email'] = '';
$data['to'][0]['email'] = '';
$data['to'][0]['name'] = '';
$data['htmlContent'] = '';
$data['textContent'] = '';
$data['subject'] = '';
$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail($data);

try {
	$result = $apiInstance->sendTransacEmail($sendSmtpEmail);
	print_r($result);
} catch (Exception $e) {
	$data =$e->getMessage();
	print_r($data);
}
