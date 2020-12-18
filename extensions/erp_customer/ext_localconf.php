<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'ErpCustomer',
            'Customer',
            [
                \WEBprofil\ErpCustomer\Controller\CustomerController::class => 'list, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                \WEBprofil\ErpCustomer\Controller\CustomerController::class => 'create, update, delete'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        customer {
                            iconIdentifier = erp_customer-plugin-customer
                            title = LLL:EXT:erp_customer/Resources/Private/Language/locallang_db.xlf:tx_erp_customer_customer.name
                            description = LLL:EXT:erp_customer/Resources/Private/Language/locallang_db.xlf:tx_erp_customer_customer.description
                            tt_content_defValues {
                                CType = list
                                list_type = erpcustomer_customer
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'erp_customer-plugin-customer',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:erp_customer/Resources/Public/Icons/user_plugin_customer.svg']
			);
		
    }
);
