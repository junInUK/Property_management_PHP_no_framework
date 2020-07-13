<?php declare(strict_types=1);

require_once realpath("vendor/autoload.php");

use PHPUnit\Framework\TestCase;

final class DBOperationTest extends TestCase
{
  public function testCanTestStringEqual(): void
  {
      $this->assertEquals('john', 'john');
  }

  public function testCanDeleteProperty(): void
  {
    $this->assertEquals('d8d9c545-3832-3d85-a25a-aac181479be7', $property->get_uuid());
  }

}
