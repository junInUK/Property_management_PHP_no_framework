<?php

namespace PHPTestException;

class Property
{
	private $uuid;
	private $county;
	private $country;
	private $town;
	private $postcode;
	private $desc;			//	full description
	private $address;
	private $imageFull;		//	full image address
	private $imageThumbnail;	//	image thumbnail address
	private $numBedrooms;
	private $numBathrooms;
	private $price;
	private $propertyType;		//	flat/detached house/semi-detached/villa
	private $propertyStatus;	//	for sale/for rent

	public function __construct(
		string $uuid,
		string $county,
		string $country,
		string $town,
	        string $desc,
		string $address,
		string $imageFull,
		string $imageThumbnail,
		int $numBedrooms,
		int $numBathrooms,
		int $price,
		int $propertyType,
		int $propertyStatus)
	{
		$this->uuid = $uuid;
		$this->county = $county;
		$this->country = $country;
		$this->town = $town;
		$this->desc = $desc;
		$this->address = $address;
		$this->imageFull = $imageFull;
		$this->imageThumbnail = $imageThumbnail;
		$this->numBedrooms = $numBedrooms;
		$this->numBathrooms = $numBathrooms;
		$this->price = $price;
		$this->propertyType = $propertyType;
		$this->propertyStatus = $propertyStatus;
	}

	public function get_uuid()
	{
		return $this->uuid;
	}

	public function get_county()
	{
		return $this->county;
	}

	public function get_country()
	{
		return $this->country;
	}

	public function get_town()
	{
		return $this->town;
	}

	public function get_desc()
	{
		return $this->desc;
	}

	public function get_address()
	{
		return $this->address;
	}

	public function get_imageFull()
	{
		return $this->imageFull;
	}

	public function get_imageThumbnail()
	{
		return $this->imageThumbnail;
	}

	public function get_numBedrooms()
	{
		return $this->numBedrooms;
	}

	public function get_numBathrooms()
	{
		return $this->numBathrooms;
	}

	public function get_price()
	{
		return $this->price;
	}

	public function get_propertyType()
	{
		return $this->propertyType;
	}

	public function get_propertyStatus()
	{
		return $this->propertyStatus;
	}

}
