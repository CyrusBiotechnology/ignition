<?php

require_once 'config.php';

// Check given key
if (! array_key_exists("key", $_REQUEST)) {
  exit("must provide authentication");
}

if (! array_key_exists($_REQUEST["key"], $keys)) {
  exit("bad key");
}

// Checks have now passed, so load up the API client and start the instance

require __DIR__ . '/vendor/autoload.php';

// Compute engine auth
$client = new Google_Client();
$client->setAuth(new Google_Auth_AppIdentity($client));
$client->getAuth()
    ->authenticateForScope('https://www.googleapis.com/auth/compute');

$client->setApplicationName("Ignition");
$client->setClassConfig('Google_Http_Request', 'disable_gzip', true);

$service = new Google_Service_Compute($client); ?>

<pre>
  <?php
    $reset = $service->instances->start($PROJECT_NAME, $ZONE, $keys[$_REQUEST["key"]]);
    print_r($reset);
  ?>
</pre>
<?php

$results = $service->instances->getInstances();

print_r($results);
