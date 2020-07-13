<?php
require_once ("./Property.php");

use PHPTestException\Property;

function getAllProperties()
{
	try{
		$json = NULL;
		$url = "http://trialapi.craig.mtcdevserver.com/api/properties?api_key=3NLTTNlXsi6rBWl7nYGluOdkl2htFHug";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec($ch);

		if($json != NULL){
			$result = json_decode($json);
			$data = $result->data;
			$arrProperties = array();
			$tmpProperty = NULL;
			foreach ($data as $property){
				$tmpProperty = new Property(
		      $property->uuid,
		      $property->county,
		      $property->country,
		  		$property->town,
		  		$property->description,
		  	  $property->address,
		  		$property->image_full,
		      $property->image_thumbnail,
		  		$property->num_bedrooms,
		  		$property->num_bathrooms,
		  		$property->price,
		      $property->property_type_id,
		  		1);

				array_push($arrProperties, $tmpProperty);
			}
		}else{
			echo "curl request error.";
		}

		curl_close($ch);

		return $arrProperties;
	}catch(Exception $e){
		echo "Exception: " . $e->getMessage();
		return NULL;
	}

}
