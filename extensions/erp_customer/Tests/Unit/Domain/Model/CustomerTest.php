<?php
declare(strict_types=1);
namespace WEBprofil\ErpCustomer\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class CustomerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \WEBprofil\ErpCustomer\Domain\Model\Customer
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \WEBprofil\ErpCustomer\Domain\Model\Customer();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAddressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAddress()
        );
    }

    /**
     * @test
     */
    public function setAddressForStringSetsAddress()
    {
        $this->subject->setAddress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'address',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPersonsReturnsInitialValueForPerson()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPersons()
        );
    }

    /**
     * @test
     */
    public function setPersonsForObjectStorageContainingPersonSetsPersons()
    {
        $person = new \WEBprofil\ErpCustomer\Domain\Model\Person();
        $objectStorageHoldingExactlyOnePersons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePersons->attach($person);
        $this->subject->setPersons($objectStorageHoldingExactlyOnePersons);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOnePersons,
            'persons',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addPersonToObjectStorageHoldingPersons()
    {
        $person = new \WEBprofil\ErpCustomer\Domain\Model\Person();
        $personsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $personsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($person));
        $this->inject($this->subject, 'persons', $personsObjectStorageMock);

        $this->subject->addPerson($person);
    }

    /**
     * @test
     */
    public function removePersonFromObjectStorageHoldingPersons()
    {
        $person = new \WEBprofil\ErpCustomer\Domain\Model\Person();
        $personsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $personsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($person));
        $this->inject($this->subject, 'persons', $personsObjectStorageMock);

        $this->subject->removePerson($person);
    }
}
