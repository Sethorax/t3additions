<?php

// Add an entry in the static template list found in sys_templates for static TS
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    't3additions',
    'Configuration/TypoScript',
    'T3 Additions'
);