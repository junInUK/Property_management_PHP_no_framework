<?php
require_once ("./dbOperation.php");

$uuid = $_GET['uuid'];
$property = getPropertyFromDB($uuid);
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
echo "<div class=\"card-header\">Property</div>";
echo "<div class=\"card-body\">";
echo "<form action=\"updateProperty.php\" enctype=\"multipart/form-data\" onsubmit=\"return validateForm()\" method=\"POST\" name=\"updateProperty\">";

echo "<input type=\"hidden\" name=\"uuid\" value=\"".$uuid."\" id=\"uuid\"/>";

echo "<div class=\"-group\">";
echo "<label for=\"county\">County:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"county\" value=\"" .$property->get_county(). "\" id=\"county\"/>";
echo "</div>";  //  end of div.form-group

echo "<div class=\"form-group\">";
echo "<label for=\"country\">Country:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"country\" value=\"" .$property->get_country(). "\" id=\"country\"/>";
echo "</div>";  //  end of div.form-group

echo "<div class=\"form-group\">";
echo "<label for=\"town\">Town:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"town\" value=\"" .$property->get_town(). "\" id=\"town\"/>";
echo "</div>";  //  end of div.form-group

echo "<div class=\"form-group\">";
echo "<label for=\"description\">Description:</label>";
echo "<textarea name=\"description\" id=\"description\" cols=\"5\" rows=\"5\" class=\"form-control\">";
echo $property->get_desc();
echo "</textarea>";
echo "</div>";  //  end of div.form-group

echo "<div class=\"form-group\">";
echo "<label for=\"address\">Address:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"address\" value=\"" .$property->get_address(). "\" id=\"address\"/>";
echo "</div>";  //  end of div.form-group

echo "<div class=\"form-group\">";
echo "<label for=\"image\">Image:</label>";
echo "<img src=\"". $property->get_imageFull(). "\" style=\"width: 100%\">";
echo "<input type=\"file\" class=\"form-control\" name=\"image\" id=\"image\">";
echo "<input type=\"hidden\" name=\"oldImageSrc\" value=\"" . $property->get_imageFull() . "\" id=\"oldImageSrc\" />";
echo "</div>";  //  end of div.form-group

echo "<div class=\"form-group\">";
echo "<label for=\"numBedrooms\">Number of BedRooms:</label>";
echo "<input type=\"number\" class=\"form-control\" name=\"numBedrooms\" value=\"" .$property->get_numBedrooms(). "\" id=\"numBedrooms\"/>";
echo "</div>";  //  end of div.form-group

echo "<div class=\"form-group\">";
echo "<label for=\"numBathrooms\">Number of BathRooms:</label>";
echo "<input type=\"number\" class=\"form-control\" name=\"numBathrooms\" value=\"" .$property->get_numBathrooms(). "\" id=\"numBathrooms\"/>";
echo "</div>";  //  end of div.form-group

echo "<div class=\"form-group\">";
echo "<label for=\"price\">Price:</label>";
echo "<input type=\"price\" class=\"form-control\" name=\"price\" value=\"" .$property->get_price(). "\" id=\"price\"/>";
echo "</div>";  //  end of div.form-group

echo "<div class=\"form-group\">";
echo "<label for=\"propertyType\">Property Type:</label>";
echo "<input type=\"number\" class=\"form-control\" name=\"propertyType\" value=\"" .$property->get_propertyType(). "\" id=\"propertyType\"/>";
echo "</div>";  //  end of div.form-group

// echo "<div class=\"form-group\">";
// echo "<label for=\"numBathrooms\">Number of BathRooms:</label>";
// echo "<input type=\"number\" class=\"form-control\" name=\"numBathrooms\" value=\"" .$property->get_numBathrooms(). "\" id=\"numBathrooms\"/>";
// echo "</div>";  //  end of div.form-group

echo "<div class=\"form-group\">";
echo "<button type=\"submit\" class=\"btn btn-success\">";
echo "Update";
echo "</button>";
echo "</div>";  //  end of div.form-group

echo "</form>";



echo "</div>";  //  end of div.card-body
echo "</div>";  //  end of div.card.card-default
echo "</div>";  //  end of div.col-md-8

echo "</div>";  //  end of div.row
echo "</div>";  //  end of div.container
?>

  <script>

    $("#nav").load("nav.html");

    function validateForm() {
      let county        = document.forms["updateProperty"]["county"].value;
      let jcounty       = $.trim(county);
      let country       = document.forms["updateProperty"]["country"].value;
      let jcountry      = $.trim(country);
      let town          = document.forms["updateProperty"]["town"].value;
      let jtown         = $.trim(town);
      let description   = document.forms["updateProperty"]["description"].value;
      let jdescription  = $.trim(description);
      let address       = document.forms["updateProperty"]["address"].value;
      let jaddress      = $.trim(address);
      //let image         = document.forms["updateProperty"]["image"].value;
      let numBedrooms   = document.forms["updateProperty"]["numBedrooms"].value;
      let numBathrooms  = document.forms["updateProperty"]["numBathrooms"].value;
      let price         = document.forms["updateProperty"]["price"].value;
      let propertyType  = document.forms["updateProperty"]["propertyType"].value;
      //
      if ( "" == jcounty ){
        alert("County must be filled out.");
        return false;
      }
      if( "" == jcountry ){
        alert("Country must be filled out.");
        return false;
      }
      if( "" == jtown ){
        alert("Town must be filled out.");
        return false;
      }
      if( "" == jdescription ){
        alert("Description must be filled out.");
        return false;
      }
      if( "" == jaddress ){
        alert("Address must be filled out.");
        return false;
      }
      // // if( "" == image ){
      // //   alert("Image must been chosen.");
      // //   return false;
      // // }
      if( "" == numBedrooms || numBedrooms < 0){
        alert("Number of bedrooms must be great than zero or equal to zero.");
        return false;
      }
      if( "" == numBathrooms || numBathrooms < 0){
        alert("Number of bathrooms must be great than zero or equal to zero.");
        return false;
      }
      if( "" == price || price < 0){
        alert("Price must be great than zero or equal to zero.");
        return false;
      }
    }
  </script>

</body>
