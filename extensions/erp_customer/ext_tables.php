<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'ErpCustomer',
            'Customer',
            'Customer'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('erp_customer', 'Configuration/TypoScript', 'Customer');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_erpcustomer_domain_model_customer', 'EXT:erp_customer/Resources/Private/Language/locallang_csh_tx_erpcustomer_domain_model_customer.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_erpcustomer_domain_model_customer');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_erpcustomer_domain_model_person', 'EXT:erp_customer/Resources/Private/Language/locallang_csh_tx_erpcustomer_domain_model_person.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_erpcustomer_domain_model_person');

    }
);
