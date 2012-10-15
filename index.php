<?php

header('Content-Type: text/html');
header('Cache-Control: no-cache');
header('Pragma: no-cache');
header("Access-Control-Allow-Origin: *");

$url = 'ftp://ftp.bom.gov.au/anon/gen/fwo/IDN10035.xml';

$xmlStr = file_get_contents($url);
$xml = new SimpleXMLElement($xmlStr);

//$result = $xml->amoc[0]->identifier;
//echo $result;

$result = $xml->forecast->area[1]->children()->children();
echo $result;

$result = $xml->xpath('/product/amoc');
//echo $result->size;
//var_dump($result);

while(list( , $node) = each($result)) {
    echo $node,"\n";
}

//$result = $xml->forecast->area[2]->children()->children();
//echo "<br/>Forecast Code: $result";

//$result = $xml->forecast->area[2]->children()->asXML();
//echo "<br/>Max Temp: $result";

//foreach ($xml->forecast->area[2]->children() as $element) {
	//echo $element->asXML();
//}


?>

<a href="xmlproxy.php">raw xml</a>
