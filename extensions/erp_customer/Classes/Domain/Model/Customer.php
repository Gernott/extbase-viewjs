<?php
declare(strict_types=1);

namespace WEBprofil\ErpCustomer\Domain\Model;


/***
 *
 * This file is part of the "Customer" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 
 *
 ***/
/**
 * Customer
 */
class Customer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Name
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * Address
     * 
     * @var string
     */
    protected $address = '';

    /**
     * Persons
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WEBprofil\ErpCustomer\Domain\Model\Person>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $persons = null;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initializeObject()
    {
        $this->persons = $this->persons ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the address
     * 
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     * 
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Adds a Person
     * 
     * @param \WEBprofil\ErpCustomer\Domain\Model\Person $person
     * @return void
     */
    public function addPerson(\WEBprofil\ErpCustomer\Domain\Model\Person $person)
    {
        $this->persons->attach($person);
    }

    /**
     * Removes a Person
     * 
     * @param \WEBprofil\ErpCustomer\Domain\Model\Person $personToRemove The Person to be removed
     * @return void
     */
    public function removePerson(\WEBprofil\ErpCustomer\Domain\Model\Person $personToRemove)
    {
        $this->persons->detach($personToRemove);
    }

    /**
     * Returns the persons
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WEBprofil\ErpCustomer\Domain\Model\Person> $persons
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Sets the persons
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WEBprofil\ErpCustomer\Domain\Model\Person> $persons
     * @return void
     */
    public function setPersons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $persons)
    {
        $this->persons = $persons;
    }
}
