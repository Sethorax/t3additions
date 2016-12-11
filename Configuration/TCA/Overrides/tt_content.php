<?php

defined('TYPO3_MODE') or die();

call_user_func(function () {
    // Language file
    $ll = 'LLL:EXT:t3additions/Resources/Private/Language/locallang_db.xlf:';

    // Add CType Spacer for t3additions items
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'Additions',
            '--div--',
        ]
    );

    // Add CType for menu
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $ll . 'ce_wizard.menu.title',
            't3additions_menu',
            'content-t3additions-menu'
        ]
    );

    // Add CType for map
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $ll . 'ce_wizard.map.title',
            't3additions_map',
            'content-t3additions-map'
        ]
    );

    // Add CType for socialwall
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $ll . 'ce_wizard.socialwall.title',
            't3additions_socialwall',
            'content-t3additions-socialwall'
        ]
    );

    // Add CType for button
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $ll . 'ce_wizard.button.title',
            't3additions_button',
            'content-t3additions-button'
        ]
    );

    // Add CType for cookie notice
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $ll . 'ce_wizard.cookienotice.title',
            't3additions_cookienotice',
            'content-t3additions-cookienotice'
        ]
    );


    // Configure the default backend fields for t3additions_menu
    $GLOBALS['TCA']['tt_content']['types']['t3additions_menu'] = array(
        'showitem' => '
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
            --palette--;' . $ll . 'tt_content.palettes.menu.general;t3additions_menu_general,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
    ');

    // Configure the default backend fields for t3additions_map
    $GLOBALS['TCA']['tt_content']['types']['t3additions_map'] = array(
        'showitem' => '
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
            --palette--;' . $ll . 'tt_content.palettes.map.general;t3additions_map_general,
        --div--;' . $ll . 'tt_content.tabs.map.marker,
            --palette--;;t3additions_map_markers,
         --div--;' . $ll . 'tt_content.tabs.map.advanced,
            --palette--;;t3additions_map_advanced,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
    ');

    // Configure the default backend fields for t3additions_socialwall
    $GLOBALS['TCA']['tt_content']['types']['t3additions_socialwall'] = array(
        'showitem' => '
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
            --palette--;' . $ll . 'tt_content.palettes.socialwall.general;t3additions_socialwall_general,
        --div--;' . $ll . 'tt_content.tabs.socialwall.facebook,
            --palette--;;t3additions_socialwall_facebook,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
    ');

    // Configure the default backend fields for t3additions_button
    $GLOBALS['TCA']['tt_content']['types']['t3additions_button'] = array(
        'showitem' => '
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
            --palette--;' . $ll . 'tt_content.palettes.button.general;t3additions_button_general,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
    ');

    // Configure the default backend fields for t3additions_cookienotice
    $GLOBALS['TCA']['tt_content']['types']['t3additions_cookienotice'] = array(
        'showitem' => '
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
            --palette--;' . $ll . 'tt_content.palettes.cookienotice.general;t3additions_cookienotice_general,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
         --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
    ');


    // Add columns
    $additionalColumns = [
        // Menu
        't3additions_menu_depth' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.menu.depth',
            'config' => [
                'type' => 'input',
                'eval' => 'trim, int, required',
                'max' => 99,
            ]
        ],
        't3additions_menu_rootpage' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.menu.rootpage',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'eval' => 'required',
                'maxitems' => 1,
                'size' => 1,
                'wizards' => [
                    'suggest' => [
                        'type' => 'suggest',
                        'default' => [
                            'searchWholePhrase' => 1
                        ],
                        'pages' => [
                            'searchCondition' => 'doktype = 1'
                        ]
                    ]
                ]
            ]
        ],
        't3additions_menu_show_hidden' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.menu.showHidden',
            'config' => [
                'type' => 'check',
                'default' => '1'
            ]
        ],
        't3additions_menu_exclude_pages' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.menu.excludePages',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'maxitems' => 99,
                'size' => 3,
                'wizards' => [
                    'suggest' => [
                        'type' => 'suggest',
                        'default' => [
                            'searchWholePhrase' => 1
                        ],
                    ]
                ]
            ]
        ],
        // Map
        't3additions_map_center_lat' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.map.centerLat',
            'config' => [
                'type' => 'input',
                'eval' => 'trim, is_in, required',
                'is_in' => '1234567890.'
            ]
        ],
        't3additions_map_center_lng' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.map.centerLng',
            'config' => [
                'type' => 'input',
                'eval' => 'trim, is_in, required',
                'is_in' => '1234567890.'
            ]
        ],
        't3additions_map_zoom' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.map.zoom',
            'config' => [
                'type' => 'input',
                'size' => 2,
                'eval' => 'trim,int',
                'range' => [
                    'lower' => 1,
                    'upper' => 30
                ],
                'default' => 12,
                'wizards' => [
                    'angle' => [
                        'type' => 'slider',
                        'step' => 1,
                        'width' => 150
                    ]
                ]

            ]
        ],
        't3additions_map_fit_bounds' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.map.fitBounds',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        't3additions_map_markers' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.map.marker',
            'config' => [
                'type' => 'inline',
                'allowed' => 'tx_t3additions_domain_model_marker',
                'foreign_table' => 'tx_t3additions_domain_model_marker',
                'foreign_sortby' => 'sorting',
                'foreign_field' => 'parent',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 100,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showRemovedLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                    'showSynchronizationLink' => 1,
                    'enabledControls' => [
                        'info' => false,
                    ]
                ]
            ]
        ],
        't3additions_map_styles' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.map.styles',
            'config' => [
                'type' => 'text',
                'renderType' => 't3editor',
                'format' => 'javascript',
                'default' =>
'[
  {
    "_comment": "Style goes here..."
  }
]'
            ]
        ],
        // Social Wall
        't3additions_socialwall_length' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.socialwall.length',
            'config' => [
                'type' => 'input',
                'eval' => 'required, int',
            ]
        ],
        't3additions_socialwall_show_media' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.socialwall.showMedia',
            'config' => [
                'type' => 'check',
                'default' => '1'
            ]
        ],
        't3additions_socialwall_facebook_accounts' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.socialwall.facebook_accounts',
            'config' => [
                'type' => 'text',
                'eval' => 'required'
            ]
        ],
        't3additions_socialwall_facebook_limit' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.socialwall.facebook_limit',
            'config' => [
                'type' => 'input',
                'eval' => 'required, int',
            ]
        ],
        't3additions_socialwall_facebook_access_token' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.socialwall.facebook_accessToken',
            'config' => [
                'type' => 'input',
                'eval' => 'required'
            ]
        ],
        // Button
        't3additions_button_label' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.button.label',
            'config' => [
                'type' => 'input',
                'eval' => 'required'
            ]
        ],
        't3additions_button_link' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.button.link',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'wizards' => [
                    'link' => [
                        'type' => 'popup',
                        'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link_formlabel',
                        'icon' => 'actions-wizard-link',
                        'module' => [
                            'name' => 'wizard_link',
                        ],
                        'JSopenParams' => 'width=800,height=600,status=0,menubar=0,scrollbars=1'
                    ]
                ],
                'softref' => 'typolink'
            ]
        ],
        // Cookie Notice
        't3additions_cookienotice_message' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.cookienotice.message',
            'config' => [
                'type' => 'text',
                'eval' => 'required',
                'cols' => 40,
                'rows' => 6
            ],
            'defaultExtras' => 'richtext[]'
        ],
        't3additions_cookienotice_show_more_info' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.cookienotice.showMoreInfo',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        't3additions_cookienotice_more_info_label' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.cookienotice.moreInfoLabel',
            'config' => [
                'type' => 'input',
                'eval' => 'required'
            ],
            'displayCond' => [
                'OR' => [
                    'FIELD:t3additions_cookienotice_show_more_info:REQ:true'
                ]
            ]
        ],
        't3additions_cookienotice_accept_label' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.cookienotice.acceptLabel',
            'config' => [
                'type' => 'input',
                'eval' => 'required'
            ]
        ],
        't3additions_cookienotice_link' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.fields.cookienotice.link',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim, required',
                'wizards' => [
                    'link' => [
                        'type' => 'popup',
                        'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link_formlabel',
                        'icon' => 'actions-wizard-link',
                        'module' => [
                            'name' => 'wizard_link',
                        ],
                        'JSopenParams' => 'width=800,height=600,status=0,menubar=0,scrollbars=1'
                    ]
                ],
                'softref' => 'typolink'
            ],
            'displayCond' => [
                'OR' => [
                    'FIELD:t3additions_cookienotice_show_more_info:REQ:true'
                ]
            ]
        ],
    ];


    // Add TCA columns and add those fields to the palettes
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 't3additions_menu_general', 't3additions_menu_depth, t3additions_menu_show_hidden, --linebreak--, t3additions_menu_rootpage, t3additions_menu_exclude_pages');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 't3additions_map_general', 't3additions_map_center_lat, t3additions_map_center_lng, --linebreak--, t3additions_map_zoom, t3additions_map_fit_bounds');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 't3additions_map_markers', 't3additions_map_markers');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 't3additions_map_advanced', 't3additions_map_styles');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 't3additions_socialwall_general', 't3additions_socialwall_length, t3additions_socialwall_show_media');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 't3additions_socialwall_facebook', 't3additions_socialwall_facebook_limit, t3additions_socialwall_facebook_access_token, --linebreak--, t3additions_socialwall_facebook_accounts');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 't3additions_button_general', 't3additions_button_label, t3additions_button_link');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 't3additions_cookienotice_general', 't3additions_cookienotice_message, --linebreak--, t3additions_cookienotice_accept_label, t3additions_cookienotice_show_more_info, --linebreak--, t3additions_cookienotice_more_info_label, t3additions_cookienotice_link');

    // Set request update for conditional field triggers
    $GLOBALS['TCA']['tt_content']['ctrl']['requestUpdate'] .= ',t3additions_cookienotice_show_more_info';
});