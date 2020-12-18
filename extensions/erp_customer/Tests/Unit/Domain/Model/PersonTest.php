<?php
declare(strict_types=1);
namespace WEBprofil\ErpCustomer\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class PersonTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \WEBprofil\ErpCustomer\Domain\Model\Person
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \WEBprofil\ErpCustomer\Domain\Model\Person();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getFirstNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFirstName()
        );
    }

    /**
     * @test
     */
    public function setFirstNameForStringSetsFirstName()
    {
        $this->subject->setFirstName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'firstName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLastNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getLastName()
        );
    }

    /**
     * @test
     */
    public function setLastNameForStringSetsLastName()
    {
        $this->subject->setLastName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'lastName',
            $this->subject
        );
    }
}
