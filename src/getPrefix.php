<?php
require_once '../vendor/autoload.php';
use libphonenumber\PhoneNumberUtil;

if (isset($_GET['country'])) {
    $country = $_GET['country'];
    $phoneUtil = PhoneNumberUtil::getInstance();
    $countryCode = $phoneUtil->getCountryCodeForRegion($country);
    echo $countryCode;
}
?>