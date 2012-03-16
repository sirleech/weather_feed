<?php

header('Content-Type: application/xml');
header('Cache-Control: no-cache');
header('Pragma: no-cache');
header("Access-Control-Allow-Origin: *");

$url = 'ftp://ftp.bom.gov.au/anon/gen/fwo/IDN10035.xml';

$xmlStr = file_get_contents($url);
$xml = new SimpleXMLElement($xmlStr);

echo $xml->asXML();

?>