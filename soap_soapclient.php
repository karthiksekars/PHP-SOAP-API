<?php

$wsdl = 'http://server/xmlpserver/services/v2/soapservice?wsdl';
$client = new SoapClient($wsdl);
$methodName = 'methodName';
$reg_param = array(
	'item_1' => 'value_1',
	'item_2' => 'value_2'
);

$response = $client->$methodName($reg_param);
echo "<pre>";
print_r($response);
echo "</pre>";
?>

