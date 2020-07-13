<?php

  require_once ("./getProperties.php");
  require_once ("./dbOperation.php");

  function init()
  {
    $properties = getAllProperties();
    foreach ($properties as $property){
      insertProperty($property);
    }
  }

  init();

  echo "<script>location.replace(\"./index.php\")</script>";
