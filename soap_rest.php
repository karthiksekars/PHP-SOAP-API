<?php

$soapUrl = 'http://server/xmlpserver/services/v2/soapservice?wsdl';

$xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v2="http://xmlns.oracle.com/oxp/service/v2">
					   <soapenv:Header/>
					   <soapenv:Body>
						  <v2:item>
						  <v2:item_1>value_1</v2:item_1>
						  <v2:item_2>value_2</v2:item_2>
						  </v2:item>
					   </soapenv:Body>
					</soapenv:Envelope>';

$headers = array(
	"Content-type: text/xml;charset=\"utf-8\"",
	"Accept: text/xml",
	"Cache-Control: no-cache",
	"Pragma: no-cache",
	"SOAPAction: \"runReport\"",
	"Content-length: " . strlen($xml_post_string),
);

$url = $soapUrl;

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($curl, CURLOPT_TIMEOUT, 0);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if ($response === false) {
	$err = 'Curl error: ' . curl_error($ch);
	curl_close($ch);
	print $err;
}
else {
	curl_close($ch);
}

echo "<pre>";
print_r($response);
echo "</pre>";
?>