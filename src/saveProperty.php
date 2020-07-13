<?php

  require_once ("./Property.php");
  require_once ("./dbOperation.php");
  require_once ("./utility.php");

  use PHPTestException\Property;

  $imagePath = myUploadFile($_FILES);

  $property = new Property(
   	  uniqid(),
      $_POST["county"],
      $_POST["country"],
      $_POST["town"],
      $_POST["description"],
      $_POST["address"],
      $imagePath,
      $imagePath,
      $_POST["numBedrooms"],
      $_POST["numBathrooms"],
      $_POST["price"],
      $_POST["propertyType"],
   	  1);

  insertProperty($property);
  
  echo "<script>location.replace(\"./index.php\")</script>";
