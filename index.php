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
echo $url;

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

<?php

$result = $xml->xpath("//area[2]/forecast-period[1]/text[1]");
while(list( , $node) = each($result)) {
    echo $node;
}

?>

<br/>Max
<?php

$result = $xml->xpath("//area[3]/forecast-period[1]/element[2]");
while(list( , $node) = each($result)) {
    echo $node;
}

?>
c
<br/>Chance of Rain
<?php

$result = $xml->xpath("//area[3]/forecast-period[1]/text[2]");
while(list( , $node) = each($result)) {
    echo $node;
}

?>
<br/>Icon Code
<?php

$result = $xml->xpath("//area[3]/forecast-period[1]/element[1]");
while(list( , $node) = each($result)) {
    echo $node;
}

?>




