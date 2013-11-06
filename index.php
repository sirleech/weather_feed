<?php

header('Content-Type: text/html');
header('Cache-Control: no-cache');
header('Pragma: no-cache');
header("Access-Control-Allow-Origin: *");

$product_id = htmlspecialchars($_GET["product_id"]);

if ($product_id == "")
	$product_id = "IDN10035";

$baseurl = 'ftp://ftp.bom.gov.au/anon/gen/fwo/';
$url = $baseurl . $product_id . ".xml";
//echo $url;

$xmlStr = file_get_contents($url);
$xml = new SimpleXMLElement($xmlStr);
?>
<h1>
<?php

$result = $xml->xpath("//area[2]/@description");
while(list( , $node) = each($result)) {
    echo $node;
}

?>
</h1>
<h2>Today</h2>
Forecast (short):
<?php

$result = $xml->xpath("//area[3]/forecast-period[1]/text[@type='precis']");
while(list( , $node) = each($result)) {
    echo $node;
}

?>

<br/>
Forecast (long):
<?php

$result = $xml->xpath("//area[2]/forecast-period[1]/text[@type='forecast']");
while(list( , $node) = each($result)) {
    echo $node;
}

?>

<br/>Air temperature maximum: 
<?php

$result = $xml->xpath("//area[3]/forecast-period[1]/element[@type='air_temperature_maximum']");
while(list( , $node) = each($result)) {
    echo $node;
}

?>
c
<br/>Chance of Rain:
<?php

$result = $xml->xpath("//area[3]/forecast-period[1]/text[@type='probability_of_precipitation']");
while(list( , $node) = each($result)) {
    echo $node;
}

?>

<br/>Rainfall amount:
<?php

$result = $xml->xpath("//area[3]/forecast-period[1]/element[@type='precipitation_range']");
while(list( , $node) = each($result)) {
    echo $node;
}

?>

<br/>Forecast Icon Code:
<?php

$result = $xml->xpath("//area[3]/forecast-period[1]/element[@type='forecast_icon_code']");
while(list( , $node) = each($result)) {
    echo $node;
}

?>




