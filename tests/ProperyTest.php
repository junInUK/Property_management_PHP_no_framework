<?php declare(strict_types=1);

require_once realpath("vendor/autoload.php");

use PHPTestException\Property;
use PHPUnit\Framework\TestCase;

final class ProperyTest extends TestCase
{
  public function testCanTestStringEqual(): void
  {
      $this->assertEquals('john', 'john');
  }

  public function testCanGetUUID(): void
  {
    $property = new Property(
      "d8d9c545-3832-3d85-a25a-aac181479be7",
      "countr",
      "country",
  		"town",
  		"description",
  	  "address",
  		"imageFull",
      "imageThumbnail",
  		1,
  		1,
  		180000,
      1,
  		1);
    $this->assertEquals('d8d9c545-3832-3d85-a25a-aac181479be7', $property->get_uuid());

  }

}
