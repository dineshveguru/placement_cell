<?php
   include_once $_SERVER['DOCUMENT_ROOT'].'/placement_cell/firebase_db/vendor/autoload.php';

   use Kreait\Firebase\Factory;
   use Kreait\Firebase\ServiceAccount;

   // This assumes that you have placed the Firebase credentials in the same directory
   // as this PHP file.
   $serviceAccount = ServiceAccount::fromJsonFile($_SERVER['DOCUMENT_ROOT'].'/placement_cell/firebase_db/placement-cell-jntuacep-firebase-adminsdk-8b0xl-c147a657d0.json');
   $firebase = (new Factory)
      ->withServiceAccount($serviceAccount)
      ->withDatabaseUri('https://placement-cell-jntuacep-default-rtdb.firebaseio.com')
      ->create();
      
   $database = $firebase->getDatabase();
?>