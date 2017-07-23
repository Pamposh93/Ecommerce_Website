<?php
header('Content-Disposition: attachment; filename=orderdetails.xml');
header("Content-Type: application/force-download");
header('Pragma: private');
header('Cache-control: private, must-revalidate');
session_start();
session_cache_limiter("must-revalidate");
$xmlarr = $_SESSION["sesxmlarr"];

$dom = new DOMDocument();

$root = $dom->createElement("OrderDetails");
$dom->appendChild($root);

$parent = $dom->createElement("Order");
$root->appendChild($parent);

$date = $dom->createElement("Date");
$date->appendChild($dom->createTextNode($xmlarr["date"]));
$parent->appendChild($date);

$email = $dom->createElement("EmailID");
$email->appendChild($dom->createTextNode($xmlarr["emailid"]));
$parent->appendChild($email);

$name = $dom->createElement("FullName");
$name->appendChild($dom->createTextNode($xmlarr["fullname"]));
$parent->appendChild($name);

$address = $dom->createElement("Address");
$address->appendChild($dom->createTextNode($xmlarr["address"]));
$parent->appendChild($address);

$loyaltycat = $dom->createElement("LoyaltyCategory");
$loyaltycat->appendChild($dom->createTextNode($xmlarr["loyaltycat"]));
$parent->appendChild($loyaltycat);

$orderdesc = $dom->createElement("Desc");
$orderdesc->appendChild($dom->createTextNode($xmlarr["orderdesc"]));
$parent->appendChild($orderdesc);

$netpayableamt = $dom->createElement("NetPayableAmt");
$netpayableamt->appendChild($dom->createTextNode($xmlarr["netpayableamt"]));
$parent->appendChild($netpayableamt);


echo $dom->saveXML();
?>