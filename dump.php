<?php

if (!isset($_SERVER['argv'][1])) {
    file_put_contents('php://stderr', "Usage: dump.php BOOKING_XML_PATH\n");
    exit(1);
}

$dom = new DOMDocument();
$dom->load($_SERVER['argv'][1]);
$xpath = new DOMXPath($dom);

$entities = array();
$nodes = $xpath->query('//*[@type]');
for ($i = 0; $i < $nodes->length; $i++) {
    $node = $nodes->item($i);

    $arguments = array();
    $entityNodes = $xpath->query('./*', $node);
    for ($p = 0; $p < $entityNodes->length; $p++) {
        $arguments[] = $entityNodes->item($p)->nodeName;
    }

    $entityName = $node->attributes->getNamedItem('type')->nodeValue;
    if (array_key_exists($entityName, $entities)) {
        $entities[$entityName] = array_unique(array_merge($entities[$entityName], $arguments));
    } else {
        $entities[$entityName] = $arguments;
    }
}

foreach ($entities as $type => $arguments) {
    echo $type, "\n";
    foreach ($arguments as $argument) {
        echo "\t", $argument, "\n";
    }
}
