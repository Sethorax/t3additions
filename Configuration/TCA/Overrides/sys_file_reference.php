<?php
defined('TYPO3_MODE') or die();

$ll = 'LLL:EXT:t3additions/Resources/Private/Language/locallang_db.xlf:';

/**
 * Add extra fields to sys_file_reference record
 */
$newColumns = [
    't3additions_map_normal_width' => [
        'exclude' => 1,
        'label' => $ll . 'sys_file_reference.map.normalWidth',
        'config' => [
            'type' => 'input',
            'eval' => 'required,int'
        ]
    ],
    't3additions_map_normal_height' => [
        'exclude' => 1,
        'label' => $ll . 'sys_file_reference.map.normalHeight',
        'config' => [
            'type' => 'input',
            'eval' => 'required,int'
        ]
    ],
    't3additions_map_scaled_width' => [
        'exclude' => 1,
        'label' => $ll . 'sys_file_reference.map.scaledWidth',
        'config' => [
            'type' => 'input',
            'eval' => 'required,int'
        ]
    ],
    't3additions_map_scaled_height' => [
        'exclude' => 1,
        'label' => $ll . 'sys_file_reference.map.scaledHeight',
        'config' => [
            'type' => 'input',
            'eval' => 'required,int'
        ]
    ]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file_reference', $newColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('sys_file_reference', 't3additionsMapPalette', 't3additions_map_normal_width, t3additions_map_normal_height, --linebreak--, t3additions_map_scaled_width, t3additions_map_scaled_height');