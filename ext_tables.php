<?php
defined('TYPO3_MODE') or die();

call_user_func(
    function ($extKey) {
        // Allow records to be added inline in content elements
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3additions_domain_model_marker');
    },
    $_EXTKEY
);