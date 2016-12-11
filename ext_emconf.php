<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'T3 Additions',
    'description' => 'Useful additions to TYPO3 CMS.',
    'category' => 'fe',
    'author' => 'Sethorax',
    'author_email' => 'info@sethorax.com',
    'state' => 'beta',
    'clearCacheOnLoad' => null,
    'version' => '0.9.0',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-7.6.99',
            'vhs' => '3.1.0'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
