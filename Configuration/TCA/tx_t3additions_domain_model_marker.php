<?php

defined('TYPO3_MODE') or die();

$ll = 'LLL:EXT:t3additions/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'marker.title',
        'descriptionColumn' => $ll . 'marker.description',
        'label' => 'title',
        'label_alt' => 'uri',
        'label_alt_force' => 1,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'dividers2tabs' => true,
        'default_sortby' => 'ORDER BY sorting',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'typeicon_classes' => [
            'default' => 't3additions-domain-model-marker'
        ],
        'hideTable' => true,
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden,title,lat,lng,uri,description'
    ],
    'columns' => [
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_t3additions_domain_model_marker',
                'foreign_table_where' => 'AND tx_t3additions_domain_model_marker.pid=###CURRENT_PID### AND tx_t3additions_domain_model_marker.sys_language_uid IN (-1,0)',
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
        'title' => [
            'exclude' => 0,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => $ll . 'marker.field.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ]
        ],
        'lat' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => $ll . 'marker.field.lat',
            'config' => [
                'type' => 'input',
                'eval' => 'trim'
            ]
        ],
        'lng' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => $ll . 'marker.field.lng',
            'config' => [
                'type' => 'input',
                'eval' => 'trim'
            ]
        ],
        'uri' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => $ll . 'marker.field.uri',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
            ]
        ],
        'uri_title' => [
            'exclude' => 0,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => $ll . 'marker.field.uriTitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ]
        ],
        'icon' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => $ll . 'marker.field.icon',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'fal_media',
                [
                    'maxitems' => 1,
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
						--palette--;;t3additionsMapPalette,
						--palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
						--palette--;;t3additionsMapPalette,
						--palette--;;filePalette'
                        ],
                    ]
                ],
                'png,jpg,svg'
            )
        ],
        'description' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => $ll . 'marker.field.description',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
            ],
            'defaultExtras' => 'richtext[]'
        ]
    ],
    'types' => [
        0 => [
            'showitem' => 'l10n_parent, l10n_diffsource,
            --palette--;;paletteCore,
            --palette--;;paletteMarkerGeneral'
        ]
    ],
    'palettes' => [
        'paletteMarkerGeneral' => [
            'showitem' => 'title, --linebreak--, uri, uri_title, --linebreak--, lat, lng, --linebreak--, icon, --linebreak--, description',
            'canNotCollapse' => true
        ],
        'paletteCore' => [
            'showitem' => 'hidden,sys_language_uid',
            'canNotCollapse' => true
        ]
    ]
];