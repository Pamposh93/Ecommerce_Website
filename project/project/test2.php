<?php
header('Content-Disposition: attachment; filename=dom.xml');
header("Content-Type: application/force-download");
header('Pragma: private');
header('Cache-control: private, must-revalidate');

$dom = new DOMDocument('1.0', 'iso-8859-1');
echo $dom->saveXML();
?>