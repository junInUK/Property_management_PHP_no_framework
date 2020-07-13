<?php
  namespace PHPTestException;

  require_once ("./dbOperation.php");

  $properties = getAllPropertiesFromDB($connect);
  echo "<!DOCTYPE html>";
  echo "<html lang=\"en\" dir=\"ltr\">";
  echo "<head>";
  echo "<meta charset=\"utf-8\">";
  echo "<title>Property Management</title>";
  echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>";
  echo "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css\" integrity=\"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk\" crossorigin=\"anonymous\">";
  echo "</head>";
  echo "<body>";
  echo "<div class=\"container\">";
  echo "<div class=\"row\">";
  echo "<div id=\"nav\" class=\"col-md-4\"></div>";

  echo "<div class=\"col-md-8\">";
  echo "<div class=\"card card-default\">";
  echo "<div class=\"card-header\">Properties(";
  echo count($properties);
  echo ")</div>"; //  end of div.card-header
  echo "<div class=\"card-body\">";
  echo "<table class=\"table\">";
  echo "<thead>";
  echo "<td>Images</td>";
  echo "<td>Address</td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($properties as $property){
    echo "<tr>";
    echo "<td>";
    echo "<img src=\"".$property->get_imageThumbnail()."\" width=\"60px\" height=\"60px\">";
    echo "</td>";
    echo "<td>";
    echo $property->get_address();
    echo "</td>";
    echo "<td>";
    echo "<a href=\"viewProperty.php?uuid=" . $property->get_uuid() . "\" class=\"btn btn-info btn-sm\">View</a>";
    echo "</td>";
    echo "<td>";
    echo "<form action=\"deleteProperty.php\" method=\"POST\" >";
    echo "<input type=\"hidden\" name=\"uuid\" value=\"" .$property->get_uuid() ."\" id=\"uuid\"/>";
    echo "<button type=\"submit\" class=\"btn btn-danger btn-sm\">";
    echo "Del";
    echo "</button>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";   //  end of table.table
  echo "</div>";  //  end of div.card-body
  echo "</div>";  //  end of div.card.card-default
  echo "</div>";  //  end of div.col-md-8

  echo "</div>";  //  end of div.row
  echo "</div>";  //  end of div.container

?>

  <script>
    $("#nav").load("nav.html");
  </script>

</body>
