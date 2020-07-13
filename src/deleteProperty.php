<?php

  require_once ("./dbOperation.php");

  deleteProperty($_POST["uuid"]);

  echo "<script>location.replace(\"./index.php\")</script>";
