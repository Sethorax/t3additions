<?php

defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 't3additions/Configuration/TypoScript/';


if (TYPO3_MODE === 'BE') {
    call_user_func(
        function ($extKey) {
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
                'Sethorax.t3additions',
                'Additions',
                []
            );

            // Register icons
            $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

            $iconRegistry->registerIcon(
                'content-t3additions-menu',
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/content-t3additions-menu.svg']
            );

            $iconRegistry->registerIcon(
                'content-t3additions-map',
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/content-t3additions-map.svg']
            );

            $iconRegistry->registerIcon(
                'content-t3additions-socialwall',
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/content-t3additions-socialwall.svg']
            );

            $iconRegistry->registerIcon(
                'content-t3additions-button',
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/content-t3additions-button.svg']
            );

            $iconRegistry->registerIcon(
                'content-t3additions-cookienotice',
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/content-t3additions-cookienotice.svg']
            );

            // Add TypoScript config
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:t3additions/Configuration/TSconfig/ContentElementWizard.txt">');
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:t3additions/Configuration/TSconfig/ContentLayouts.txt">');
        },
        $_EXTKEY
    );
}