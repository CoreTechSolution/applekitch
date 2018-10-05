<?php
require_once('vendor/autoload.php');
$setings=get_settings();
//print_r($setings);
$stripe = array(
    "secret_key"      => $setings->secrete_key,
    "publishable_key" => $setings->publishable_key
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>