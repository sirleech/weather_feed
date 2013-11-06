<h1>Canberra Current Conditions</h1>
<?php

header('Content-Type: text/html');
header('Cache-Control: no-cache');
header('Pragma: no-cache');
header("Access-Control-Allow-Origin: *");

$url = 'ftp://ftp.bom.gov.au/anon/gen/fwo/IDN10035.xml';

$xmlStr = file_get_contents($url);
$xml = new SimpleXMLElement($xmlStr);


$result = $xml->xpath("//area[2]/forecast-period[1]/text[1]");
while(list( , $node) = each($result)) {
    echo $node;
}

?>
<br/>
<?php

$result = $xml->xpath("//area[3]/forecast-period[1]/text[1]");
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




