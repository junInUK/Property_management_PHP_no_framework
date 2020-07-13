<?php declare(strict_types=1);

/**
 * EmailTest class
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <author@example.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */


require_once realpath("vendor/autoload.php");

use PHPTestException\Email;
use PHPUnit\Framework\TestCase;


/**
 * EmailTest
 */
final class EmailTest extends TestCase
{

    /**
     * Function testCanBeCreatedFromValidEmailAddress
     *
     * @return void
     */
    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $this->assertInstanceOf(Email::class, Email::fromString('user@example.com'));
    }

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Email::fromString('john');
    }


    /**
     * Function testCanBeUsedAsString
     *
     * @return void
     */
    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals('john@hotmail.com', Email::fromString('john@hotmail.com'));
    }

    public function testCanGetString(): void
    {
      $email = new Email("sam@hotmail.com");
      $this->assertEquals('sam@hotmail.com', $email->__toString());
    }

}
