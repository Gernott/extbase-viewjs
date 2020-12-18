<?php
declare(strict_types=1);

namespace WEBprofil\ErpCustomer\Controller;


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
 * CustomerController
 */
class CustomerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * customerRepository
     * 
     * @var \WEBprofil\ErpCustomer\Domain\Repository\CustomerRepository
     */
    protected $customerRepository = null;

    /**
     * @param \WEBprofil\ErpCustomer\Domain\Repository\CustomerRepository $customerRepository
     */
    public function injectCustomerRepository(\WEBprofil\ErpCustomer\Domain\Repository\CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $customers = $this->customerRepository->findAll();
        $this->view->assign('customers', $customers);
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * action create
     * 
     * @param \WEBprofil\ErpCustomer\Domain\Model\Customer $newCustomer
     * @return void
     */
    public function createAction(\WEBprofil\ErpCustomer\Domain\Model\Customer $newCustomer)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->customerRepository->add($newCustomer);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \WEBprofil\ErpCustomer\Domain\Model\Customer $customer
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("customer")
     * @return void
     */
    public function editAction(\WEBprofil\ErpCustomer\Domain\Model\Customer $customer)
    {
        $this->view->assign('customer', $customer);
    }

    /**
     * action update
     * 
     * @param \WEBprofil\ErpCustomer\Domain\Model\Customer $customer
     * @return void
     */
    public function updateAction(\WEBprofil\ErpCustomer\Domain\Model\Customer $customer)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->customerRepository->update($customer);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \WEBprofil\ErpCustomer\Domain\Model\Customer $customer
     * @return void
     */
    public function deleteAction(\WEBprofil\ErpCustomer\Domain\Model\Customer $customer)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->customerRepository->remove($customer);
        $this->redirect('list');
    }
}
