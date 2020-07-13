<?php
// namespace PHPTestException;

// require_once ("./getProperties.php");
require_once ("./Property.php");

use PHPTestException\Property;

function connectDB()
{
	$servername = "localhost";
	$username = "root";
	$password = "123456uk";
	$dbname = "jun_test";

	$options = [
		PDO::ATTR_EMULATE_PREPARES   => false,	// turn off emulation mode for "real" prepared statements
		PDO::ATTR_ERRMODE	     => PDO::ERRMODE_EXCEPTION,	// turn on errors in the form of exceptions
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,	// make the default fetch be an associative array
	];
	try{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
		return $conn;
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		return NULL;
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		return NULL;
	}
}

function disconnectDB($conn)
{
	$conn = null;
}

function insertProperty(Property $property)
{
	try{
		$conn = connectDB();
		$stmt = $conn->prepare("INSERT INTO Properties(uuid,
			 																						county,
																									country,
																									town,
																									description,
																									address,
																									imageFull,
																									imageThumbnail,
																									numBedrooms,
																									numBathrooms,
																									price,
																									propertyType)
																									VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$stmt->bindValue(1, $property->get_uuid(), PDO::PARAM_STR);
		$stmt->bindValue(2, $property->get_county(), PDO::PARAM_STR);
		$stmt->bindValue(3, $property->get_country(), PDO::PARAM_STR);
		$stmt->bindValue(4, $property->get_town(), PDO::PARAM_STR);
		$stmt->bindValue(5, $property->get_desc(), PDO::PARAM_STR);
		$stmt->bindValue(6, $property->get_address(), PDO::PARAM_STR);
		$stmt->bindValue(7, $property->get_imageFull(), PDO::PARAM_STR);
		$stmt->bindValue(8, $property->get_imageThumbnail(), PDO::PARAM_STR);
		$stmt->bindValue(9, $property->get_numBedrooms(), PDO::PARAM_INT);
		$stmt->bindValue(10, $property->get_numBathrooms() , PDO::PARAM_INT);
		$stmt->bindValue(11, $property->get_price(), PDO::PARAM_INT);
		$stmt->bindValue(12, $property->get_propertyType(), PDO::PARAM_INT);
		$stmt->execute();
		$stmt = null;
		disconnectDB($conn);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
	}

}

function deleteProperty(String $uuid)
{
	try{
		$conn = connectDB();
		$stmt = $conn->prepare("DELETE FROM Properties WHERE uuid = ?");
		$stmt->bindValue(1, $uuid, PDO::PARAM_INT);
		$stmt->execute();
		$stmt = null;
		disconnectDB($conn);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
	}
}

function deleteAllProperties()
{
	try{
		$conn = connectDB();
		$stmt = $conn->prepare("DELETE FROM Properties");
		$stmt->execute();
		$stmt = null;
		disconnectDB($conn);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
	}
}

function getAllPropertiesFromDB()
{

	try{
		$conn = connectDB();
		$stmt = $conn->prepare("SELECT uuid,
																	county,
																	country,
																	town,
																	description,
																	address,
																	imageFull,
																	imageThumbnail,
																	numBedrooms,
																	numBathrooms,
																	price,
																	propertyType FROM Properties");
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$i = 0;
		$arrProperties = array();
		$tmpProperty = NULL;

		foreach($stmt->fetchAll() as $property){

			$tmpProperty = new Property(
				$property["uuid"],
				$property["county"],
				$property["country"],
				$property["town"],
				$property["description"],
				$property["address"],
				$property["imageFull"],
				$property["imageThumbnail"],
				$property["numBedrooms"],
				$property["numBathrooms"],
				$property["price"],
				$property["propertyType"],
				1);

			array_push($arrProperties, $tmpProperty);
		}
		$stmt = null;
		disconnectDB($conn);
		return $arrProperties;
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
		return NULL;
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
		return NULL;
	}
}

function getPropertyFromDB($uuid)
{
	try{
		$conn = connectDB();
		$stmt = $conn->prepare("SELECT uuid,
																	county,
																	country,
																	town,
																	description,
																	address,
																	imageFull,
																	imageThumbnail,
																	numBedrooms,
																	numBathrooms,
																	price,
																	propertyType
														FROM Properties
														WHERE uuid = ?");
		$stmt->bindValue(1, $uuid, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch();

		$tmpProperty = NULL;
		$tmpProperty = new Property(
			$result["uuid"],
			$result["county"],
			$result["country"],
			$result["town"],
			$result["description"],
			$result["address"],
			$result["imageFull"],
			$result["imageThumbnail"],
			$result["numBedrooms"],
			$result["numBathrooms"],
			$result["price"],
			$result["propertyType"],
			1);

		$stmt = null;
		disconnectDB($conn);
		return $tmpProperty;
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
		return NULL;
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
		return NULL;
	}
}

function updateProperty(Property $property)
{
	try{
		$conn = connectDB();
		$stmt = $conn->prepare("UPDATE Properties SET
															county = ? ,
															country = ? ,
															town = ? ,
															description = ? ,
															address = ? ,
															imageFull = ? ,
															imageThumbnail = ? ,
															numBedrooms = ? ,
															numBathrooms = ? ,
															price = ? ,
															propertyType = ?
														WHERE uuid = ?");

		$stmt->bindValue(1, $property->get_county(), PDO::PARAM_STR);
		$stmt->bindValue(2, $property->get_country(), PDO::PARAM_STR);
		$stmt->bindValue(3, $property->get_town(), PDO::PARAM_STR);
		$stmt->bindValue(4, $property->get_desc(), PDO::PARAM_STR);
		$stmt->bindValue(5, $property->get_address(), PDO::PARAM_STR);
		$stmt->bindValue(6, $property->get_imageFull(), PDO::PARAM_STR);
		$stmt->bindValue(7, $property->get_imageThumbnail(), PDO::PARAM_STR);
		$stmt->bindValue(8, $property->get_numBedrooms(), PDO::PARAM_INT);
		$stmt->bindValue(9, $property->get_numBathrooms() , PDO::PARAM_INT);
		$stmt->bindValue(10, $property->get_price(), PDO::PARAM_INT);
		$stmt->bindValue(11, $property->get_propertyType(), PDO::PARAM_INT);
		$stmt->bindValue(12, $property->get_uuid(), PDO::PARAM_STR);
		$stmt->execute();
		$stmt = null;
		disconnectDB($conn);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
	}

}
